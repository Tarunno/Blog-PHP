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
        <script src="https://cdn.ckeditor.com/ckeditor5/19.1.1/classic/ckeditor.js"></script>
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
                        SAY
                        <i class='fa fa-chevron-down' id="right2"></i>
                    </a>
                    <ul>
                        <li> <a href="../../index.php">Home</a> </li>
                        <li> <a href="#" class="logout"><i class="fas fa-sign-out-alt"></i>Logout</a> </li>
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
                <hr>
                <ul>
                    <li> <a href="#" style="font-weight: bold; color: crimson;"> POST </a> </li>
                    <li> <a href="#"> TOPICS</a> </li>
                    <li> <a href="#"> USERS </a> </li>
                </ul>
            </div>
            <div class="admin-edit">
                <div class="admin-edit-create">
                    <button type="button" name="button" class="add-post"> <a href="create.php"> Add post</a></button>
                    <button type="button" name="button" class="Manage-post"> <a href="index.php">Manage post</a> </button>
                    <form action="edit.php" method="post">
                        <p>Title</p> <input type="text" name="title" id="title" value="<?php echo $title; ?>">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
                        <input type="hidden" name="published" value="<?php echo $published; ?>">

                        <div class="body-text">
                            <label>Body</label>
                            <textarea name="body" id="editor"> <?php echo $body; ?> </textarea>
                            <script>
                            ClassicEditor.create(document.querySelector("#editor")).catch(
                                (error) => {
                                    console.error(error);
                                }
                            );
                            </script>
                        </div>
                        <div class="post-image">
                                <input type="hidden" name="image" placeholder="Choose a image" value="<?php echo $image; ?>">
                        </div>
                        <div>
                            <label>Topic</label>
                            <select class="select-topic" name="topics">
                                <?php
                                    while($row = mysqli_fetch_assoc($topic)){
                                        echo ' <option value="'.$row['title'].'"> '.$row['title'].'</option>';
                                    }
                                ?>
                            </select>
                        </div>
                        <div>
                            <button type="submit" name="edit-submit" class="create-btn">Done</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <script type="text/javascript" src="../../app.js"></script>
    </body>
</html>
