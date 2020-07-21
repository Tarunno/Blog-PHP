<?php include 'includes/curd.inc.php' ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<meta charset="utf-8">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.7.2/css/all.min.css"  />
        <link href="https://fonts.googleapis.com/css2?family=Saira+Condensed&display=swap" rel="stylesheet">
		<script src="https://cdn.ckeditor.com/ckeditor5/19.1.1/classic/ckeditor.js"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/index.css">
		<link rel="stylesheet" href="css/members.css">
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
				<li> <a href="members.php" style="color: crimson; font-size:25px;
					line-height: 27px; font-weight: bold;">MEMBERS</a> </li>
			</ul>
		</header>
		<div class="profile-container">
			<div class="heading">
				<h1> MEMBERS </h1>
			</div>
			<div class="row">
			<?php
				$users = selectAll('users');
				while($row = mysqli_fetch_assoc($users)){
					echo '
						  <div class="column">
							    <div class="card">
							      <img src="uploads/profile'.$row['id'].'.jpg" alt="Jane" style="width:100%">
							      <div class="container">
							        <h2>'.$row['username'].'</h2>';
									if($row['admin'] == 1){
							        	echo '<p class="title"><i class="far fa-user"></i> Admin</p>';
									} else {
										echo '<p class="title"><i class="far fa-user"></i> Author</p>';
									}
							        echo '<p><i class="far fa-envelope"></i> '.$row['email'].'</p> <br>
							      </div>
							    </div>
							  </div>';
				}
			?>
			</div>
		</div>
		<script type="text/javascript" src="javaScript/app.js"></script>
	</body>
</html>
