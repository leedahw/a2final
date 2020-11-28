<?php session_start();
//contact-form.php
include("includes/standardheader.html");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/main.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="contact form to submit. open to public">
    <meta name="keywords" content="HTML, PHP, IMM, News, Network, contact, form">
    <meta name="author" content="Alana Dahwoon Lee">
    <title>Contact Page</title>
</head>
<body>
<h1>CONTACT US</h1>

<div id ="contact-form">
    <p id="message"></p>
<form id="form">
    Name: <input type ="text" id= "name" name ="name" required><br/>
    <br/>
    Email Address: <input type = "email" id="emailAddress" name ="emailAddress" required><br/>
    <br/>
    Interests:
        <input type = "checkbox" id= "interests" name = "interests[];" value = "tech"><label id ="interestOption" for = "tech">Tech</label>
        <input type = "checkbox" id= "interests" name = "interests[];" value = "industry"><label id ="interestOption" for = "industry">Industry</label>
        <input type = "checkbox" id= "interests" name = "interests[];" value = "career"><label id ="interestOption" for ="career">Career</label><br/>
    <br/>
    Your Role: <br/>
    <select name="userRole" id="userRole">
        <option id="userRole" value = "writer">Writer</option>
        <option id="userRole" value = "contributor">Contributor</option>
        <option id="userRole" value = "administrator">Administrator</option>
    </select>
    <br/>
    <br/> 
    <button type = "submit" id="submit-data" value="Submit">SUBMIT</button>
<form>
</div>

    <section id="submission-data">


    </section>

<script src= "./js/main.js"></script>

</body>
</html>