<?php
include_once "src/Kernel.php";

use Gideon\Test\TestModel;
use Gideon\Test\Validation;

try {
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        throw new Exception('This REQUEST_METHOD is now allowed.');
    }

    $validation = function () {
        if (Validation::string($_POST['pollid']) !== true) return false;
        if (Validation::string($_POST['poll_option']) !== true) return false;
        return true;
    };

    $testDB = new TestModel($db);

    $response = $testDB->saveVote(
        $_POST['pollid'],
        $_POST['poll_option']
    );

    header('Content-Type: application/json; charset=utf-8');
    http_response_code(200);
    echo json_encode(['message' => 'Successfully casted a vote.']);

} catch (Exception $error) {
    http_response_code(500);
    echo json_encode(['error' => $error->getMessage()]);
}