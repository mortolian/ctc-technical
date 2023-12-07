<?php
include_once "src/Kernel.php";

use Gideon\Test\TestModel;
use Gideon\Test\Validation;

try {
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        throw new Exception('This REQUEST_METHOD is now allowed.');
    }

    $validation = function() {
        if(Validation::string($_POST['username']) !== true) return false;
        if(Validation::string($_POST['password']) !== true) return false;
        return true;
    };

    $testDB = new TestModel($db);
    $response = $testDB->authUser(
        $_POST['username'],
        $_POST['password']
    );

    $password = password_verify($_POST['password'], '');

    header('Content-Type: application/json; charset=utf-8');
    http_response_code(200);
    echo json_encode(['user' => [
        'id' => $response['id'],
        'username' => $response['username'],
        'name' => $response['first_name'] . ' ' . $response['last_name']
    ]]);
} catch (Exception $error) {
    http_response_code(500);
    echo json_encode(['error' => $error->getMessage()]);
}