<?php
	include 'curd.inc.php';

	if(isset($_GET['load_all'])){
		$sql = "SELECT * FROM `posts` ORDER BY `created_at` DESC LIMIT 3;";
		$result = $con->query($sql);
		$output = "";
		while($post = $result->fetch_assoc()){
			$user = selectOne('users', ['id' => $post['user_id']]);
			$user_name = mysqli_fetch_assoc($user);
			if($post['published'] == 1){
				$output .= '<div class="content-post" data-aos="slide-right">
				<div class="post-image" style="background-image: linear-gradient(rgba(0, 0, 0, .4), rgba(0, 0, 0, .4)),url(images/'.$post['image'].');
							 background-size: cover;
							 background-position:center;">
				</div>
				<div class="post-preview">
					<h1> <a href="single.php?id='.$post['id'].'">'.$post['title'].'</a></h1>
					<i class="far fa-user"> <p>'.$user_name['username'].'</p></i>
					<p style="display: inline; padding:0px 5px 0px 5px;"> | </p>
					<i class="far fa-calendar-alt"> <p>'.$post['created_at'].'</p></i>
					<p style="display: inline; padding:0px 5px 0px 5px;"> | </p>
					<i class="fas fa-paperclip"></i> <p>'.$post['topics'].' | </p></i>
					<div class="rating_index" style="display: inline;">
						<i id="1" class="far fa-star"></i>
						<i id="2" class="far fa-star"></i>
						<i id="3" class="far fa-star"></i>
						<i id="4" class="far fa-star"></i>
						<i id="5" class="far fa-star"></i>
					</div>';
					if($post['rated_users'] == 0){
						$output .= '<input type="hidden" name="name" class="rating_holder_index" value="'.$post['sum_rating'].'">';
					}else{
						$output .= '<input type="hidden" name="name" class="rating_holder_index" value="'.floor($post['sum_rating'] / $post['rated_users']).'">';
					}
					$output .= '<br><br>
					<p>'.substr($post['body'], 0, 260).'<a href="single.php?id='.$post['id'].'">...read more</a></p>
				</div>
			</div>';
			}
		}
		print_r($output);
	}

	if(isset($_GET['load_more'])){
		$offset = $_GET['load_more'];
		$sql = "SELECT * FROM `posts` ORDER BY `created_at` DESC LIMIT 3 OFFSET $offset;";
		$result = $con->query($sql);
		$output = "";
		while($post = $result->fetch_assoc()){
			$user = selectOne('users', ['id' => $post['user_id']]);
			$user_name = mysqli_fetch_assoc($user);
			if($post['published'] == 1){
				$output .= '<div class="content-post" data-aos="slide-right">
				<div class="post-image" style="background-image: linear-gradient(rgba(0, 0, 0, .4), rgba(0, 0, 0, .4)),url(images/'.$post['image'].');
							 background-size: cover;
							 background-position:center;">
				</div>
				<div class="post-preview">
					<h1> <a href="single.php?id='.$post['id'].'">'.$post['title'].'</a></h1>
					<i class="far fa-user"> <p>'.$user_name['username'].'</p></i>
					<p style="display: inline; padding:0px 5px 0px 5px;"> | </p>
					<i class="far fa-calendar-alt"> <p>'.$post['created_at'].'</p></i>
					<p style="display: inline; padding:0px 5px 0px 5px;"> | </p>
					<i class="fas fa-paperclip"></i> <p>'.$post['topics'].' | </p></i>
					<div class="rating_index" style="display: inline;">
						<i id="1" class="far fa-star"></i>
						<i id="2" class="far fa-star"></i>
						<i id="3" class="far fa-star"></i>
						<i id="4" class="far fa-star"></i>
						<i id="5" class="far fa-star"></i>
					</div>';
					if($post['rated_users'] == 0){
						$output .= '<input type="hidden" name="name" class="rating_holder_index" value="'.$post['sum_rating'].'">';
					}else{
						$output .= '<input type="hidden" name="name" class="rating_holder_index" value="'.floor($post['sum_rating'] / $post['rated_users']).'">';
					}
					$output .= '<br><br>
					<p>'.substr($post['body'], 0, 260).'<a href="single.php?id='.$post['id'].'">...read more</a></p>
				</div>
			</div>';
			}
		}
		print_r($output);
	}
