<?php
	include 'curd.inc.php';

	$username = '';
	$email = '';
	$password ='';
	$repassword ='';

	if(isset($_POST['signup-submit'])){
		$errors = array();

		if(empty($_POST['username'])){
			array_push($errors, 'Username is required');
		}
		if(empty($_POST['email'])){
			array_push($errors, 'Email is required');
		}
		if(empty($_POST['password'])){
			array_push($errors, 'Password is required');
		}
		if(empty($_POST['re-password'])){
			array_push($errors, 'Please re-enter the password');
		}
		if($_POST['password'] !== $_POST['re-password']){
			array_push($errors, 'Password did not matach');
		}
		if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
            array_push($errors, 'Please enter a valid email');
        }
		if(!preg_match("/^[a-zA-Z0-9]*$/", $_POST['username'])){
            array_push($errors, 'Invalid username format');
        }
		$exitsUser = selectOne('users', ['email' => $_POST['email']]);
		if(mysqli_num_rows($exitsUser) !== 0){
			array_push($errors, 'Email already exists');
		}

		if(count($errors) === 0){
			unset($_POST['signup-submit'], $_POST['re-password']);
			$_POST['admin'] = 0;
			$_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
			$_POST['profile_img_status'] = 0;
			create('users', $_POST);
			header("Location: login.php");
		} else {
			$username = $_POST['username'];
			$email = $_POST['email'];
			$password = $_POST['password'];
			$repassword = $_POST['re-password'];
		}
	}
