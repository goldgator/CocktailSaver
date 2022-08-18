<?php
include_once "MyHeader.php";
require "../Backend/dbConnector.php";

if (array_key_exists("CreateGame", $_POST)) {
    $dbConn = ConnGet();

    MyAddGame($dbConn,
        $_POST["GameName"],
        $_POST["ReleaseDate"],
        $_POST["GameRating"],
        $_POST["StockAmount"],
        $_POST["ImageLink"],
        $_POST["Summary"]);

    $location = "Store.php";

    ob_start(); // should be near header() (?)
    header("Location: " . $location);
    ob_end_flush(); //Should be last last line of the page
}

?>

<form action="AddGame.php" method="post">
    <div>
        <h1>Game Name</h1>
    </div>
    <input type="text" name="GameName" id="GameName" />
    
    <br />
    <br />

    <h1>Image Link</h1>
    <input type="text" name="ImageLink" id="ImageLink" />

    <br />
    <br />

    <h1>Release Date</h1>
    <input type="text" name="ReleaseDate" id="ReleaseDate" />

    <br />
    <br />

    <h1>Game Rating</h1>
    <input type="text" name="GameRating" id="GameRating" />

    <br />
    <br />

    <h1>Stock Amount</h1>
    <input type="text" name="StockAmount" id="StockAmount" />

    <br />
    <br />

    <h1>Summary</h1>
    <input type="text" name="Summary" id="Summary" />

    <input type="submit" name="CreateGame" id="CreateGame" />
</form>

<?php
include_once "MyFooter.php"
?>