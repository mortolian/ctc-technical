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
    <?php
        foreach($polls as $poll) {
            echo "<div class='row'>";
            echo "<div class='col' id='result-" . $poll['id'] ."'>";
            echo "<form id='poll-form-" . $poll['id'] ."'>";
            echo "<h3>" . $poll['name'] . "</h3>";
            echo "<p>" . $poll['question'] . "</p>";
            echo "<input type='hidden' name='pollid' value='".$poll['id']."'>";

            $options = $testModel->getPollQuestionsById($poll['id']);

            echo "<div id='poll-result-display'>";

            foreach ($options as $option) {
                echo "<div><input type='radio' name='poll_option' value='" . $option['id'] . "'> " . $option['option'] . "</div>";
            }

            echo "<br>";
            echo "<button type='submit' onSubmit='vote(event)'>Vote</button>";
            echo "</form>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
        }
    ?>
</div>

<script src="js/vote.js"></script>

<?php
include_once "./views/footer.php";
?>
