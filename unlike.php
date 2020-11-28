<?php
session_start();
//unlike.php
include("includes/standardheader.html");
if(isset($_SESSION["userId"])){

$userId = $_SESSION["userId"];
$articleId = $_POST["articleId"];
$likeId = $_GET["likeId"];

//show homepage
    include("includes/dbconfig.php");
        //if likeid exists in db the delete
        $stmt = $pdo->prepare("DELETE FROM `likes` 
        WHERE `likes` . `userId` = $userId
        AND `likes` . `articleId` = $articleId");
    
        $stmt->execute();

header('Location: homepage.php');
}else{
    //do not show page?>
    <p>ACCESS DENIED. Please Login</p>
    <a href = "login.php">Back to Login</a>
<?php
}
?>

