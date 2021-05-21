<!DOCTYPE html>
<?php
session_start();
unset($_SESSION["name"]);
?>
<html>
<head>
  <title>index Page</title>
  <!-- link style sheet for guide-->
  <link rel="stylesheet" type="text/css" href="styles/page1style.css">


    <!-- link sceipt file for guide-->

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
</head>
<style>

ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  width: 200px;
  background-color: #f1f1f1;
}

li a {
  display: block;
  color: #000;
  padding: 8px 16px;
  text-decoration: none;
}

li a.active {
  background-color: #4CAF50;
  color: white;
}

li a:hover:not(.active) {
  background-color: #555;
  color: white;
}
h4{
color: red;
}
</style>
<body>

<div align="center"><h4>This is dumy page using our guide.</h4></div>

<ul>
  <li><a class="active" href="page1.php">Home</a></li>
  <li><a href="page2.html">News</a></li>
  <li><a href="page3.html">Contact</a></li>
  <li><a href="page4.html">About</a></li>
</ul>
<div><img id="guide" src="guide.PNG" alt="guide"  align="right"><div><div id="div1"></div>
<div id="div1"></div>

  <script src="jsfiles/guide.js" type="text/javascript"></script>
</body>
</html>
