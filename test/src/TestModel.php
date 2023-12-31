<?php

namespace Gideon\Test;

use PDO;

readonly class TestModel
{
    public function __construct(private PDO $pdo)
    {
    }

    public function authUser(
        string $username,
        string $password
    )
    {
        $sql = 'SELECT * FROM user WHERE username = :username LIMIT 1';
        $statement = $this->pdo->prepare($sql);
        $statement->execute([
            ':username' => $username
        ]);
        $result = $statement->fetch();
        if ($result) {
            if (!password_verify($password, $result['password'])) return false;
        }
        $_SESSION['user'] = $result;

        return $result;
    }

    public function hasAuth(): bool
    {
        if (isset($_SESSION['user'])) {
            return true;
        }
        return false;
    }

    public function getUserSession(): array
    {
        return $_SESSION['user'];
    }

    public function canVote(int $pollId): bool
    {
        $user = $this->getUserSession();
        $sql = 'SELECT * FROM poll_votes WHERE poll_id = :poll_id AND user_id = :user_id LIMIT 1';
        $statement = $this->pdo->prepare($sql);
        $statement->execute([
            ':poll_id' => $pollId,
            ':user_id' => $user['id'],
        ]);
        $result = $statement->fetchAll();

        if (count($result) == 1) {
            return false;
        }

        return true;
    }

    public function createUser(
        string $firstname,
        string $lastname,
        string $username,
        string $password
    ): int
    {
        $sql = 'INSERT INTO user (first_name, last_name, username, password) VALUES (:firstname, :lastname, :username, :password)';
        $statement = $this->pdo->prepare($sql);
        $statement->execute([
            ':firstname' => $firstname,
            ':lastname' => $lastname,
            ':username' => $username,
            ':password' => $password
        ]);

        return $this->pdo->lastInsertId();
    }

    public function getPolls(int $max = 10): array
    {
        $response = [];

        $sql = 'SELECT * FROM poll LIMIT :max;';

        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(':max', (int)$max, PDO::PARAM_INT);
        $statement->execute();

        $result = $statement->fetchAll();

        foreach ($result as $item) {
            $response[] = [
                'id' => $item['id'],
                'name' => $item['poll_name'],
                'question' => $item['poll_question']
            ];
        }

        return $response;
    }

    public function getPollQuestionsById(int $id): array
    {
        $response = [];

        $sql = 'SELECT * FROM poll_options WHERE poll_id = :voteID';
        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(':voteID', (int)$id, PDO::PARAM_INT);
        $statement->execute();

        $result = $statement->fetchAll();

        foreach ($result as $item) {
            $response[] = [
                'id' => $item['id'],
                'option' => $item['option_name'],
            ];
        }

        return $response;
    }

    public function saveVote(
        string $pollid,
        string $poll_option,
    ): int
    {
        // increment the vote on the voting table
        $sqlUpdate = 'UPDATE  poll_options SET votes = votes + 1 WHERE id = :poll_option';
        $statementUpdate = $this->pdo->prepare($sqlUpdate);
        $statementUpdate->execute([
            ':poll_option' => $poll_option,
        ]);

        // save that the user has voted on this poll
        $sql = 'INSERT INTO poll_votes (poll_id, user_id) VALUES (:poll_id, :user_id)';
        $statement = $this->pdo->prepare($sql);
        $user = $this->getUserSession();
        $statement->execute([
            ':poll_id' => $pollid,
            ':user_id' => $user['id'],
        ]);

        return $this->pdo->lastInsertId();
    }

    public function getPollResultsByPollId(int $pollId): array
    {
        $response = [];

        $sql = 'SELECT *, (SELECT SUM(votes) as total_votes from poll_options WHERE poll_id = :pollId) as total_votes, (SELECT (votes * 100) / total_votes) as percentage FROM `poll_options` WHERE poll_id = :pollId;';
        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(':pollId', (int)$pollId, PDO::PARAM_INT);
        $statement->execute();

        $results = $statement->fetchAll();

        foreach($results as $item) {
            $response[] = [
                'name' => $item['option_name'],
                'percentage' => $item['percentage'],
                'votes' => $item['votes']
            ];
        }

        return $response;
    }
}