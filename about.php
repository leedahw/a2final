<?php
session_start();
include('includes/standardheader.html');?>

<!DOCTYPE html>
<html lang="en">
<head>

	<h1>ABOUT</h1>
</head>
<body>
<?php
	include('includes/dbconfig.php');

	$stmt = $pdo->prepare("SELECT * FROM `about`");

	$stmt->execute();

	while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {     
		// recursively print out object.
		echo("<p>");
		echo($row["content"]); //or $row[0];
		echo("</p>");
		?>
		<a href="edit-about.php?aboutId=<?php echo($row["aboutId"]); ?>"><br/>Edit</a>
		<?php
		
	}
?>
</body>
</html>