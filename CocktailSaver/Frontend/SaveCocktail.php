<?php

require "../Backend/dbConnector.php";
require "../Backend/SessionHandler.php";

$dbConn = ConnGet();

MyAddCocktails(
    $dbConn,
    GetUserID(),
    $_POST["Name"],
    $_POST["Ingredients"],
    "",
    $_POST["Instructions"],
    $_POST["ImageLink"]);

    $location = "UserPage.php";

    ob_start(); // should be near header() (?)
    header("Location: " . $location);
    ob_end_flush(); //Should be last last line of the page

?>