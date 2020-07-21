<?php
	include 'includes/posts.inc.php';
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.7.2/css/all.min.css"  />
        <link href="https://fonts.googleapis.com/css2?family=Saira+Condensed&display=swap" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/select_topic.css">
        <title></title>
    </head>
    <body>
		<header>
			<div class="logo">
				<h1 class="logo-text"> TARUNNO <span> SAYS</span> </h1>
			</div>
			<i class="fa fa-bars menu-toggle"></i>
			<ul class="nav">
				<li> <a href="index.php">HOME</a></li>
				<li> <a href="#">ABOUT</a> </li>
				<li> <a href="members.php">MEMBERS</a> </li>
				<li id="user2">
					<?php
					if(isset($_SESSION['username'])){
						if($_SESSION['profile_img_status'] == 1){
							echo '<div class="profile-pic" style="
								background-image: url(uploads/profile'.$_SESSION['id'].'.jpg);
								background-size: cover;
								backgroud-position: center; ">
							</div>';
						}
						else{
							echo '<div class="profile-pic" style="
								background-image: url(uploads/Default.png);
								background-size: cover;
								beckgroud-position: center; ">
							</div>';
						}
					}
					?>
					<a href="#" class="username">
						<?php
						if(isset($_SESSION['username'])){
							echo $_SESSION['username'];
						}
						else{
							echo 'LOGIN';
						}
						?>
						<i class='fa fa-chevron-down' id="right2"></i>
					</a>
					<ul>
						<?php
							if(!isset($_SESSION['username'])){
								echo '<button class="logout-btn" type="submit" name="logout-submit"> <a href="login.php"><i class="fas fa-sign-out-alt"></i> Login <a></button>';
							} else{
								if($_SESSION['admin'] === 1):
									echo '<li> <a href="admin/post/index.php"><i class="fas fa-door-open"></i> Deshboard </a> </li>';
								endif;
								echo '<li> <a href="profile.php"><i class="far fa-user"></i> Profile </a> </li>
								<form action="includes/logout.inc.php" method="post">
									<button class="logout-btn" type="submit" name="logout-submit"><i class="fas fa-sign-out-alt"></i> Logout</button>
								</form>';
							}
						?>
					</ul>
				</li>
			</ul>
		</header>

        <div class="content clearify">
            <div class="main-content">
				<h1> Search results</h1>
                <?php
				$num_of_row = mysqli_num_rows($posts);
				if($num_of_row > 0){
                    foreach($posts as $post){
                        $user = selectOne('users', ['id' => $post['user_id']]);
                        $user_name = mysqli_fetch_assoc($user);
                        if($post['published'] == 1){
                        echo '<div class="content-post">
                            <div class="post-image" style="background-image: url(images/'.$post['image'].');
                                         background-size: cover;
                                         background-position:center;">
                            </div>
                            <div class="post-preview">
                                <h1> <a href="single.php?id='.$post['id'].'">'.$post['title'].'</a></h1>
                                <i class="far fa-user"> <p>'.$user_name['username'].'</p></i>
                                <p style="display: inline; padding:0px 5px 0px 5px;"> | </p>
                                <i class="far fa-calendar-alt"> <p>'.$post['created_at'].'</p></i>
                                <p style="display: inline; padding:0px 5px 0px 5px;"> | </p>
                                <i class="fas fa-paperclip"></i> <p>'.$post['topics'].'</p></i>
                                <br><br>
                                <p>'.substr($post['body'], 0, 450).'<a href="single.php?id='.$post['id'].'">...read more</a></p>
                            </div>
                        </div>';
                        }
                    }
				} else {
					echo '<h4> No result found </h4>';
				}
                ?>
            </div>
		</div>

        <?php  include 'includes/footer.inc.php' ?>
		<script type="text/javascript" src="javaScript/app.js"></script>
    </body>
</html>
