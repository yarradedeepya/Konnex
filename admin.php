<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Admin Login</title>
  </head>
  <body>
    <div class="container">
    <h5 align = "center" style="color: skyblue;">Admin Login </h5>
    <br><br>
      <form action="guide.php" method="POST">
        <center>
        <div class="form-group" >
          <br>
          <br>
          <br>
          <label for="uname"><b>Username&nbsp&nbsp</b></label>
          <input type="text" class="form-conrol" placeholder="Enter Username" name="uname" size="30" required>
          <br>
          <br>
          <label for="psw"><b>Password&nbsp&nbsp</b></label>
          <input type="password" class="form-conrol" placeholder="Enter Password" name="psw" size="30" required>
          <br>
          <br>
          <br>

          <button type="submit" class="btn btn-primary" name="marks">Submit</button>
        </div>
      </center>
</form>
