<?php

include_once "MyHeader.php"
?>

<?php
require "../Backend/Utilities.php";
?>

<body class="masterBody">

    <div class="mainContent">
        <div class="apiData">

            <?php
    include_once "../Backend/dbConnector.php";



    // Get the db connection
    $myDbConn = ConnGet();
    $dataSet = GetGamesJson($myDbConn);




    //if ($dataSet){
    //    echo '<br/><br/><div class="apiData"><table class="tableCenter" cellspacing="0" cellpadding="0">
    //    <tr><td><b>Video Game Name</b></td>
    //    <td><b>Release Date</b></td>
    //    <td><b>Video Game Rating</b></td>
    //    <td><b>Stock Amount</b></td></tr> </div>';
    //    // per.Fname, per.Lname, cel.Cell_Id, cel.CellNumber
    //    while($row = mysqli_fetch_array($dataSet)){

    //            CreateUserGameTableEntry($row['ID'], $row['GameName'], $row['ReleaseDate'], $row['GameRating'], $row['StockAmount']);
    //    }
    //    mysqli_free_result($dataSet);
    //} // End if
    //else {
    //    echo "Query failed<br />";
    //    echo mysqli_error($myDbConn);
    //}

    echo "</Table> <br />";

    // Always close the connection
    mysqli_close($myDbConn);
            ?>


        </div>
    </div>


</body>

<?php
include_once "MyFooter.php";


?>



