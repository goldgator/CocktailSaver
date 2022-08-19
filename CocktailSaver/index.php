<?php
include_once "Frontend/MyHeader.php";


?>

<!DOCTYPE html>
<html lang="en">

<body class="masterBody">

    <div class="mainContent">
        <h1>About</h1>
        <form action="/action_page.php">
            <label for="fname">Email:</label>
            <input type="text" id="fname" name="fname" />
            <br />
            <br />
            <label for="lname">Message:</label>
            <input type="text" id="lname" name="lname" />
            <br />
            <br />
            <input type="submit" value="Submit" />
        </form>
    </div>
</body>
</html>

<?php
include_once "Frontend/MyFooter.php";


?>
