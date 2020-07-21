<?php include 'includes/topics.inc.php'; ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.7.2/css/all.min.css"  />
        <link href="https://fonts.googleapis.com/css2?family=Saira+Condensed&display=swap" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css"/>
        <link rel="stylesheet" href="css/index.css">
        <title>TARUNNO SAYS</title>
    </head>
    <body>
        <div class="page-wrapper">
            <div class="post-slider">
                <div class="post-wrapper">

                    <?php
                    $trending = selectAll('posts', ['trending' => 1]);
                    while($row = mysqli_fetch_assoc($trending)){
                        $user = selectOne('users', ['id' => $row['user_id']]);
                        $user_name = mysqli_fetch_assoc($user);
                        echo '<div class="post" style="background-image:linear-gradient(rgba(0, 0, 0, .3), rgba(0, 0, 0, 1)), url(images/'.$row['image'].');
                                     background-size: cover;
                                     background-position:center;">';
                                     include 'includes/header.inc.php';
                                     echo '<h2 class="trending"> Trending </h2>';
                            echo '<div class="post-info"><a href="single.php?id='.$row['id'].'">
                                <h1>'.$row['title'].'</h1>
                                <i class="far fa-user"> <p> '.$user_name['username'].'</p></i>
                                <p style="display: inline; padding:0px 5px 0px 5px;"> | </p>
                                <i class="far fa-calendar-alt"> <p> '.$row['created_at'].' | </p></i>
                                <i class="fas fa-paperclip"></i> <p>'.$row['topics'].' | </p></i>
                                </a>
                            </div>
                        </div> ';
                    }
                    ?>
                    <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                    <a class="next" onclick="plusSlides(1)">&#10095;</a>
                </div>
            </div>
        </div>
        <div class="content clearify">
            <div class="main-content">
                <h1 class="recent-post-title"> Recent posts</h1>
                <?php
                    $posts = selectAll('posts');
                    $post_array = array();
                	while($row = mysqli_fetch_assoc($posts)){
                		$post_array[] = $row;
                	}
                	$posts = array_reverse($post_array);;
                    foreach($posts as $post){
                        $user = selectOne('users', ['id' => $post['user_id']]);
                        $user_name = mysqli_fetch_assoc($user);
                        if($post['published'] == 1){
                        echo '<div class="content-post" data-aos="slide-right">
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
                                    echo '<input type="hidden" name="name" class="rating_holder_index" value="'.$post['sum_rating'].'">';
                                }else{
                                    echo '<input type="hidden" name="name" class="rating_holder_index" value="'.floor($post['sum_rating'] / $post['rated_users']).'">';
                                }
                                echo '<br><br>
                                <p>'.substr($post['body'], 0, 260).'<a href="single.php?id='.$post['id'].'">...read more</a></p>
                            </div>
                        </div>';
                        }
                    }
                ?>
            </div>
            <div class="side-bar">
                <div class="section search" data-aos="slide-left">
                    <h1 class="section-title"> Search </h1>
                    <form class="" action="search.php" method="post">
                        <input type="text" name="search-submit" class="text-input" placeholder="Search">
                    </form>
                </div>
                <div class="section topics" data-aos="slide-left">
                    <h1 class="section-title"> Topics </h1>
                    <ul>
                        <?php
                            while($row = mysqli_fetch_assoc($topics)){
                                echo '<tr>
                                    <li> <a href="topic.php?topic='.str_replace(' ','_',$row['title']).'"> '.$row['title'].' </a></li>
                                </tr>';
                            }
                        ?>
                    </ul>
                </div>
            </div>
        </div>

        <?php  include 'includes/footer.inc.php' ?>
        <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
        <script type="text/javascript" src="javaScript/app.js"></script>
    </body>
</html>
