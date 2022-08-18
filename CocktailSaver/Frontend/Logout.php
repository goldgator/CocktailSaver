<?php
include_once "../Backend/SessionHandler.php";

Logout();

$location = "../index.php";

ob_start(); // should be near header() (?)
header("Location: " . $location);
ob_end_flush(); //Should be last last line of the page

?>