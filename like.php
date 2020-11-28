<?php
session_start();
if(isset($_SESSION["userId"])){
    include("includes/standardheader.html");

$userId = $_SESSION["userId"];
$articleId = $_POST["articleId"];
$likeId = $_GET["likeId"];
$likeicon = $_POST["likeicon"];
//show homepage
    include("includes/dbconfig.php");
    $stmt = $pdo->prepare("INSERT INTO `likes` 
    (`likeId`, `userId`, `articleId`,`likeicon`) 
    VALUES (NULL, '$userId', '$articleId', '$likeicon');");

$stmt->execute();

header('Location: homepage.php');

}else{
    //do not show page?>
    <p>ACCESS DENIED. Please Login</p>
    <a href = "login.php">Back to Login</a>
<?php
}
?>