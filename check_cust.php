<?php
session_start();
//check if user has login..if not go to login page
if(!isset($_SESSION['username'])){
die( Header("Location: login.php"));
}
//check user level..if not goto login page
if($_SESSION['level']!="Customer"){
die( Header("Location: login.php"));
}
?>