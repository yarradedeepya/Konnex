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
<style>
p {
  font-size: 14px;
}
</style>
  </head>
  <body>
    <?php
     session_start();
     if(isset($_SESSION["name"])) {
       $conn =  mysqli_connect('localhost','root','','airbus');
       $result=mysqli_query($conn, "SELECT BugName,BugDate,BugRemark FROM  `bug_db` ") or die ('Problem with query' . mysqli_error($conn));
       if (mysqli_num_rows($result)>0)
       {
        $i=0;
        $Bugn=[];
        $BugR=[];
        $Bugd=[];
        $j=0;
              while($row = $result->fetch_assoc())
               {

                 $Bugn[$i]=$row["BugName"];
                 $Bugd[$i]=$row["BugDate"];
                 $BugR[$i]=$row["BugRemark"];
                 $i++;
                }

          foreach($Bugn as $item)
           {

               ?><div class="alert alert-primary" role="alert">
               <p align="right">Bug-Date:<?php echo $Bugd[$j]; ?></p><br>
               <p><?php echo htmlspecialchars($item)?></p><br><br><p>Bug-Remarks:<?php echo $BugR[$j];?></p></div><br><?php
               $j++;

             }
           }

     }
     else{?>
    <div style="background-color:#97AABD">
    <br>
    <div class="container">
      <div class="row col-md-6 col-md-offset-3">
        <div class="panel panel-primary">
          <div class="panel-heading text-center">
            <h1>Bug Registration Form</h1>
          </div>
          <div class="panel-body">
            <form action="bugreport.php" method="post">
              <div class="form-group">
                <label for="BugName">Bug Name</label>
                <input
                  type="text"
                  class="form-control"
                  id="BugName"
                  name="BugName"
                />
              </div>
              <div class="form-group">
                <label for="BugDate">Bug Date</label>
                <input
                  type="Date"
                  class="form-control"
                  id="BugDate"
                  name="BugDate"

                />
              </div>


              <div class="form-group">
                <label for="email">Email</label>
                <input
                  type="text"
                  class="form-control"
                  id="email"
                  name="email"
                />
              </div>
              <div class="form-group">
                <label for="Bug Remark">Bug Remark</label><br>
                <textarea id="BugRemark" name="BugRemark" rows="4" cols="50"></textarea>
              </div>

              <input type="submit" name="sub" class="btn btn-primary" />
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php }
if(isset($_POST['sub'])){
  $BugName = $_POST['BugName'];
  $BugDate = $_POST['BugDate'];
  $EmailId = $_POST['email'];
  $BugRemark = $_POST['BugRemark'];

  // Database connection
  $conn =  mysqli_connect('localhost','root','','airbus');
  if($conn === false){
            die("ERROR: Could not connect. "
                . mysqli_connect_error());
        } else {
    $sql = "INSERT INTO `bug_db` (`Id`,`BugName`,`BugDate`,`EmailId`,`BugRemark`) VALUES ('', '".$BugName."','".$BugDate."','".$EmailId."','".$BugRemark."')";
    if(mysqli_query($conn,$sql))
    {?>
      <div class="alert alert-warning alert-dismissible fade show" role="alert">
        Bug is reported.
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
}?>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

  </body>
</html>
