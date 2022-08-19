<?php

require "../Backend/dbConnector.php";
require "../Backend/SessionHandler.php";

$dbConn = ConnGet();

MyDeleteCocktail($dbConn, $_POST["CocktailID"]);

$location = "UserPage.php";

ob_start(); // should be near header() (?)
header("Location: " . $location);
ob_end_flush(); //Should be last last line of the page



?>