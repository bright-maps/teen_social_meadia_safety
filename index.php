<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="style.css"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SMC Ltd. | Home</title>
</head>

<script src="https://www.paypal.com/sdk/js?client-id=AWhJaiZNVftDQezCZTezQzMCio3c-B3Y7bSQHRIm6-drxAy6pY1iN5dK_2XEC9d6aSSDpogwaEwCn7Es"></script>

<body id="page">

<?php
session_start();

// Check if the user is logged in and the last activity time
if (isset($_SESSION['email']) && isset($_SESSION['last_activity'])) {
    $time_diff = time() - $_SESSION['last_activity'];

    // If the time difference is greater than 10 minutes, logout the user
    if ($time_diff > 600) {
        $_SESSION = array();
        session_destroy();
    }
}

$_SESSION['last_activity'] = time();
?>

    <header>
		<div id="search_container">
			<div id="search">
				<form class="search" action="" method="POST">			
					<input type="search" name="search"  placeholder='Search...' /> 
					<button class="search_button" type="submit"><img src="images/search.png" alt="search"></button>
				</form>
			</div>
		</div>
	</header>

	<div id="nav">
        <div id="nav_item">
				<a href="index.php">
					<div id="current" class="nav_div">
						<p>Home</p>
					</div>
				</a>	
				

				<a href="information.html">
					<div class="nav_div">
						<p>Information</p>
					</div>
				</a>

				<a href=" Popular.php">
					<div class="nav_div">
						<p>Most Popular Apps</p>
					</div>
				</a>

				<a href="help.html">
					<div class="nav_div">
						<p>How Parents Can Help</p>
					</div>
				</a>

				<a href="Livestreaming.html">
					<div class="nav_div">
						<p>Livestreaming</p>
					</div>
				</a>

				<a href="contact.html">
					<div class="nav_div">
            		<p>contact</p>
					</div>
				</a>

				<a href="Legislation.html">
					<div class="nav_div">
            		<p>Legislation & Guidance</p>
					</div>
				</a>
				
				<?php
				if(!isset($_SESSION['email']) ){
					echo "
					<a href='login.html'>
						<div class='nav_div'>
						<p>Log In</p>
						</div>
					</a>";
				}
				else{
					echo "
					<a href='logoutuser.php'>
						<div class='nav_div'>
						<p>Log Out</p>
						</div>
					</a>";
				}
				?>
			</div>
			
	</div>

	<div id="content">

		<div id="slide">

			<div class="slideshow-container">
				<div class="slide" id="slide1">
					<div class="caption">Social media can be both enjoyable and risky for teens.</div>
				</div>
				
				<div class="slide" id="slide2">
					<div class="caption">Guide teens to use social media safely by being mindful of their online activities.</div>
				</div>

				<div class="slide" id="slide3">
					<div class="caption">Support safe social media use in teens with guidance and mindfulness.</div>
				</div>

			</div>

		</div>

		<div id="Popular">
			<h1>Popular Social Media Apps</h1>
			<div id="Popularapps">

				<div class="app">
					<img class="image-container" src="images/Facebook 3D.png" alt="FB">
					<h3>Facebook</h3>
				</div>

				<div class="app">
					<img src="images/Twitter 3D.png" alt="twitter">
					<h3>Twitter</h3>
				</div>

				<div class="app">
					<img  src="images/Tiktok 3D.png" alt="tiktok">
					<h3>Tiktok</h3>
				</div>

				<div class="app">
					<img src="images/Snapchart 3D.png" alt="Snapchart">
					<h3>Snapchart</h3>
				</div>
				<div class="app">
					<img src="images/Instagram 3D.png" alt="instagram">
					<h3>instagram</h3>
				</div>

				<div class="app">
					<img src="images/Telegram 3D.png" alt="Telegram">
					<h3>Telegram</h3>
				</div>
			</div>
		</div>

		<div id="safe">
			<h1>How To Stay Safe Online</h1>

			<div id="safetips">
				<div class="tip">

					<img src="images/two-factor.png" alt="two-factor">

					<div class="text">
						<h3>Two Factor Verification</h3>
						<p>
							Enable two-factor authentication (2FA) for an extra layer of security. 
						</p>
					</div>

				</div>

				<div class="tip">

					<img src="images/password.png" alt="password">

					<div class="text">
						<h3>Use Strong Passwords</h3>
						<p>
							Create strong, unique passwords
						 	for your social media accounts and avoid using the
							 same password for multiple accounts.
						</p>
					</div>

				</div>

				<div class="tip">

					<img src="images/settings.png" alt="settings">

					<div class="text">
						<h3>Review Privacy Settings</h3>
						<p>
							Regularly review 
							and adjust your privacy settings 
							on social media platforms to control who 
							can see your posts, profile information, 
							and other personal details. 
						</p>
					</div>

				</div>

				<div class="tip">

					<img src="images/block.png" alt="block">

					<div class="text">
						<h3>Report and Block</h3>
						<p>
							Report and block any abusive, harassing,
							 or inappropriate behavior encountered on social media platforms.
						</p>
					</div>

				</div>

			</div>

		</div>


	</div>

	<div id="footer">
		
		<div id="social">
			<a href="https://www.facebook.com">
				<div class="nav_div">
					<img src="images/facebook.png" alt="fb">
				</div>
			</a>

			<a href="https://www.twitter.com">
				<div class="nav_div">
					<img src="images/twitter.png" alt="twitter">
				</div>
			</a>
			<a href="https://www.instagram.com">
				<div class="nav_div">
					<img src="images/instagram.png" alt="twitter">
				</div>
			</a>

			<a href="https://www.youtube.com">
				<div class="nav_div">
					<img src="images/youtube.png" alt="Youtube">
				</div>
			</a>

		</div>

		<div id="navigate">
			<a href="index.php">
				<div id="current" class="nav_div">
					<p>Home</p>
				</div>
			</a>

			<a href="information.html">
				<div class="nav_div">
					<p>Information</p>
				</div>
			</a>

			<a href=" Popular.php">
				<div class="nav_div">
					<p>Most Popular Apps</p>
				</div>
			</a>

			<a href="help.html">
				<div class="nav_div">
					<p>How Parents Can Help</p>
				</div>
			</a>

			<a href="Livestreaming.html">
				<div class="nav_div">
					<p>Livestreaming</p>
				</div>
			</a>

			<a href="contact.html">
				<div class="nav_div">
				<p>contact</p>
				</div>
			</a>

			<a href="Legislation.html">
				<div class="nav_div">
				<p>Legislation & Guidance</p>
				</div>
			</a>

		</div>
		
		<p id="rights">&copy; 2024 SMC Ltd. All Rights Reserved.</p>
		
	</div>

	<script src="script.js"></script>
</body>
</html>