<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.7.2/css/all.min.css"  />
        <link href="https://fonts.googleapis.com/css2?family=Saira+Condensed&display=swap" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/login.css">
        <title>TARUNNO SAYS | login</title>
    </head>
    <body>
        <header>
        	<div class="logo">
        		<h1 class="logo-text"> TARUNNO <span> SAYS</span> </h1>
        	</div>
        	<i class="fa fa-bars menu-toggle"></i>
        	<ul class="nav">
                <li> <a href="index.php"> HOME</a> </li>
        		<li> <a href="#">ABOUT</a> </li>
        		<li> <a href="members.php">MEMBERS</a> </li>
        		<li> <a href="signup.php">SIGNUP</a> </li>
        	</ul>
        </header>

        <?php $errors = array(); ?>
        <?php include 'includes/login.inc.php' ?>

        <div class="login-container">
            <h1>Log in</h1>
            <form class="login-form" action="login.php" method="post">
                <?php if(count($errors) > 0): ?>
                    <div class="errors">
                        <?php foreach ($errors as $error): ?>
                            <p><?php echo $error; ?></p>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
                <i class="fas fa-user"></i><input type="email" name="email" placeholder="Email"> <br>
                <i class="fas fa-key"></i><input type="password" name="password" placeholder="Password"> <br>
                <button type="submit" name="login-submit"> Log in </button>
            </form>
            <a href="signup.php">signup</a>
        </div>
        <script type="text/javascript" src="javaScript/app.js"></script>
    </body>
</html>
