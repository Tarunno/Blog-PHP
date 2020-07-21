<div class="footer">
	<div class="footer-content">
		<div class="footer-section about">
			<h1 class="logo-text">Follow me</h1>
			<p>Just Color Picker is a tool for capturing the colour of
				any pixels</p>
			<div class="contect">
				<i class="fas fa-phone"> <span> 01863987793 </span> </i>
				<i class="fas fa-envelope"> <span> mahadihasantarunno@gmail.com </span> </i>
			</div>
			<div class="social">
				<a href="#"> <i class="fab fa-facebook"> <span></span> </i> </a>
				<a href="#"> <i class="fab fa-instagram"> <span></span> </i> </a>
				<a href="#"> <i class="fab fa-twitter"> <span></span> </i> </a>
				<a href="#"> <i class="fab fa-youtube"> <span></span> </i> </a>
			</div>
		</div>
		<div class="footer-section links">
			<h1> Also see</h1>
			<ul>
				<li> <a href="#">Events</a> </li>
				<li> <a href="#">People</a> </li>
				<li> <a href="#">Movtivation</a> </li>
			</ul>
		</div>
		<div class="footer-section contect-form">
			<h1>   Contact me</h1>
			<form action="index.php" method="post">
				<input type="email" name="email" class="email" placeholder="Enter your email">
				<input type="text" name="subject" class="email" placeholder="Subject">
				<textarea name="message" class="message" placeholder="Your message..."></textarea>
				<button type="submit" name="email-submit"> <i class="fas fa-envelope"> Send </i> </button>
			</form>
		</div>
	</div>
	<div class="footer-bottom">
		&copy; TARUNNO SAYS | Developed by Mahadi Hasan Tarunno
	</div>
	<?php
		if(isset($_POST['email-submit'])){
			$email = $_POST['email'];
			$subject = $_POST['subject'];
			$message = $_POST['message'];

			$to = 'mahadihasantarunno@gmail.com';
			$header = "From: ". $to;
			$text = 'You have received an email from '.'\n\n'. $message;

			mail($to, $subject, $text, $header);
		}
	?>
</div>
