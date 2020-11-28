<?php
session_start();
if ($_SESSION["userType"]=='admin'){
//process-edit-about.php

$content = $_POST["content"];

//update about record (row) with edit about data
include('includes/dbconfig.php');

$stmt = $pdo->prepare("UPDATE `about` SET `content` = '$content'
WHERE `about`.`aboutId` = 1 ;");

$stmt->execute();

header("Location: about.php");
}else{
?>
<p>ACCESS DENIED. Admin Access Only.</p>
<a href = "homepage.php">Back to Home</a><?php
}
?>                              