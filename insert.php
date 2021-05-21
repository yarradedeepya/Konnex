<?php

    require_once("connection.php");

    if(isset($_POST['submit']))
    {
        if(empty($_POST['name']) || empty($_POST['link']))
        {
            echo "<script type='text/javascript'>alert('Enter Username and Password');
					window.location='reg.php';
					</script>";
        }
        else
        {
			$name = $_POST['name'];
			$link = $_POST['link'];

            //$query = " insert into products (ProductName, Prize, Quantity, Threshold, Description) values('$ProductName','$Prize', '$Quantity','$Threshold','$Description')";
            $query = " insert into options (name, link) values ('$name', '$link')";
            $result = mysqli_query($con,$query);

            if($result)
            {
                header("location:navigation.php");
            }
            else
            {
                echo "<script type='text/javascript'>alert('Please check your Query');
					window.location='reg.php';
					</script>";
            }
        }
    }
    else
    {
        header("location:view.php");
    }
?>
