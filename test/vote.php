<?php
include_once "src/Kernel.php";

use Gideon\Test\TestModel;

$testModel = new TestModel($db);
$authenticated = $testModel->hasAuth();

dump($authenticated);

include_once "./views/header.php";
?>
<div id="user" class="user container text-center">
    <div class="welcome row">
        <h1>Voter Box</h1>
    </div>
</div>

<div class="vote container text-center">
    <div class="row">
        <div class="col">
            <h3>Voter Box</h3>
            <p>You can vote <a href="">here</a>.</p>
        </div>
    </div>
</div>

<script src="js/vote.js"></script>

<?php
include_once "./views/footer.php";
?>

