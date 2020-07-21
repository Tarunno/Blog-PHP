<?php include 'includes/profile_posts.inc.php';
if(!isset($_SESSION['username'])){
	header("Location: login.php");
	exit();
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<meta charset="utf-8">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.7.2/css/all.min.css"  />
        <link href="https://fonts.googleapis.com/css2?family=Saira+Condensed&display=swap" rel="stylesheet">
		<script src="https://cdn.ckeditor.com/ckeditor5/19.1.1/classic/ckeditor.js"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/index.css">
		<link rel="stylesheet" href="css/profile.css">
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
					?>
					<a href="#" class="username" style="color: crimson; text-transform: uppercase; font-weight: bold;">
						<?php echo $_SESSION['username']; ?>
						<i class='fa fa-chevron-down' id="right2"></i>
					</a>
					<ul>
						<?php //echo $_SESSION['admin']; ?>
						<?php if($_SESSION['admin'] === 1): ?>
							<li> <a href="admin/post/index.php"><i class="fas fa-door-open"></i> Deshboard</a> </li>
						<?php endif; ?>
						<li> <a href="profile.php"><i class="far fa-user"></i> Profile</a> </li>
						<form action="includes/logout.inc.php" method="post">
							<button style="color: #fff;" class="logout-btn" type="submit" name="logout-submit"><i class="fas fa-sign-out-alt"></i> Logout</button>
						</form>
					</ul>
				</li>
			</ul>
		</header>

		<?php

		$id = $_SESSION['id'];
		echo '<div class="profile-container">';
		echo '<div class="profile-container-mini">';
		if(isset($_SESSION['id'])){
	        if($_SESSION['profile_img_status'] == 1){
	            echo '<img src="uploads/profile'.$id.'.jpg"'.mt_rand().'>';
	            if(isset($_SESSION['id'])){
	                    echo '<h1>'. $_SESSION['username'] . '</h1>';
						if($_SESSION['admin'] == 1){
							echo '<h5> <i class="far fa-user"></i> Admin | <i class="far fa-calendar-alt"></i> '.$_SESSION['users_create_time'].'</h5>';
						}
						else{
							echo '<h5> <i class="far fa-user"></i> Author | <i class="far fa-calendar-alt"></i> '.$_SESSION['users_create_time'].'</h5>';
						}
	            }
				echo '<button type="button" class="my-post"> <a href="profile_edit.php"> My posts <a/> </button>';
			} else {
				echo '<img src="uploads/Default.png">';
				if(isset($_SESSION['id'])){
	                    echo '<h1>'. $_SESSION['username'] . '</h1>';
						if($_SESSION['admin'] == 1){
							echo '<h5> <i class="far fa-user"></i> Admin | <i class="far fa-calendar-alt"></i> '.$_SESSION['users_create_time'].'</h5>';
						}
						else{
							echo '<h5> <i class="far fa-user"></i> Author | <i class="far fa-calendar-alt"></i> '.$_SESSION['users_create_time'].'</h5>';
						}
	            }
				echo '<button type="button" class="my-post"> <a href="profile_edit.php"> My posts </a></button>';
			}
			echo '</div>';
			echo '<div class="profile-container-mini">';
				echo '<div class="forms">
				<form action="includes/upload.inc.php" method="post" enctype="multipart/form-data">
					<p> Change you profile picture </p>
					<input type="file" name="file">
					<button type="submit" name="submit-image"> Upload </button>
					</form>
					<p> Add post </p>';
					echo '<form action="profile.php" method="post" enctype="multipart/form-data">';
                    echo '<label>Title</label> <input type="text" name="title" id="title" placeholder=" Within 50 character">
                        <div class="body-text">
                            <label>Body</label>
                            <textarea name="body" id="editor"> </textarea>
                            <script>
                            ClassicEditor.create(document.querySelector("#editor")).catch(
                                (error) => {
                                    console.error(error);
                                }
                            );
                            </script>
                        </div>
                        <div class="post-image">
                            <input type="file" name="post-image" placeholder="Choose a image">
                        </div>
                        <div>
                            <label>Topic</label>
                            <select class="select-topic" name="topics">';
                                while($row = mysqli_fetch_assoc($topic)){
                                    echo '<option value="'.$row['title'].'"> '.$row['title'].'</option>';
                                }
                            echo '</select>
                        </div>
                        <div>
                            <button type="submit" name="post-submit" class="create-btn">Add</button>
                        </div>
                    </form>';
			echo '</div>';
			echo '</div>';
		}
		echo '</div>';
    ?>
	<div class="footer">
		<div class="footer-content">
		</div>
		<div class="footer-bottom">
			&copy; TARUNNO SAYS | Developed by Mahadi Hasan Tarunno
		</div>
	</div>

	<script type="text/javascript" src="javaScript/app.js"></script>
	</body>
</html>
