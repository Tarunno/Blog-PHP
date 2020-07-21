<?php
	include 'curd.inc.php';

	$id = $_GET['id'];
	$post = selectOne('posts', ['id' => $id]);
	$comments = selectAll('comments', ['post_id' => $id]);

	if(isset($_POST['rating_submit'])){
		$rating = $_POST['name'];
		$sql = "UPDATE posts SET sum_rating = sum_rating + '$rating',  rated_users = rated_users + 1 WHERE id = '$id';";
		mysqli_query($con, $sql);
		$post = selectOne('posts', ['id' => $id]);
		unset($_POST['rating_submit']);
		header("Location: ../single.php?id=$id");
		exit();
	}
	 if(isset($_POST['comment-submit'])){
		 unset($_POST['comment-submit']);
		 $_POST['post_id'] = $_GET['id'];
		 create('comments', $_POST);
		 //printer($_POST);
		 header("Location: ../single.php?id=$id");
 		 exit();
	 }
