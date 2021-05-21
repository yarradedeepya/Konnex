<?php
 session_start();
 ?>
<html>
<html lang="en">
<head>
  <meta charset="UTF-8"/>
  <title>Feed Back</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, shrink-to-fit=no">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src='https://kit.fontawesome.com/a076d05399.js'></script>
  <style>
  .checked {
  color: white;
}
input[type=text] {
  border: none;
  background-color: none;
  outline: 0;
  font-size: 25px;
  width: 1000px;
  height: 30px;
}

input[type=text]:focus {
  border: none;
  background-color: none;
  outline: 0;
  width: 100%;
  height: 30%;
}
.button1 {
  width: 100px;
  display: inline-block;
  padding: 15px 25px;
  font-size: 15px;
  cursor: pointer;
  text-align: center;
  text-decoration: none;
  outline: none;
  color: white;
  background-color:blue;
  border: 1;
  box-shadow: 2px lightgray;
  border-radius: 10px;
  border-color:lightgray

}

.button1:hover {background-color: pink}

.button1:active {
  background-color: pink;
  box-shadow: 0 5px #666;
  transform: translateY(4px);
}
  </style>
 </head>
<body>
  <?php
   if(isset($_SESSION["name"])) {
     ?>
     Welcome <?php echo $_SESSION["name"];
   }
   else{?>
     <form method="post" action="feedback.php">
       <div class="container">
       <div class="row">
         <div class="col-sm-3">
           <div class="rating-block">
             <h4>Rate us:</h4>
             <input type="hidden" id="myrank" name="rank" value=0>
             <button type="button" class="btn btn-default"  >
               <span class="fa fa-star checked"  onclick = "changecolor1()" id="image1"></span>
             </button>
             <button type="button" class="btn btn-default "  >
              <span class="fa fa-star checked" onclick = "changecolor2()" id="image2"></span>
             </button>
             <button type="button" class="btn btn-default "  >
              <span class="fa fa-star checked" onclick = "changecolor3()" id="image3"></span>
             </button>
             <button type="button" class="btn btn-default"  >
            <span class="fa fa-star checked" onclick = "changecolor4()" id="image4"></span>
             </button>
             <button type="button" class="btn btn-default">
              <span class="fa fa-star checked"  onclick = "changecolor5()" id="image5" ></span>
             </button>
           </div>
         </div>
       </div>
       </div>
     <hr>
     <br>
     <small id="info" class="form-text text-muted">Suggestions.</small>
     <input type="text" class="center" name="rev" placeholder="Enter your review here.">
     <br>



     <div align="center"><button type="submit" class="button1" name="subm">Submit</button></div>
   </form>

   <div id="in"></div>
     <script>
     function changecolor1(){
     document.getElementById("myrank").value =1;
     document.getElementById("image1").style.color= "orange";
      document.getElementById("image2").style.color= "grey";
         document.getElementById("image3").style.color= "grey";
           document.getElementById("image4").style.color= "grey";
           document.getElementById("image5").style.color= "grey";

     };
     function changecolor2(){
     document.getElementById("image1").style.color= "orange";
       document.getElementById("image2").style.color= "orange";
        document.getElementById("image3").style.color= "grey";
           document.getElementById("image4").style.color= "grey";
           document.getElementById("image5").style.color= "grey";

       document.getElementById("myrank").value =2;
     };
     function changecolor3(){
     document.getElementById("image1").style.color= "orange";
       document.getElementById("image2").style.color= "orange";
         document.getElementById("image3").style.color= "orange";
         document.getElementById("image4").style.color= "grey";
           document.getElementById("image5").style.color= "grey";
           document.getElementById("myrank").value =3;
     };
     function changecolor4(){
     document.getElementById("image1").style.color= "orange";
       document.getElementById("image2").style.color= "orange";
         document.getElementById("image3").style.color= "orange";
           document.getElementById("image4").style.color= "orange";
           document.getElementById("image5").style.color= "grey";
             document.getElementById("myrank").value =4;
     };
     function changecolor5(){
     document.getElementById("image1").style.color= "orange";
       document.getElementById("image2").style.color= "orange";
         document.getElementById("image3").style.color= "orange";
           document.getElementById("image4").style.color= "orange";
           document.getElementById("image5").style.color= "orange";
             document.getElementById("myrank").value =5;
     };
     </script>
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
          $sql = "INSERT INTO `Rating` (`Id`,`Rating`,`Message`) VALUES ('', '".$rate."','".$Suggestion."')";
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
      }
    }
    ?>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>


</body>

</html>
