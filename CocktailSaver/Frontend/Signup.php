<?php
include_once "MyHeader.php";
include_once "../Backend/SessionHandler.php";

?>

<?php

if (isset($_SESSION['UserName'])) {
    echo "Logged in as: " . $_SESSION["UserName"] . " Log out to create a new User.";
} else {
    if (array_key_exists("FUserName", $_POST)) {
        $UserName = $_POST["FUserName"];
        $Password = $_POST["FPassword"];

        $result = CreateAndLogin($UserName, $Password);

        if ($result == true) {
            echo "Successful Login";
        } else {
            echo "Failed to Login";
        }
    } else {
        echo '<body class="masterBody">
            <div class="mainContent">
            <h1>Create Account</h1>
            <form action="Signup.php" method="post">
                <label for="FUserName">New Username</label>
                <input type="text" id="FUserName" name="FUserName" />
                <br />
                <br />
                <label for="FPassword">New Password</label>
                <input type="text" id="FPassword" name="FPassword" />
                <br />
                <br />
                <input class="pageButton" type="submit" value="Create User" />
                <br />
            </form>
            </div>
            </body>
            ';
    }
}


?>



<?php
include_once "MyFooter.php";


?>
