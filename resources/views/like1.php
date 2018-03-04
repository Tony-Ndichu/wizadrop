<?php
	include ('conn.php');
	if (!isset($_SESSION)){
 session_start();
 }
 
	if (isset($_POST['like'])){		
 
		$id = $_POST['id'];
		$query=mysqli_query($conn,"select * from `thelikes` where postid='$id' and userid='".$_SESSION['user']."'") or die(mysqli_error());
 
		if(mysqli_num_rows($query)>0){
			mysqli_query($conn,"delete from `thelikes` where userid='".$_SESSION['user']."' and postid='$id'");
		}
		else{
			mysqli_query($conn,"insert into `thelikes` (userid,postid) values ('".$_SESSION['user']."', '$id')");
		}
	}		
?>