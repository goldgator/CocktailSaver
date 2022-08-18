<?php
include_once "MyHeader.php";
include_once "../Backend/SessionHandler.php";

if (isset($_SESSION['IsAdmin'])) {
    echo "Logged in as: " . $_SESSION["UserName"];
} else {
    if (array_key_exists("FUserName", $_POST)) {
        $UserName = $_POST["FUserName"];
        $Password = $_POST["FPassword"];

        $result = TryLogin($UserName, $Password);

        if ($result == true) {
            echo "<p class='logText'> Successful Login </p>";
        } else {
            echo  "<p class='logText'> Failed to Login </p>";
        }
    } else {
        echo '<h1>Login</h1>
            <form action="Login.php" method="post">
                <label for="FUserName">Username</label>
                <input type="text" id="FUserName" name="FUserName" />
                <br />
                <br />
                <label for="FPassword">Password</label>
                <input type="text" id="FPassword" name="FPassword" />
                <br />
                <br />
                <input type="submit" value="Login" />
            </form>';
    }
}



?>


<?php
include_once "MyFooter.php";


?>
