<?php
     session_start();
    require_once("connection.php");
    $query = " select * from options ";
    $result = mysqli_query($con,$query);
?>
<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" a href="CSS/bootstrap.css"/>
    <title>View Records</title>

		<style>
		body {
		  font-family: "Lato", sans-serif;
		}

		.openbtn {
		  font-size: 20px;

		  cursor: pointer;
		  background-color: #111;
		  color: white;
		  padding: 10px 15px;
		  border: none;
		}

		.openbtn:hover {
		  background-color: #444;
		}

		#main {
		  transition: margin-left .5s;
		  padding: 16px;
		}

		* {
			box-sizing: border-box;
		}

			body {
				font-family: Arial, Helvetica, sans-serif;
				margin: 0;
			}

			/* Style the header */
			.header {
				padding: 10px;
				width: 100%;
				background: #3498db;
				color: white;
			}

			/* Increase the font size of the h1 element */
			.header h1 {
				font-size: 0px;
			}

			/* Style the top navigation bar */
			.navbar {
				overflow: hidden;
				background-color: #333;
				width: 100%;
			}

			/* Style the navigation bar links */
			.navbar a {
				float: left;
				display: block;
				color: white;
				background-color: match-parent;
				text-align: center;
				padding: 10px 30px;
				text-decoration: none;
			}

			/* Change color on hover */
			.navbar a:hover {
				background-color: #777;
				color: white;
			}

			/* Column container */
			.row {
				display: flex;
				flex-wrap: wrap;
			}


			/* Main column */
			.main {
				flex: 70%;
				background-color: white;
				padding: 20px;
			}

			/* Responsive layout - when the screen is less than 700px wide, make the two columns stack on top of each other instead of next to each other */
			@media screen and (max-width: 700px) {
			.row {
				flex-direction: column;
			  }
			}

			/* Responsive layout - when the screen is less than 400px wide, make the navigation links stack on top of each other instead of next to each other */
			@media screen and (max-width: 400px) {
			  .navbar a {
				float: none;
				width:100%;
			  }
			}

			* {
		  box-sizing: border-box;
		}

		#myInput {
		  background-image: url('search.png');
		  background-size: 25px 25px;
		  background-position: 10px 12px;
		  background-repeat: no-repeat;
		  width: 100%;
		  font-size: 16px;
		  padding: 12px 20px 12px 40px;
		  border: 1px solid #ddd;
		  margin-bottom: 12px;
		}

		#myUL {
		  list-style-type: none;
		  padding: 0;
		  margin: 0;
		}

		#myUL li a {
		  border: 1px solid #ddd;
		  margin-top: -1px; /* Prevent double borders */
		  background-color: #f6f6f6;
		  padding: 12px;
		  text-decoration: none;
		  font-size: 18px;
		  color: black;
		  display: block
		}

		#myUL li a:hover:not(.header) {
		  background-color: #eee;
		}
    table {
      font-family: arial, sans-serif;
      border-collapse: collapse;
      width: 100%;
    }

    td, th {
      border: 1px solid #dddddd;
      text-align: left;
      padding: 8px;
    }

    tr:nth-child(even) {
      background-color: #dddddd;
    }

    body {
      font-family: "Lato", sans-serif;
    }

    .openbtn {
      font-size: 20px;

      cursor: pointer;
      background-color: #111;
      color: white;
      padding: 10px 15px;
      border: none;
    }

    .openbtn:hover {
      background-color: #444;
    }

    #main {
      transition: margin-left .5s;
      padding: 16px;
    }

    * {
      box-sizing: border-box;
    }

      body {
        font-family: Arial, Helvetica, sans-serif;
        margin: 0;
      }

      /* Style the header */
      .header {
        padding: 10px;
        width: 100%;
        background: #3498db;
        color: white;
      }

      /* Increase the font size of the h1 element */
      .header h1 {
        font-size: 0px;
      }

      /* Style the top navigation bar */
      .navbar {
        overflow: hidden;
        background-color: #333;
        width: 100%;
      }

      /* Style the navigation bar links */
      .navbar a {
        float: left;
        display: block;
        color: white;
        background-color: match-parent;
        text-align: center;
        padding: 10px 30px;
        text-decoration: none;
      }

      /* Change color on hover */
      .navbar a:hover {
        background-color: #777;
        color: white;
      }

      /* Column container */
      .row {
        display: flex;
        flex-wrap: wrap;
      }


      /* Main column */
      .main {
        flex: 70%;
        background-color: white;
        padding: 20px;
      }


      /* Footer */
      .footer {
        padding: 23px;
        text-align: center;
        background: #333;
      }

      /* Responsive layout - when the screen is less than 700px wide, make the two columns stack on top of each other instead of next to each other */
      @media screen and (max-width: 700px) {
      .row {
        flex-direction: column;
        }
      }

      /* Responsive layout - when the screen is less than 400px wide, make the navigation links stack on top of each other instead of next to each other */
      @media screen and (max-width: 400px) {
        .navbar a {
        float: none;
        width:100%;
        }
      }

		</style>

		<script>
			function myFunction() {
				var input, filter, ul, li, a, i, txtValue;
				input = document.getElementById("myInput");
				filter = input.value.toUpperCase();
				ul = document.getElementById("myUL");
				li = ul.getElementsByTagName("li");
				for (i = 0; i < li.length; i++) {
					a = li[i].getElementsByTagName("a")[0];
					txtValue = a.textContent || a.innerText;
					if (txtValue.toUpperCase().indexOf(filter) > -1) {
						li[i].style.display = "";
					} else {
						li[i].style.display = "none";
					}
				}
			}
		</script>
	</head>
  <body>
    <?php
     if(isset($_SESSION["name"])) {
       ?>
       <div class="header" >

         <h1 align = "center" ><b><font size = "7px">NAVIGATION MANAGER</font></br></h1>

         <h3 style = "color:black"> &nbsp &nbsp &nbsp NAVIGATION DETAILS</h3>

       </div>

       <div class="navbar">

         <a href="add.php" style = "background-color:green">ADD NEW</a>
       </div>

       <div>

         <table border = "1" >
           <tr>
             <th> Name </th>
             <th> Link </th>

             <th><font color = "red"> Delete </font></th>
           </tr>

                    <?php

             while($row=mysqli_fetch_assoc($result))
             {
               $name = $row['name'];
               $link = $row['link'];
           ?>

                    <tr>
             <td><?php echo $name ?></td>
             <td><?php echo $link ?></td>

             <td><a style ="text-decoration:none" href="delete.php?Del=<?php echo $name ?>"><font color = "red">Delete</font></a></td>
                    </tr>
                    <?php
             }
           ?>
                </table>
       </div>

       <?php
     }else{
       ?>
       <div class="header" >

       <h1 align = "center" ><b><font size = "7px">NAVIGATION</font></br></h1>

     </div>



     <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names.." title="Type in a name"/>

     <ul id="myUL">

       <?php

         while($row=mysqli_fetch_assoc($result))
         {
           $name = $row['name'];
           $link = $row['link'];
       ?>

       <li><a style ="text-decoration:none" href="<?php echo $link ?>" target="_blank"><?php echo $name ?></a></li>

              <?php
         }
       ?>

    <?php }
    ?>
  </body>
  </html>
