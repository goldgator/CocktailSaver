<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta content="text/html; charset=ISO-8859-1"  http-equiv="content-type">
  <title>My Title</title>
   
</head>

<div class="bodyHeader">
    <br />
<h1>COCK</h1>
    <br />
 </div>

    <hr style="color:#000000" />

    <br />
<div class="buttonCenter">
    <a class="pageButton"  href="../index.php">Home</a>
    <a class="pageButton" href="/Frontend/CocktailSearch.php">Search</a>
    <a class="pageButton"  href="/Frontend/Contact.php">Contact</a>
</div>
        <?php
        if (isset($_SESSION["UserName"])) {
            echo '<a class="logout" href="/Frontend/Logout.php">Logout</a>';
        } else {
            echo '<a class="logout" href="/Frontend/Login.php">Login</a>';
        }

        ?>

    <a class="pageButton2"  href="/Frontend/Signup.php">Sign Up</a>
<br />
<br />
    </body>