<?php
include_once "MyHeader.php";


?>

<!DOCTYPE html>
<html lang="en">

<body>


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
</body>
</html>

<?php
include_once "MyFooter.php";


?>
