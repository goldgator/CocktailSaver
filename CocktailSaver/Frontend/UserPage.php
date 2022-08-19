<?php
include_once "MyHeader.php";

//This page should always be reached by a post
?>

<?php
include_once "../Backend/dbConnector.php";

require "../Backend/SessionHandler.php";
require "../Backend/Cocktail.php";

//if(array_key_exists("ID", $_POST))
//{
//    $ID = $_POST["ID"];
//}

if (isset($_SESSION['UserID'])) {
    //echo "Logged in as: " . $_SESSION["UserName"];
    $ID = $_SESSION["UserID"];
}

$myDbConn = ConnGet();
$dataSet = GetCocktailsByUser($myDbConn, $ID);

//$row['ID'], $row['GameName'], $row['ReleaseDate'], $row['GameRating'], $row['StockAmount'], $row['ImageLink'], $row['Summary']

?>

<div class="entryList">
    <?php
    while ($row = mysqli_fetch_array($dataSet)) {
        $newCocktail = new Cocktail($row["CocktailName"], $row["Ingredients"], $row["Measures"], $row["Instructions"], $row["ImageLink"]);
        $newCocktail->create_list_entry();
    }
    ?>
</div>

<?php
include_once "MyFooter.php"
?>