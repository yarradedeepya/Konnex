<?php

        require_once("connection.php ");

        if(isset($_GET['Del']))
        {
            $name = $_GET['Del'];
            $query = " delete from options where name = '".$name."'";
            $result = mysqli_query($con,$query);

            if($result)
            {
                header("location:navigation.php");
            }
            else
            {
                echo "<script type='text/javascript'>alert('Please check your Query');
					window.location='view.php';
					</script>";
            }
        }
        else
        {
            header("location:view.php");
        }
 ?>
