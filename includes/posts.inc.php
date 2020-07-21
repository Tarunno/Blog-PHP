<?php
	include 'curd.inc.php';

	$topic = selectAll('topics');
	$posts_obj = selectAll('posts');
	$posts = selectAll('posts');
	$post_array = array();
	while($row = mysqli_fetch_assoc($posts)){
		$post_array[] = $row;
	}
	$posts = array_reverse($post_array);;

	$id = '';
	$title = '';
	$body = '';
	$topics = '';
	$published = '';
	$image = '';
	$user_id = '';
	$created_at = '';
	$trending = '';

	$msg = '';

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
		header("Location: ../post/index.php");
		exit();
	}

	if(isset($_GET['pub_id'])){
		$id = $_GET['pub_id'];
		$post = selectAll('posts', ['id' => $_GET['pub_id']]);
		$row = mysqli_fetch_assoc($post);
		unset($row['id']);
		if($row['published'] == 1){
			$row['published'] = 0;
		} else {
			$row['published'] = 1;
		}
		update('posts', $id, $row);
		header("Location: ../admin/post/index.php");
		exit();
	}

	if(isset($_GET['tre_id'])){
		$id = $_GET['tre_id'];
		$post = selectAll('posts', ['id' => $_GET['tre_id']]);
		$row = mysqli_fetch_assoc($post);
		unset($row['id']);
		if($row['trending'] == 1){
			$row['trending'] = 0;
		} else {
			$row['trending'] = 1;
		}
		update('posts', $id, $row);
		header("Location: ../admin/post/index.php");
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
					$file_direction = "../images/" . $full_file_name;
					move_uploaded_file($file_tmp_name, $file_direction);
					$_POST['image'] = $full_file_name;
				} else {
					header("Location: ../admin/post/create.php?error=too_large_file");
					exit();
				}
			} else {
				header("Location: ../admin/post/create.php?error=uploading_error");
				exit();
			}
		} else {
			header("Location: ../admin/post/create.php?error=invalid_file_fromat");
			exit();
		}
		unset($_POST['post-submit']);
		$_POST['user_id'] = $_SESSION['id'];
		$_POST['published'] = 0;
		$_POST['trending'] = 0;
		//printer($_POST);
		create('posts', $_POST);
		header("Location: ../admin/post/index.php?status=Post_added_successfully");
		exit();
	}


	if(isset($_POST['edit-submit'])){
		$id = $_POST['id'];
		unset($_POST['edit-submit'], $_POST['id']);
		update('posts', $id, $_POST);
		header("Location: ../post/index.php");
	}

	if(isset($_POST['search-submit'])){
		$search = mysqli_real_escape_string($con, $_POST['search-submit']);
		$sql = "SELECT * FROM posts WHERE title LIKE '%$search%' OR body LIKE '%$search%' OR topics LIKE '%$search%'";
		$posts = mysqli_query($con, $sql);
	}
