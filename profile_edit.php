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
		<link rel="stylesheet" href="css/profile_eidt.css">
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
							<button class="logout-btn" type="submit" name="logout-submit" style="color: #fff;"><i class="fas fa-sign-out-alt"></i> Logout</button>
						</form>
					</ul>
				</li>
			</ul>
		</header>

		<?php
		echo '<div class="profile-container">';
		echo '<div class="profile-container-mini">';
				echo '<table>
				<h1> My posts </h1>
					<thead>
						<th>N0</th>
						<th>POST</th>
						<th>AUTHOR</th>
						<th>EDIT</th>
						<th>DELETE</th>
						<th>STATUS</th>
					</thead>
					<tbody>';
								$i = 1;
								while($row = mysqli_fetch_assoc($posts)){
									$user = selectOne('users', ['id' => $row['user_id']]);
									$user_name = mysqli_fetch_assoc($user);
									echo '<tr><td>'.$i.'</td>
									<td>'.$row['title'].'</td>
									<td>'.$user_name['username'].'</td>
									<td> <a href="profile_edit.php?id='.$row['id'].'" class="edit"> Edit</a> </td>
									<td> <a href="profile_edit.php?del_id='.$row['id'].'" class="detele">Detele</a> </td>';
									if($row['published'] == 0){
										echo '<td style="background-color: #f2a2a2;"> Unpublished </td></tr>';
									} else {
										echo '<td style="background-color: #c4f5ae;"> Published</td></tr>';
									}
									$i++;
								}
					echo '</tbody>
				</table>';
			echo '</div>';
			echo '<div class="profile-container-mini">';
			echo '<form action="profile_edit.php" method="post">
				<p>Title</p> <input type="text" name="title" id="title" value="'.$title.'">
				<input type="hidden" name="id" value="'.$id.' ?>">
				<input type="hidden" name="user_id" value="'.$user_id.'">
				<input type="hidden" name="published" value="'.$published.'">

				<div class="body-text">
					<label>Body</label>
					<textarea name="body" id="editorx">'.$body.'</textarea>
					<script>
					ClassicEditor.create(document.querySelector("#editorx")).catch(
						(error) => {
							console.error(error);
						}
					);
					</script>
				</div>
				<div class="post-image">
						<input type="hidden" name="image" placeholder="Choose a image" value="'.$image.'">
				</div>
				<div>
					<label>Topic</label>
					<select class="select-topic" name="topics">';

							while($row = mysqli_fetch_assoc($topic)){
								echo ' <option value="'.$row['title'].'"> '.$row['title'].'</option>';
							}

					echo '</select>
				</div>
				<div class="submit-btn">
					<button type="submit" name="edit-submit" class="create-btn">Done</button>
					<button type="button"> <a href="profile.php"> Add post </button>
					<button type="button" style="background-color: crimson;"> <a href="profile.php"> Back to my profile </button>
				</div>
			</form>';
			echo '</div>';
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
