<?php
include_once "src/Kernel.php";

use Gideon\Test\TestModel;

$testModel = new TestModel($db);

$authenticated = $testModel->hasAuth();
if (!$authenticated) {
    header("Location: /");
}
$user = $testModel->getUserSession();

$polls = $testModel->getPolls();

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
            <?php
                foreach($polls as $poll) {
                    echo "<h3>" . $poll['name'] . "</h3>";
                    echo "<p>" . $poll['question'] . "</p>";
                }
            ?>
        </div>
    </div>
</div>

<script src="js/vote.js"></script>

<?php
include_once "./views/footer.php";
?>
