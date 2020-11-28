<?php
//process contact form

//receive input
$name = $_POST["name"];
$emailAddress = $_POST["emailAddress"];
$str = implode("," , $_POST['interests']);
$userRole = $_POST["userRole"];


//this part adds a new user to the 'contactsubmission' table
include('includes/dbconfig.php');

$stmt = $pdo->prepare("INSERT INTO `contactsubmission` 
(`submissionId`, `name`, `emailAddress`, `interests`, `userRole`) 
VALUES (NULL, '$name', '$emailAddress', '$str', '$userRole');"
);

$stmt->execute();
?>
