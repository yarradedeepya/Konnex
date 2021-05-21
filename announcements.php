<?php
session_start();
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Registration Page</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
      <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  </head>
<style type="text/css">
p {
  font-size: 14px;
}
	body{
		background-color: #7ac2c7;
		margin-top: 30px;
	}
	textarea{
		resize: none;
		height: 350px;
		width: 550px;
	}
</style>
    <body style="background-color:white">
      <?php
       if(isset($_SESSION["name"])) {
       ?>
	<center>
		<form action="announcements.php" method="post">
			<textarea name="notice"></textarea><br>
			<input type="submit" name="subi" class="btn btn-primary" />
	    </form>
	</center>
<?php
if(isset($_POST['subi'])){
$announce = $_POST['notice'];
$conn =  mysqli_connect('localhost','root','','airbus');
if($conn === false){
          die("ERROR: Could not connect. "
              . mysqli_connect_error());
      } else {
  $sql = "INSERT INTO `Notice` (`Id`,`notice`) VALUES ('', '".$announce."')";
  if(mysqli_query($conn,$sql))
  {?>
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
      Notice Posted.
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <?php
  }else {?>
  <div class="alert alert-warning alert-dismissible fade show" role="alert">
    ERROR:HUSH! sorry Please try later.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  <?php
  $conn->close();
}
}
}
}else{
  $conn =  mysqli_connect('localhost','root','','airbus');
  $result=mysqli_query($conn, "SELECT notice FROM  `Notice` ") or die ('Problem with query' . mysqli_error($conn));
  if (mysqli_num_rows($result)>0)
  {
   $i=0;
   $note=[];
   $j=0;
         while($row = $result->fetch_assoc())
          {

            $note[$i]=$row["notice"];
            $i++;
           }

     foreach($note as $item)
      {

          ?><div class="alert alert-primary" role="alert">
          <p><?php echo htmlspecialchars($item)?></div><br></p><?php
          $j++;

        }
      }
}
   ?>
   <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
   <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
   <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

</body>
</html>
