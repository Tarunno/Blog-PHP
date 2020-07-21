<?php include '../../includes/users.inc.php' ?>
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
        <script src="https://cdn.ckeditor.com/ckeditor5/19.1.1/classic/ckeditor.js"></script>
        <link rel="stylesheet" href="../../css/index.css">
        <link rel="stylesheet" href="../../css/admin_user.css">
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
                    <li> <a href="../post/index.php"> POST </a> </li>
                    <li> <a href="../topics/index.php"> TOPICS</a> </li>
                    <li> <a href="../users/index.php" style="position: relative;
				    left: 40%; font-weight: bold; color: crimson;"> USERS </a> </li>
                </ul>
            </div>
            <div class="admin-edit">
                <div class="admin-edit-create">
                    <button type="button" name="button" class="add-post" style="background: crimson;"> <a href="create.php"> Add user</a></button>
                    <button type="button" name="button" class="Manage-post"> <a href="index.php">Manage user</a> </button>

                    <?php $errors = array(); ?>

					<form action="create.php" method="post">
                        <?php if(count($errors) > 0): ?>
                            <div class="errors">
                                <?php foreach ($errors as $error): ?>
                                    <p><?php echo $error; ?></p>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>
                        <p>User</p> <input type="text" name="username" id="title" value="<?php echo $username; ?>">
                        <div class="body-text">
                            <label>Email</label>
                            <input type="text" name="email" id="editor" value="<?php echo $email; ?>">
                        </div>
                        <div class="body-text">
                            <label>Password</label>
                            <input type="text" name="password" id="editor">
                        </div>
                        <div class="body-text">
                            <label>Re-enter Password</label>
                            <input type="text" name="re-password" id="editor">
                        </div>
                        <label>Role</label>
                        <select class="select-topic" name="admin">
                            <option value="admin">Admin</option>
                            <option value="author">Author</option>
                        </select>
                        <div>
                            <button type="submit" name="create-submit" class="create-btn">Add</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <script type="text/javascript" src="../../app.js"></script>
    </body>
</html>
