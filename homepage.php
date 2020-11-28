<?php session_start();
//homepage.php
    include("includes/dbconfig.php");
?>
<html lang="en">
<head>
    <link rel="stylesheet" href="./css/main.css" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='icon' href='./favicon.ico' type='image/x-icon'/>
    <meta name="description" content="home page/ dashboard for IMM News Network">
    <meta name="keywords" content="HTML, PHP, IMM, News, Network">
    <meta name="author" content="Alana Dahwoon Lee">
    <title>IMM NEWS NETWORK</title>
</head>
<body>

<section id="header"><?php include("includes/standardheader.html");?></section>
<a id="viewContact" href = "view-contact.php">View Contact</a>

<section class="title">
<section id="top">
<h1 class="title">IMM NEWS NETWORK</h1>
<p id="aboutText">The IMM News Network is a site for students in the Interactive Multimedia Management program at Sheridan College.</p>
</section>

<div class="iframe-container">
    <iframe width="392" height="220" src="https://www.youtube.com/embed/PcY9_mCT2D8" 
        frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
        allowfullscreen></iframe>
</div>
</section>

<br/><br/>

<section class= "featuredArticle" id= "featuredArticle">
<h2 class= "header" id="articleHeader">Featured Article</h2>
<?php 
$stmt = $pdo->prepare("SELECT * FROM `article` WHERE `article`.`featured` = 'yes'");
$stmt->execute();
while($row = $stmt->fetch(PDO:: FETCH_ASSOC)) {?>

    <img id="featuredimg" src = "uploads/<?php echo($row["img"]);?>" alt="img" /><br/>
    <?php
    echo("<div class=featuredArticle>");
    echo("<h3 class= article id= featuredArticleHeading>");
    echo($row["title"]);
    echo("</h3>");

    echo("<p id=featuredArticleDetail>");?>
    <label class="label">By: </label>
    <?php echo($row["author"]);?><br/>
    <label class="label">Category: </label>
    <?php echo($row["category"]);?><br/><br/>
    <?php echo($row["content"]);
    echo("</p>");?>

    <a id= "featuredLink" href = "<?php echo($row["articleLink"]); ?>" target = "_blank">See Full Article</a><br/>
<?php echo("</div>");
}
?> 
</section>
<br/>
<br/>
<br/>

<section id="articleTop">
<h1 id= "mainarticleHeading">Articles</h1>
<a class="link" id="addArticle" href= "insert-article.php">Add Article</a>
</section>

    <ul id="nav">
        <li id="articlenav"><a class= "link" href = "articles-tech.php">Tech Articles</a></li>  
        <li id="articlenav"><a class= "link" href = "articles-industry.php">Industry Articles</a></li>  
        <li id="articlenav"><a class= "link" href = "articles-career.php">Career Articles</a></li> 
    </ul>

<section id="fullArticles">
<section class="article" id="techArticle">
<h2 class="articleHeading" id="techHeading">Tech Articles</h2>
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


<section class="article" id="industryArticle">
<h2 class="articleHeading" id="industryHeading">Industry Articles</h2>
<?php $stmt = $pdo->prepare("SELECT * FROM `article` WHERE `article` . `category` = 'industry'");
$stmt->execute();
while ($row = $stmt->fetch(PDO:: FETCH_ASSOC)){
    echo("<div class=indivArticle>");?>
    <img class="articleimg" src = "uploads/<?php echo($row["img"]);?>" alt="img" /><?php
    echo("<h3 class= articleTitle>");
    echo($row["title"]);
    echo("</h3>");

    echo("<p class= article id= articleDetails>");
    echo("<p class=article id=industryAuthor><label id=industryLabel>By: </label>");
    echo($row["author"]);?></p><br/><?php
    echo($row["content"]);
    echo("</p>");?>
    <br/>
    <a class= "link" href = "view-article.php?articleId=<?php echo($row["articleId"]);?>">Read More</a><br/>
    <a class= "link" href = "<?php echo($row["articleLink"]);?>">See Full Article</a><br/>
    <br />
<?php 
    echo("</div>");
}?>   
</section>

<section class="article" id="careerArticle">
<h2 class="articleHeading" id="careerHeading">Career Articles</h2>
<?php $stmt = $pdo->prepare("SELECT * FROM `article` WHERE `article` . `category` = 'career'");
$stmt->execute();
while ($row = $stmt->fetch(PDO:: FETCH_ASSOC)){
        echo("<div class=indivArticle>");?>
        <img class="articleimg" src = "uploads/<?php echo($row["img"]);?>" alt="img" /><?php
        echo("<h3 class= articleTitle>");
        echo($row["title"]);
        echo("</h3>");

        echo("<p class= indivArticle article id= articleDetails>");
        echo("<p class=article id=careerAuthor><label id=careerLabel>By: </label>");
        echo($row["author"]);?></p><br/><?php
        echo($row["content"]);
        echo("</p>");?>
        <br/>
        <a class= "link" href = "view-article.php?articleId=<?php echo($row["articleId"]);?>">Read More</a><br/>
        <a class= "link" href = "<?php echo($row["articleLink"]);?>">See Full Article</a><br/>
        <br />
<?php
    echo("</div>");
}?>   
</section>

</section>

<div class= "table">
<table id="visitorTable">
    <tr>
        <h3 id= "tableTitle"></h3>
        <th></th>
            <td></td>
        <th></th>
            <td></td>
        <th></th>
            <td></td>
        <th></th>
            <td></td>
        <th></th>
            <td></td>
        <th></th>
            <td></td>
    </tr>
</table>
</div>

<footer id= "footer"> 
<?php include('includes/cookies.html');?>
</footer>

<script src="./js/table.js"></script>
</body>
</html>