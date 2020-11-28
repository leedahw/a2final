<?php session_start();
//view-article.php
?>

<html lang="en">
<head>
    <link rel="stylesheet" href="./css/main.css" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="article page for IMM News Network">
    <meta name="keywords" content="HTML, PHP, IMM, News, Network, article page">
    <meta name="author" content="Alana Dahwoon Lee">
</head>
<body>

<section id="header"><?php include("includes/standardheader.html");?></section>
<?php
$userId = $_SESSION["userId"];
$articleId = $_GET["articleId"];

//get records from db vv
include("includes/dbconfig.php");

$stmt = $pdo->prepare("SELECT * FROM `likes`
WHERE `likes` . `userid` = $userId
AND `likes` . `articleId` = $articleId");

$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);?>
<img src ="articles/img/<?php echo($row["likeicon"])?>" width = "50" alt = "likeicon">

<?php 
    $stmt = $pdo->prepare("SELECT count(*) FROM `likes` 
    WHERE `likes` . `articleId` = $articleId");
    
    $stmt->execute();
    $row = $stmt->fetchColumn();
    ?>    

    <p><?php echo $row?> people like this</p>
<!-- like button -->
    <form action = "like.php" method="POST" enctype="multipart/form-data">
    <input type = "hidden" name="articleId" value = "<?php echo($articleId);?>">
    <input type = "hidden" id = "likeicon" name="likeicon" value = "likeicon.png">
    <input type = "submit" name="like" value = "Like"/>
    </form>
<!-- unlike button -->
    <form action = "unlike.php" method="POST" enctype="multipart/form-data">
    <input type = "hidden" name="articleId" value = "<?php echo($articleId);?>">
    <input type = "submit" name="unlike" value = "Unlike"/>
    </form>   

<section class="indivArticle">   
<?php
$stmt = $pdo->prepare("SELECT * FROM `article`
WHERE `articleId` = $articleId");

$stmt->execute();

$row = $stmt->fetch(PDO:: FETCH_ASSOC);
echo("<div class=indivArticle>");?>
<img class="articleimg" src = "uploads/<?php echo($row["img"]);?>" alt="img" /><?php
echo("<h2 class= article id= articleTitle>");
echo($row["title"]);
echo("</h2>");

echo("<p class= article id= articleDetails>");
echo("<p class=article id= author><label class= label>By: </label>");
echo($row["author"]);?><br/><br/><?php
echo($row["content"]);
echo("</p>");?>
<br/>
<a class="externalink" href = "<?php echo($row["articleLink"]);?>">See Full Article</a><br/>
<br />
<?php 
echo("</div>");?>


</section>
</body>
</html>