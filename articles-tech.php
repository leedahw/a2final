<?php session_start();
//articles- tech
//get records from db vv
include("includes/dbconfig.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="index of just tech-related articles">
    <meta name="keywords" content="HTML, PHP, IMM, News, Network, article, tech">
    <meta name="author" content="Alana Dahwoon Lee">
    <title>tech articles</title>
</head>
<body>
<section id="header"><?php include("includes/standardheader.html");?></section>
<section class="categoryArticles">
    <h1 id="mainTitle">Tech Articles</h1>

<section class="article" id="singleArticle">
<?php $stmt = $pdo->prepare("SELECT * FROM `article` WHERE `article` . `category` = 'tech'");
$stmt->execute();
while ($row = $stmt->fetch(PDO:: FETCH_ASSOC)){
    echo("<div class=indivArticle>");?>
    <img class="articleimg" src = "uploads/<?php echo($row["img"]);?>" alt="img" /><?php
    echo("<h3 class= article id= articleTitle>");
    echo($row["title"]);
    echo("</h3>");

    echo("<p class= article id= articleDetails>");
    echo("<p class=article id=techAuthor><label id=techLabel>By: </label>");
    echo($row["author"]);?></p><br/><?php
    echo($row["content"]);
    echo("</p>");?>
    <br/>
    <a class="link" href = "view-article.php?articleId=<?php echo($row["articleId"]);?>">Read More</a><br/>
    <a class="link" href = "<?php echo($row["articleLink"]);?>">See Full Article</a><br/>
    <br />
<?php 
    echo("</div>");
}?>   
</section>
</section>
</body>
</html>