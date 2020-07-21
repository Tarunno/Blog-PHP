<?php include '../../includes/posts.inc.php' ?>
<?php
	if(!isset($_SESSION['username'])){
		header("Location: ../../login.php");
		exit();
	}
    if($_SESSION['admin'] != 1){
		header("Location: ../../index.php");
		exit();
	}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.7.2/css/all.min.css"  />
        <link href="https://fonts.googleapis.com/css2?family=Saira+Condensed&display=swap" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../../css/index.css">
        <link rel="stylesheet" href="../../css/admin_post.css">
        <title></title>
    </head>
    <body>
        <header>
            <div class="logo">
                <h1 class="logo-text"> TARUNNO SAYS <span style="color: crimson;"> admin </span> </h1>
            </div>
            <i class="fa fa-bars menu-toggle"></i>
            <ul class="nav">
                <li id="user2">
                    <a href="#">
                        <i class="far fa-user"></i>
                        <?php echo $_SESSION['username']; ?>
                        <i class='fa fa-chevron-down' id="right2"></i>
                    </a>
                    <ul>
                        <li> <a href="../../index.php"><i class="fas fa-home"></i> Home</a> </li>
                        <form action="../../includes/logout.inc.php" method="post">
        					<button class="admin-logout-btn" type="submit" name="logout-submit"><i class="fas fa-sign-out-alt"></i>Logout</button>
        				</form>
                    </ul>
                </li>
            </ul>
        </header>
        <div class="admin-container">
            <div class="admin-options">
				<?php
					if($_SESSION['profile_img_status'] == 1){
						echo '<div class="admin-pic" style="
							background-image: url(../../uploads/profile'.$_SESSION['id'].'.jpg);
							background-size: cover;
							backgroud-position: center; ">
						</div>';
					}
					else{
						echo '<div class="admin-pic" style="
							background-image: url(../../uploads/Default.png);
							background-size: cover;
							beckgroud-position: center; ">
						</div>';
					}
				?>
                <ul>
                    <li> <a href="../post/index.php" style="position: relative;
				    left: 40%; font-weight: bold; color: crimson;"> POST </a> </li>
                    <li> <a href="../topics/index.php"> TOPICS</a> </li>
                    <li> <a href="../users/index.php"> USERS </a> </li>
                </ul>
            </div>
            <div class="admin-edit">
                <div class="admin-edit-container">
                    <button type="button" name="button" class="add-post"> <a href="create.php"> Add post</a></button>
                    <button type="button" name="button" class="Manage-post" style="background: crimson;"> <a href="index.php">Manage post</a> </button>
                    <table>
                        <thead>
                            <th>N0</th>
                            <th>POST</th>
                            <th>AUTHOR</th>
                            <th>EDIT</th>
                            <th>DELETE</th>
                            <th>STATUS</th>
                            <th>TRENDING</th>
                        </thead>
                        <tbody>
                                <?php
                                    $i = 1;
                                    while($row = mysqli_fetch_assoc($posts_obj)){
                                        $user = selectOne('users', ['id' => $row['user_id']]);
                                        $user_name = mysqli_fetch_assoc($user);
                                        echo '<tr><td>'.$i.'</td>
                                        <td>'.$row['title'].'</td>
                                        <td>'.$user_name['username'].'</td>
                                        <td> <a href="edit.php?id='.$row['id'].'" class="edit"> Edit</a> </td>
                                        <td> <a href="edit.php?del_id='.$row['id'].'" class="detele">Detele</a> </td>';
                                        if($row['published'] == 1){
                                            echo '<td> <a href="../../includes/posts.inc.php?pub_id='.$row['id'].'" calss="published">Published</a> </td>';
                                        } else {
                                            echo '<td> <a href="../../includes/posts.inc.php?pub_id='.$row['id'].'" calss="Unpublished">Unpublished</a> </td>';
                                        }
                                        if($row['trending'] == 1){
                                            echo '<td> <a href="../../includes/posts.inc.php?tre_id='.$row['id'].'" calss="unpublish">Yes</a> </td></tr>';
                                        } else {
                                            echo '<td> <a href="../../includes/posts.inc.php?tre_id='.$row['id'].'" calss="Publish">No</a> </td></tr>';
                                        }
                                        $i++;
                                    }
                                ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <script type="text/javascript" src="../../app.js"></script>
    </body>
</html>
