<?php
include_once "src/Kernel.php";
unset($_SESSION['user']);

header("Location: /");
die();