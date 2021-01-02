<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.7.2/css/all.min.css"  />
        <link href="https://fonts.googleapis.com/css2?family=Saira+Condensed&display=swap" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/signup.css">
        <title></title>
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
        		<li> <a href="login.php">LOGIN</a> </li>
        	</ul>
        </header>
        <?php $errors = array(); ?>
        <?php include 'includes/signup.inc.php'?>

        <div class="signup-container">
            <h1>Sign up</h1>
            <form class="signup-form" action="signup.php" method="post">
                <?php if(count($errors) > 0): ?>
                    <div class="errors">
                        <?php foreach ($errors as $error): ?>
                            <p><?php echo $error; ?></p>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
                <i class="fas fa-user"></i><input type="text" name="username" placeholder="Username" value=<?php echo $username; ?>> <br>
                <i class="fas fa-envelope"></i><input type="email" name="email" placeholder="Email" value=<?php echo $email; ?>> <br>
                <i class="fas fa-key"></i><input type="password" name="password" placeholder="Password" value=<?php echo $password; ?>> <br>
                <i class="fas fa-check-square"></i><input type="password" name="re-password" placeholder="Retype password" value=<?php echo $repassword; ?>> <br>
                <button type="submit" name="signup-submit"> Sign up </button>
            </form>
            <a href="login.php">Log in</a>
        </div>

        <script type="text/javascript" src="javaScript/app.js"></script>
    </body>
</html>
