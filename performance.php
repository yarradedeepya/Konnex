<?php
session_start();

$n=get_current_user();
?>
<html>
  <head>
    <title>Registration Page</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
      <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<style>
.content {
  max-width: 500px;
  margin: auto;
  background:white;
  padding: 30px;
}
body{
padding:150px;
}
p {
  font-size: 14px;
}
</style>
  </head>
  <body style="background-color:#553D67">
    <br>
    <div class="content">
    <!-- <p><b>No of Users Currently on website:</b><p>;-->
      <?php
    $conn =mysqli_connect('localhost','root','','airbus');
    $result=mysqli_query($conn, "SELECT Rating FROM  `Ratings` ") or die ('Problem with query' . mysqli_error($conn));
    if (mysqli_num_rows($result)>0)
    {
     $i=0;
     $j=0;
           while($row = $result->fetch_assoc())
            {
              $j=$j+$row["Rating"];
              $i++;
             }
             $f=$j/$i;
      ?><p><b>Number Of Users Given Rating: <?php echo $i;?> </b></p>
      <P><b>Average User Rating: <?php echo number_format((float)$f, 2, '.', '');?> </b></p>
      <?php

      }
      else{
        ?>
        <p><b>No Rating till now ,give us feedback</b></p>
        <?php
      }

    ?></p>
  </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

      </body>
    </html>
