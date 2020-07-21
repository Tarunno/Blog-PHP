<?php
	include 'curd.inc.php';

	$topics = selectAll('topics');

	$id = '';
	$title = '';
	$description = '';

	if(isset($_POST['create-submit'])){
		unset($_POST['create-submit']);
		printer($_POST);
		create('topics',  $_POST);
		$_SESSION['message'] = 'Topic created successfully';
		header("Location: ../admin/topics/index.php");
		exit();
	}

	if(isset($_GET['id'])){
		$id = $_GET['id'];
		$result = selectOne('topics', ['id' => $id]);
		$row = mysqli_fetch_assoc($result);
		$id = $row['id'];
		$title = $row['title'];
		$description = $row['description'];
	}

	if(isset($_POST['edit-submit'])){
		$id = $_POST['id'];
		unset($_POST['edit-submit'], $_POST['id']);
		update('topics', $id, $_POST);
		header("Location: ../topics/index.php");
		exit();
	}

	if(isset($_GET['del_id'])){
		$id = $_GET['del_id'];
		delete('topics', $id);
		header("Location: ../topics/index.php");
		exit();
	}
