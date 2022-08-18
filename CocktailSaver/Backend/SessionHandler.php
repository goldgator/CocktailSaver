<?php
session_start();
include_once "dbConnector.php";

//Session keys
    //UserName -> User name of the user
    //IsAdmin -> Has Admin privileges

function GetUserName() {
    return $_SESSION["UserName"];
}

function IsAdmin() {
    if (array_key_exists("IsAdmin", $_SESSION)) {
        return true;
    } else {
        return false;
    }
}

function TryLogin($UserName, $UserPassword) {
    //Call dbConnector method to see if a user exists
    $dbConn = ConnGet();

    return TryLoginAlt($dbConn, $UserName, $UserPassword);
}

function TryLoginAlt($dbConn, $UserName, $UserPassword) {
    $result = GetUserByUsernamePassword($dbConn, $UserName, $UserPassword);
    $user = mysqli_fetch_array($result);

    //return true or false depending on login success
    if ($user == null) return false;

    if ($user["IsAdmin"] == true) {
        CreateAdminSession($UserName);
    } else {
        CreateUserSession($UserName);
    }
    return true;
}

function CreateAndLogin($UserName, $UserPassword) {
    $dbConn = ConnGet();

    MyAddUser($dbConn, $UserName, $UserPassword, false);

    return TryLoginAlt($dbConn, $UserName, $UserPassword);
}


function CreateUserSession($UserName) {
    $_SESSION["UserName"] = $UserName;
}

function CreateAdminSession($UserName) {
    $_SESSION["UserName"] = $UserName;
    $_SESSION["IsAdmin"] = true;
}

function Logout() {
    unset($_SESSION["UserName"]);
    unset($_SESSION["IsAdmin"]);
    unset($_SESSION["StyleType"]);
}

?>