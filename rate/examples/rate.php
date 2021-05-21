<?php
 session_start();
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <title>Feed Back</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link href="../css/star-rating.css" media="all" rel="stylesheet" type="text/css"/>
    <!--suppress JSUnresolvedLibraryURL -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="js/star-rating.js" type="text/javascript"></script>
 </head>
<body>
  <?php
   if(isset($_SESSION["name"])) {
     $conn =  mysqli_connect('localhost','root','','airbus');
     $result=mysqli_query($conn, "SELECT Rating,Message FROM  `Ratings` ") or die ('Problem with query' . mysqli_error($conn));
     if (mysqli_num_rows($result)>0)
     {
      $i=0;
      $rati=[];
      $messg=[];
      $j=0;
            while($row = $result->fetch_assoc())
             {

               $rati[$i]=$row["Rating"];
               $messg[$i]=$row["Message"];
               $i++;
              }

        foreach($messg as $item)
         {

             ?><div class="alert alert-primary" role="alert">
             <p align="right">Rating:<?php echo $rati[$j]; ?></p><br>
             <?php echo htmlspecialchars($item)?></div><br><?php
             $j++;

           }
         }
   }
   else{?>
     <br>
     <br>
     <div style="background-color:#F4E4C1">
<div align="center">
<div class="abc" >

    <form action="rate.php" method="post">
        <label for="rate">Rate us:</label>
        <input id="input-21f" value="0" name="rate" type="text" data-min=0 data-max=5 data-step=0.5 data-size="md" title="">
        <hr>
        <div class="form-group" style="margin-top:10px">
            <label for="Message">Suggestions:</label><br>
            <textarea id="Message" name="Message" rows="5" cols="50"></textarea>
            <br>
            <br>
            <br>
            <br>
            <div align="center">
            <button type="submit" class="btn btn-primary" name="subm">Submit</button>
            <button type="reset" class="btn btn-default">Reset</button>
          </div>
        </div>
    </form>
    <hr>
    <script>
        jQuery(document).ready(function () {
            $("#input-21f").rating({
                starCaptions: function (val) {
                    if (val < 3) {
                        return val;
                    } else {
                        return val;
                    }
                },
                starCaptionClasses: function (val) {
                    if (val < 3) {
                        return 'label label-danger';
                    } else {
                        return 'label label-success';
                    }
                },
                hoverOnClear: false
            });
        });
    </script>
</div>
</div>
<?php
if(isset($_POST['subm'])){
  $rate=$_POST['rate'];
  $Suggestion= $_POST['Message'];
  // Database connection
  $conn =  mysqli_connect('localhost','root','','airbus');
  if($conn === false){
            die("ERROR: Could not connect. "
                . mysqli_connect_error());
        } else {
    $sql = "INSERT INTO `Ratings` (`Id`,`Rating`,`Message`) VALUES ('', '".$rate."','".$Suggestion."')";
    if(mysqli_query($conn,$sql))
    {?>
      <div class="alert alert-warning alert-dismissible fade show" role="alert">
        Feedback submitted.
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
}?></div><?php
}
?>

</body>
</html>
