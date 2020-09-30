<?php require 'includes/single.inc.php' ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.7.2/css/all.min.css"  />
        <link href="https://fonts.googleapis.com/css2?family=Saira+Condensed&display=swap" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/index.css">
        <link rel="stylesheet" href="css/single.css">
        <title>TARUNNO SAYS | post</title>
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
        <?php
        $row = mysqli_fetch_assoc($post);
        $skip = $row['id'];
        $user = selectOne('users', ['id' => $row['user_id']]);
        $user = mysqli_fetch_assoc($user);
            echo '<div class="full-post-container">
                <div class="full-post">
                    <div class="full-post-image" style="background-image: url(images/'.$row['image'].');
                                 background-size: cover;
                                 background-position:center;">
                    </div>
                    <h1>'.$row['title'].'</h1>
                    <i class="far fa-user"> <p>'.$user['username'].'</p></i>
                    <p style="display: inline; padding:0px 5px 0px 5px;"> | </p>
                    <i class="far fa-calendar-alt"> </i> <p> '.$row['created_at'].'  |  </p>
                    <i class="fas fa-paperclip"> </i><p> '.$row['topics'].' | </p></i>
                    <form style="display: inline;" action="includes/single.inc.php?id='.$row['id'].'" method="post">
                        <div class="rating_single" style="display: inline;">
                            <i id="1" class="far fa-star"></i>
                            <i id="2" class="far fa-star"></i>
                            <i id="3" class="far fa-star"></i>
                            <i id="4" class="far fa-star"></i>
                            <i id="5" class="far fa-star"></i>
                        </div>';
                        if($row['rated_users'] == 0){
                            echo '<input type="hidden" name="name" class="rating_holder" value="'.$row['sum_rating'].'">';
                        }else{
                            echo '<input type="hidden" name="name" class="rating_holder" value="'.$row['sum_rating'] / $row['rated_users'].'">';
                        }
                        if(isset($_SESSION['username'])){
                            echo '<input type="submit" name="rating_submit" class="rating_submit" value="Rate">';
                        }
                    echo '</form>
                    <br><br>
                    <div class="full-post-text">
                        <p>'.$row['body'].'</p>
                    </div>
                </div>';

            echo '<h1 class="comment-header"> <i class="far fa-comment"></i> Comments </h1>

            <div class="comment-section">';
                    if(isset($_SESSION['username'])){
                        echo '<form action="includes/single.inc.php?id='.$row['id'].'" method="post">
                            <input type="hidden" name="user_id" value="'.$_SESSION['id'].'">
                            <textarea class="textarea" type="text" name="message">Your comment... </textarea>
                            <input type="submit" name="comment-submit" value="Comment">
                        </form>';
                    }
                    while($comment = mysqli_fetch_assoc($comments)){
                        $user = selectOne('users', ['id' => $comment['user_id']]);
                        $user = mysqli_fetch_assoc($user);
                        echo '<div class="comment">
                            <h3> <i class="fas fa-user"></i> '.$user['username'].' </h3>
                            <p class="date"> <i class="far fa-calendar-alt"> </i>  '.$comment['comment_date'].' </p>
                            <p class="message"> '.$comment['message'].' </p>
                        </div>';
                    }
                echo '</div>';
                 ?>
            </div>';

            <div class="full-post-container">
            <h1>Related posts</h1>
            <?php
            $search = mysqli_real_escape_string($con, $row['topics']);
    		$sql = "SELECT * FROM posts WHERE title LIKE '%$search%' OR body LIKE '%$search%' OR topics LIKE '%$search%'";
    		$related = mysqli_query($con, $sql);
            $i = 0;
            while($row = mysqli_fetch_assoc($related)){
                if($i == 3) break;
                $user = selectOne('users', ['id' => $row['user_id']]);
                $user_name = mysqli_fetch_assoc($user);
                if($row['published'] == 1 & $row['id'] != $skip){
                echo '<div class="content-post">
                    <div class="post-image" style="background-image: linear-gradient(rgba(0, 0, 0, .4), rgba(0, 0, 0, .4)),url(images/'.$row['image'].');
                                 background-size: cover;
                                 background-position:center;">
                    </div>
                    <div class="post-preview">
                        <h1> <a href="single.php?id='.$row['id'].'">'.$row['title'].'</a></h1>
                        <i class="far fa-user"> <p>'.$user_name['username'].'</p></i>
                        <p style="display: inline; padding:0px 5px 0px 5px;"> | </p>
                        <i class="far fa-calendar-alt"> <p>'.$row['created_at'].'</p></i>
                        <p style="display: inline; padding:0px 5px 0px 5px;"> | </p>
                        <i class="fas fa-paperclip"></i> <p>'.$row['topics'].' | </p></i>
                        <div class="rating_index" style="display: inline;">
                            <i id="1" class="far fa-star"></i>
                            <i id="2" class="far fa-star"></i>
                            <i id="3" class="far fa-star"></i>
                            <i id="4" class="far fa-star"></i>
                            <i id="5" class="far fa-star"></i>
                        </div>';
                        if($row['rated_users'] == 0){
                            echo '<input type="hidden" name="name" class="rating_holder_index" value="'.$row['sum_rating'].'">';
                        }else{
                            echo '<input type="hidden" name="name" class="rating_holder_index" value="'.(int)floor($row['sum_rating'] / $row['rated_users']).'">';
                        }
                        echo '<br><br>
                        <p>'.substr($row['body'], 0, 260).'<a href="single.php?id='.$row['id'].'">...read more</a></p>
                    </div>
                </div>';
                }
                $i++;
            }
        ?>
        </div>
        <?php  include 'includes/footer.inc.php' ?>
        <script type="text/javascript" src="javaScript/rating.js"></script>
        <script type="text/javascript" src="javaScript/app.js"></script>
    </body>
</html>
