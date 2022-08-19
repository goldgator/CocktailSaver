
<br/>
<br/>
<br/>
<hr/>


<?php
$CurrentYear = 2022;
echo "Copyright Bacon Boys - " . $CurrentYear;
?>

 <?php
 if(array_key_exists("Style1", $_POST))
 {
     $_SESSION["StyleType"] = "/Frontend/Styling/Style1.css";
 }
 else if(array_key_exists("Style2", $_POST))
 {
     $_SESSION["StyleType"] = "/Frontend/Styling/Style2.css";
 }
 else if(array_key_exists("Style3", $_POST))
 {
     $_SESSION["StyleType"] = "/Frontend/Styling/Style3.css";
 }

 $StyleString = $_SESSION["StyleType"];
 if ($StyleString == null)
 {
     $StyleString = "/Frontend/Styling/Style1.css";
 }
 ?>

    <link rel="stylesheet" type="text/css"  href="<?php echo $StyleString?>" />


</body>
</html>

