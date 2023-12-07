<?php
include_once "src/Kernel.php";

use Gideon\Test\TestModel;
use Gideon\Test\Validation;

try {
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        throw new Exception('This REQUEST_METHOD is now allowed.');
    }

    $validation = function() {
        if(Validation::string($_POST['firstname']) !== true) return false;
        if(Validation::string($_POST['lastname']) !== true) return false;
        if(Validation::string($_POST['username']) !== true) return false;
        if(Validation::string($_POST['password']) !== true) return false;
        if(Validation::password($_POST['password']) !== true) return false;
        return true;
    };

    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $testDB = new TestModel($db);
    $response = $testDB->createUser(
        $_POST['firstname'],
        $_POST['lastname'],
        $_POST['username'],
        $password
    );

    header('Content-Type: application/json; charset=utf-8');
    http_response_code(200);
    echo json_encode(['message' => 'Successfully created user.']);

} catch (Exception $error) {
    http_response_code(500);
    echo json_encode(['error' => $error->getMessage()]);
}