<?php
session_start();
include_once "dbConnector.php";

//Session keys
    //UserName -> User name of the user
    //UserID -> ID of the user

function GetUserName() {
    return $_SESSION["UserName"];
}

function GetUserID() {
    return $_SESSION["UserID"];
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

    CreateUserSession($UserName, $user["ID"]);
    
    return true;
}

function CreateAndLogin($UserName, $UserPassword) {
    $dbConn = ConnGet();

    MyAddUser($dbConn, $UserName, $UserPassword, false);

    return TryLoginAlt($dbConn, $UserName, $UserPassword);
}


function CreateUserSession($UserName, $UserID) {
    $_SESSION["UserName"] = $UserName;
    $_SESSION["UserID"] = $UserID;
}

function Logout() {
    unset($_SESSION["UserName"]);
    unset($_SESSION["UserID"]);
    unset($_SESSION["StyleType"]);
}

?>