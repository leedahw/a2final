<?php
session_start();
include('includes/standardheader.html');
if($_SESSION["userType"]=='admin'){
//allowed to see this page
//insert-article.php
?>

<html lang="en">
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="form to insert article content">
    <meta name="keywords" content="HTML, PHP, IMM, News, Network, article, form, insert">
    <meta name="author" content="Alana Dahwoon Lee">
    <title>insert article form</title>
</head>
<body>
	<form action="process-insert-article.php" method="POST" enctype = "multipart/form-data">
		Image: <input type="file" name="img" id="img" required/><br/><br/>
		Title: <input type="text" name="title" required/><br/><br/>
		Author: <input type="text" name="author" required/><br/><br/>
		Preview: <input type="text" name="content" required/><br/><br/>
		Category: <select name="category" id="category">
			<option value = "tech">tech</option>
			<option value = "industry">industry</option>
			<option value = "career">career</option>
			</select><br/><br/>
		Featured: <select name="featured" id="featured">
			<option value = "yes">yes</option>
			<option value = "no">no</option>
		</select><br/><br/>
		Link: <input type="URL" name="articleLink" /><br/><br/>
		<input type="submit" value = "Submit" />
	</form>
	</body>
    </html><?php
}else{    
	//DO NOT SHOW this page
	?>
	<p>ACCESS DENIED. Admin Access Only</p>
    <a href="homepage.php">Back to Home</a><?php
}
?>