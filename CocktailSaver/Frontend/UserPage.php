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
$dataSet = GetGamesByIDJson($myDbConn, $ID);

if ($dataSet){
    $row = mysqli_fetch_array($dataSet);
}

//$row['ID'], $row['GameName'], $row['ReleaseDate'], $row['GameRating'], $row['StockAmount'], $row['ImageLink'], $row['Summary']

?>

<h1>Game Name</h1>
<?php echo $row['GameName']?>

<br />
<br />

<img src="<?php echo $row['ImageLink'] ?>" />

<br />
<br />

<h1>Release Date</h1>
<?php echo $row['ReleaseDate']?>

<br />
<br />

<h1>Game Rating</h1>
<?php echo $row['GameRating']?>

<br />
<br />

<h1>Stock Amount</h1>
<?php echo $row['StockAmount']?>

<br />
<br />

<h1>Summary</h1>
<?php echo $row['Summary']?>


<?php
include_once "MyFooter.php"
?>