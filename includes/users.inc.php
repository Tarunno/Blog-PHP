<?php
	include 'curd.inc.php';

	$username = '';
	$email = '';
	$password ='';
	$repassword ='';

	$users = selectAll('users');

	if(isset($_GET['del_id'])){
		$id = $_GET['del_id'];
		$del_post = selectAll('posts', ['user_id' => $id]);
		while($del_row = mysqli_fetch_assoc($del_post)){
			delete('posts', $del_row['id']);
		}
		delete('users', $id);
		header("Location: ../users/index.php");
		exit();
	}

	if(isset($_POST['create-submit'])){
		$errors = array();

		if(empty($_POST['username'])){
			array_push($errors, 'Username is required');
		}
		if(empty($_POST['email'])){
			array_push($errors, 'Email is required');
		} else {
			if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
	            array_push($errors, 'Please enter a valid email');
	        }
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
		if(!preg_match("/^[a-zA-Z0-9]*$/", $_POST['username'])){
            array_push($errors, 'Invalid username format');
        }
		$exitsUser = selectOne('users', ['email' => $_POST['email']]);
		if(mysqli_num_rows($exitsUser) !== 0){
			array_push($errors, 'Email already exists');
		}

		if(count($errors) === 0){
			unset($_POST['create-submit'], $_POST['re-password']);
			if($_POST['admin'] == 'admin'){
				$_POST['admin'] = 1;
			} else {
				$_POST['admin'] = 0;
			}
			$_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
			$_POST['profile_img_status'] = 0;
			create('users', $_POST);
			header("Location: ../users/index.php");
		} else {
			$username = $_POST['username'];
			$email = $_POST['email'];
			$password = $_POST['password'];
			$repassword = $_POST['re-password'];
		}
	}
