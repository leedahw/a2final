<?php
session_start();
if($_SESSION["userType"]=='admin'){
//receive  var
$aboutId = $_GET["aboutId"];?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="form to edit about page content">
    <meta name="keywords" content="HTML, PHP, IMM, News, Network, about, edit, form">
    <meta name="author" content="Alana Dahwoon Lee">
    <title>edit about page form</title>
</head>
<body>
<?php
//connect to db
	include('includes/dbconfig.php');

$stmt = $pdo->prepare("SELECT * FROM `about`");

$stmt->execute();

    $row = $stmt->fetch(PDO::FETCH_ASSOC);
//echo($row["content"]);

//show a prefilled form we can edit
?>
<form action="process-edit-about.php" method="POST">
	<input type="text" name="content" value="<?php echo($row["content"]);?>"/>
    <input type="hidden" name ="aboutId" value="<?php echo($row["aboutId"]);?>">
    <input type="submit" value = "CONFIRM EDIT"/>
</form>
</body>
</html>
<?php 
}else{
    //do not show?>
    <p>ACCESS DENIED</p>
    <a href = "about.php">Go</a><?php


}
?>
