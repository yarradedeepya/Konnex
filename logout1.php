<?php
session_start();
unset($_SESSION["name"]);
header("Location:guide1.php");
?>
