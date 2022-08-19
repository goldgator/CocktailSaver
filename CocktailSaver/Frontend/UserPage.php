<?php
include_once "MyHeader.php";

//This page should always be reached by a post
?>

<?php
include_once "../Backend/dbConnector.php";

if(array_key_exists("ID", $_POST))
{
    $ID = $_POST["ID"];
}

$myDbConn = ConnGet();
$dataSet = GetCocktailByUser($myDbConn, $ID);

if ($dataSet){
    $row = mysqli_fetch_array($dataSet);
}

//$row['ID'], $row['GameName'], $row['ReleaseDate'], $row['GameRating'], $row['StockAmount'], $row['ImageLink'], $row['Summary']

?>

<h1>Cocktail Name</h1>
<?php echo $row['CocktailName']?>

<br />
<br />

<img src="<?php echo $row['ImageLink'] ?>" />

<br />
<br />

<h1>Ingredients</h1>
<?php echo $row['Ingredients']?>

<br />
<br />

<h1>Measures</h1>
<?php echo $row['Measures']?>

<br />
<br />

<h1>Instructions</h1>
<?php echo $row['Instructions']?>

<br />
<br />

<?php
include_once "MyFooter.php"
?>