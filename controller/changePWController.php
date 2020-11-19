<?php
session_start();
require_once("../model/MemberManager.php");
require_once("accountController.php");

if(!isset($_SESSION['id'])){
    header("Location: index.php?action=petPreview&error=notSignedIn");
}
else if (empty($_REQUEST['currentPW']) || empty($_REQUEST['newPW']) || empty($_REQUEST['confirmPW'])) {
    $result = "emptyPW";
} else if($_REQUEST['newPW'] !== $_REQUEST['confirmPW']) {
    $result = "matchPW";
} else {
    $result = checkChangePW($_REQUEST, $_SESSION['id']);
}

echo $result;
?>