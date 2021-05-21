
<?php
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
?>
