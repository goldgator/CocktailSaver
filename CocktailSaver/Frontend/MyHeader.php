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

<h1><img class="headerImage" src="https://i.pinimg.com/originals/69/a1/61/69a161d0228db00c9a2560a46bf942eb.png" /></img> Bacon Bois Cocktail Bar </h1>
    <br />
 </div>

    <hr style="color:#000000" />

    <br />
<div class="buttonCenter">
    <a class="pageButton"  href="../index.php">Home</a>
    <a class="pageButton" href="/Frontend/CocktailSearch.php">Search</a>
    <a class="pageButton"  href="/Frontend/Contact.php">Contact</a>
    <a class="pageButton"  href="/Frontend/UserPage.php">User Page</a>
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