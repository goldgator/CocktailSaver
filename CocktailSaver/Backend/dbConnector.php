<?php

// Create constants
DEFINE ('DB_USER', 'CChildress');
DEFINE ('DB_PSWD', 'CSChildress');
DEFINE ('DB_SERVER', '192.168.50.211');
DEFINE ('DB_NAME', 'VideoGameStore');

//Table Users / VideoGame
    //ID
    //Username
    //Password
    //IsAdmin

//VideoGame
    //ID
    //GameName
    //ReleaseDate
    //GameRating
    //StockAmount
    //ImageLink
    //Summary

function ConnGet() {
    // $dbConn will contain a resource link to the database
    // @ Don't display error
    $dbConn = @mysqli_connect(DB_SERVER, DB_USER, DB_PSWD, DB_NAME, 3306)
    OR die('Failed to connect to MySQL ' . DB_SERVER . '::' . DB_NAME . ' : ' . mysqli_connect_error()); // Display messge and end PHP script

    return $dbConn;
}

#region Games
function GetGamesJson($dbConn) {

    $query = "SELECT *
   FROM VideoGame";

    return @mysqli_query($dbConn, $query);
}

function GetGamesByIDJson($dbConn, $GID) {

    $query = "SELECT *
   FROM VideoGame WHERE ID = " . $GID;

    return @mysqli_query($dbConn, $query);
}

// Return number of records changed
function MyGameUpdate($dbConn, $GId, $GName, $GRelease, $GRating, $GStock, $GImageLink, $GSummary) {

    $query = "update VideoGame set GameName = '" . $GName . "', ReleaseDate = '" . $GRelease . "', GameRating = '" . $GRating . "', StockAmount = '" . $GStock . "', ImageLink = '" . $GImageLink . "', Summary = '" . $GSummary . "' where ID=" . $GId;

    $result = mysqli_query($dbConn, $query);
    $rows = $dbConn->affected_rows;

    if ($result == true) {

        return $rows;
    }
    else  {
        echo mysqli_error($dbConn);
        return false;
    }

}

function MyDeleteGame($dbConn, $GId) {
    $query = "delete from VideoGame where ID = " . $GId;

    $result = mysqli_query($dbConn, $query);

    return $result;
}

function MyAddGame($dbConn,  $GName, $GRelease, $GRating, $GStock, $GImageLink, $GSummary) {
    $query = "INSERT INTO VideoGame (GameName, ReleaseDate, GameRating, StockAmount, ImageLink, Summary) VALUES(?, ?, ?, ?, ?, ?)";
    $prep = mysqli_prepare($dbConn, $query);

    // Data format
    //    i Integers
    //    d Doubles
    //    b Blobs
    //    s Everything Else
    mysqli_stmt_bind_param($prep, "ssdiss", $GName, $GRelease, $GRating, $GStock, $GImageLink, $GSummary);

    mysqli_stmt_execute($prep);

    $affected_rows = mysqli_stmt_affected_rows($prep);
    mysqli_stmt_close($prep);

    return $affected_rows;
}

#endregion

#region Users
function GetUsersJson($dbConn) {

    $query = "SELECT *
   FROM Users";

    return @mysqli_query($dbConn, $query);
}

// Return number of records changed
function MyUserUpdate($dbConn, $UId, $UUserName, $UPassword, $UIsAdmin) {

    $query = "update VideoGame set Username = '" . $UUserName . "', Password = '" . $UPassword . "' IsAdmin = '" . $UIsAdmin . "' where ID=" . $GId;

    $result = mysqli_query($dbConn, $query);
    $rows = $dbConn->affected_rows;

    if ($result == true) {

        return $rows;
    }
    else  {
        echo mysqli_error($dbConn);
        return false;
    }

}

function MyDeleteUser($dbConn, $UId) {
    $query = "delete from Users where ID = " . $UId;

    $result = mysqli_query($dbConn, $query);

    return $result;
}

function MyAddUser($dbConn,  $UUsername, $UPassword, $UIsAdmin) {
    $query = "INSERT INTO Users (Username, Password, IsAdmin) VALUES(?, ?, ?)";
    $prep = mysqli_prepare($dbConn, $query);

    // Data format
    //    i Integers
    //    d Doubles
    //    b Blobs
    //    s Everything Else
    mysqli_stmt_bind_param($prep, "ssi", $UUsername, $UPassword, $UIsAdmin);

    mysqli_stmt_execute($prep);

    $affected_rows = mysqli_stmt_affected_rows($prep);
    mysqli_stmt_close($prep);

    return $affected_rows;
}

function GetUserByUsernamePassword($dbConn, $UUsername, $UPassword)
{
    $query = "SELECT * FROM Users WHERE Username = '" . $UUsername . "' AND Password = '" . $UPassword . "' LIMIT 1";

    return @mysqli_query($dbConn, $query);
}

#endregion

// ///////////////////////////////////////////////////
// Privs? GRANT SELECT, INSERT, UPDATE, DELETE ON `mytestdb`.* TO 'root'@'localhost';
// Privs? GRANT SELECT, INSERT, UPDATE, DELETE ON `mytestdb`.* TO 'MyUser'@'localhost';
// Privs? GRANT SELECT, INSERT, UPDATE, DELETE ON *.* TO 'MyUser'@'localhost';
// FLUSH PRIVILEGES;

// CREATE USER 'newuser'@'%' IDENTIFIED WITH mysql_native_password BY '***';GRANT ALL PRIVILEGES ON *.* TO 'newuser'@'%' WITH GRANT OPTION;ALTER USER 'newuser'@'%' REQUIRE NONE WITH MAX_QUERIES_PER_HOUR 0 MAX_CONNECTIONS_PER_HOUR 0 MAX_UPDATES_PER_HOUR 0 MAX_USER_CONNECTIONS 0;GRANT ALL PRIVILEGES ON `newuser\_%`.* TO 'newuser'@'%';

// https://dev.mysql.com/doc/index-connectors.html

// SELECT @@port;
// SHOW VARIABLES WHERE Variable_Name = 'port';


?>


