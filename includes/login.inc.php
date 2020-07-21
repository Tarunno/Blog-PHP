<?php
	include 'curd.inc.php';

	$email = '';
	$password ='';

	if(isset($_POST['login-submit'])){
		$errors = array();

		if(empty($_POST['email'])){
			array_push($errors, 'Email is required');
		}
		if(empty($_POST['password'])){
			array_push($errors, 'Password is required');
		}
		$exitsUser = selectOne('users', ['email' => $_POST['email']]);

		if(mysqli_num_rows($exitsUser) === 0){
			array_push($errors, 'Invalid email or password');
		}
		else{
			$row = mysqli_fetch_assoc($exitsUser);
			$password = $row['password'];
		}
		if(!password_verify($_POST['password'], $password)){
			array_push($errors, 'Invalid email or password');
		}

		if(count($errors) === 0){
			$_SESSION['id'] = $row['id'];
			$_SESSION['username'] = $row['username'];
			$_SESSION['admin'] = $row['admin'];
			$_SESSION['message'] = 'You are loged in!';
			$_SESSION['type'] = 'success';
			$_SESSION['profile_img_status'] = $row['profile_img_status'];
			$_SESSION['users_create_time'] = $row['users_create_time'];
			header("Location:  index.php?status=successful");
		}
	}
