<?php
	include 'curd.inc.php';

	$topic = selectAll('topics');
	$posts = selectAll('posts', ['user_id' => $_SESSION['id']]);
	$msg = '';

	$id = '';
	$title = '';
	$body = '';
	$topics = '';
	$published = '';
	$image = '';
	$user_id = '';
	$created_at = '';
	$trending = '';

	if(isset($_GET['id'])){
		$id = $_GET['id'];
		$post = selectAll('posts', ['id' => $_GET['id']]);
		$row = mysqli_fetch_assoc($post);
		$title = $row['title'];
		$body = $row['body'];
		$topics = $row['topics'];
		$published = $row['published'];
		$image = $row['image'];
		$user_id = $row['user_id'];
		$trending = $row['trending'];
	}

	if(isset($_GET['del_id'])){
		$id = $_GET['del_id'];
		delete('posts', $id);
		header("Location: profile_edit.php");
		exit();
	}

	if(isset($_POST['post-submit'])){
		$file = $_FILES['post-image'];

		$file_name = $file['name'];
		$file_tmp_name = $file['tmp_name'];
		$file_type = $file['type'];
		$file_size = $file['size'];
		$file_error = $file['error'];

		$file_ext = explode('.', $file_name);
		$file_name = $file_ext[0];
		$file_actual_ext = strtolower(end($file_ext));

		$allowed = array('jpg', 'jpeg', 'png');

		if(in_array($file_actual_ext, $allowed)){
			if($file_error === 0){
				if($file_size < 250000000){
					$full_file_name = "image".$file_name."." . $file_actual_ext;
					$file_direction = "images/" . $full_file_name;
					move_uploaded_file($file_tmp_name, $file_direction);
					$_POST['image'] = $full_file_name;
				} else {
					header("Location: profile_edit.php?status=Invalid_file_formet");
					exit();
				}
			} else {
				header("Location: profile_edit.php?status=File_to_large");
				exit();
			}
		} else {
			header("Location: profile_edit.php?status=Uploading_error");
			exit();
		}
		unset($_POST['post-submit']);
		$_POST['user_id'] = $_SESSION['id'];
		$_POST['published'] = 0;
		$_POST['trending'] = 0;
		create('posts', $_POST);
		header("Location: profile_edit.php?status=Post_added_successfully");
		exit();
	}


	if(isset($_POST['edit-submit'])){
		$id = $_POST['id'];
		unset($_POST['edit-submit'], $_POST['id']);
		update('posts', $id, $_POST);
		header("Location: profile_edit.php");
	}
