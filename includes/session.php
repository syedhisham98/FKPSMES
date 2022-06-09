<?php
	session_start();
	include 'conect.php';

	if(!isset($_SESSION['user']) || trim($_SESSION['user']) == ''){
		header('location: ../../ApplicationLayer/ManageUser/index.php');
	}
	if(isset($_SESSION['usertype']))
	{
		$usertype=$_SESSION['usertype'];
		
		if($usertype=="admin")
		{
			$sql = "SELECT * FROM admin WHERE Username = '".$_SESSION['user']."'";
			$query = $conn->query($sql);
			$user = $query->fetch_assoc();
		}
		elseif ($usertype=="student")
		{
			$sql = "SELECT * FROM student WHERE username = '".$_SESSION['user']."'";
			$query = $conn->query($sql);
			$user = $query->fetch_assoc();
		}
		elseif ($usertype=="lecturer")
		{
			$sql = "SELECT * FROM lecturer WHERE username = '".$_SESSION['user']."'";
			$query = $conn->query($sql);
			$user = $query->fetch_assoc();
		}
		elseif ($usertype=="secretariat")
		{
			$sql = "SELECT * FROM secretariat WHERE username = '".$_SESSION['user']."'";
			$query = $conn->query($sql);
			$user = $query->fetch_assoc();
		}
	}

	
	
?>