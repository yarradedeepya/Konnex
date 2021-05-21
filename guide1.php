<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<title>Font Awesome 5 Icons</title>
<meta name='viewport' content='width=device-width, initial-scale=1'>
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
<!--Get your own code at fontawesome.com-->
<style>
  .column {
    float: left;
    width: 35.3%;
    padding: 1%;
  }

  .row::after {
  content: "";
  clear: both;
  display: table;
}
a{
        color: black;
        text-decoration: none;
        }
</style>
</head>
<body style="background-color:#CCCCCC">
<div>
  <div align="right">
  <button type="submit" name="marks"><a href="http://localhost/airbus/admin.php">Admin Login</a></button>
  </div>
  <div class="row">
  <div class="column">
  <a href="navigation.php">
  <figure>
  <img id="guide" src="naviga.PNG" alt="guide" height="10%" width="25%">
  <figcaption>Navigation.</figcaption>
  </figure>
  </a>
  </div>
<div class="column">
  <a href="Chatbot.php">
  <figure>
  <img id="guide" src="chatbot1.png" alt="guide" height="10%" width="25%">
  <figcaption>ChatterBot.</figcaption>
  </figure>
  </a>
  </div>
<div class="column">
  <a href="bugreport.php">
  <figure>
  <img id="guide" src="bug reporting.PNG" alt="guide" height="10%" width="25%">
  <figcaption>Bug Reporting.</figcaption>
  </figure>
  </a>
  </div>
</div>
<div class="row">
  <div class="column">
    <a href="announcements.php">
  <figure>
  <img id="guide" src="announcements.PNG" alt="guide" height="10%" width="25%">
  <figcaption>Announcements.</figcaption>
  </figure>
  </a>
  </div>
<div class="column">
  <a href="http://localhost/airbus/rate/examples/rate.php">
  <figure>
  <img id="guide" src="feedback.PNG" alt="guide" height="10%" width="25%">
  <figcaption>Feedback.</figcaption>
  </figure>
  </a>
  </div>
<div class="column">
    <a href="performance.php">
  <figure>
<img id="guide" src="performance.PNG" alt="guide" height="10%" width="25%">
  <figcaption>performance.</figcaption>
  </figure>
  </a>
  </div>
</div>
</div>
<?php
 if(isset($_SESSION["name"])) {
   ?>
  <div align="right">
  <button type="submit" name="marks"><a href="http://localhost/airbus/logout1.php">Admin Logout</a></button>
 <?php }?>
</body>
</html>
