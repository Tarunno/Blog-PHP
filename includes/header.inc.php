<header>
	<div class="logo">
		<h1 class="logo-text"> TARUNNO <span> SAYS</span> </h1>
	</div>
	<i class="fa fa-bars menu-toggle"></i>
	<ul class="nav">
		<li> <a href="index.php" style="color: crimson; font-size:25px;
			line-height: 27px; font-weight: bold;">HOME</a></li>
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
