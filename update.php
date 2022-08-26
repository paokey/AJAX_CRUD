<?php
	require_once 'conn.php';
	
	if(ISSET($_POST['update'])){
		try{
			$user_id = $_POST['user_id'];
			$name = $_POST['name'];
			$email = $_POST['email'];
			$password = $_POST['password'];
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "UPDATE `user`SET `name` = '$name', `email` = '$email', `password` = '$password' WHERE `user_id` = '$user_id'";
			$conn->exec($sql);
		}catch(PDOException $e){
			echo $e->getMessage();
		}
		
		$conn = null;
		header('location:index.php');
	}
?>