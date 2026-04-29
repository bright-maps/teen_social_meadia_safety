<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="style.css"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SMC Ltd. | Popular</title>
</head>
<body id="page">

    <header>
		
	</header>

	<div id="nav">
        <div id="nav_item">
				<a href="index.php">
					<div class="nav_div">
						<p>Home</p>
					</div>
				</a>	
				

				<a href="information.html">
					<div class="nav_div">
						<p>Information</p>
					</div>
				</a>

				<a href=" Popular.php">
					<div id="current" class="nav_div">
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
			
	</div>

	<div id="content">

		<div id="slide">

			<div class="slideshow-container">
				<div class="slide" id="slide1-security">
					<div class="caption">Social media can be both enjoyable and risky for teens.</div>
				</div>
				
				<div class="slide" id="slide2-security">
					<div class="caption">Guide teens to use social media safely by being mindful of their online activities.</div>
				</div>

				<div class="slide" id="slide3-security">
					<div class="caption">Support safe social media use in teens with guidance and mindfulness.</div>
				</div>

			</div>

		</div>


		<div id="safe">
			<h1>Techniques To Stay Safe On Different Apps</h1>
			<div id="search_container">
				<div id="search" class="search">
					<form class="search" id="searchForm">			
						<input type="search" name="search"  placeholder='Search Technique...' /> 
						<button class="search_button" type="submit"><img src="images/search.png" alt="search"></button>
					</form>
				</div>
			</div>
			<div id="safetips">
				<?php
						$servername = "localhost";
						$username = "root";
						$Password = "";
						$database = "Jaiden_SMC";
					
						// Create a connection to the database
						$conn = new mysqli($servername, $username, $Password, $database);
					
						// Check connection
						if ($conn->connect_error) {
							die("Connection failed: " . $conn->connect_error);
						}

					$sql = "SELECT * FROM techniques";
					$result = $conn->query($sql);

					// Check for techniques
					if ($result->num_rows > 0) {
						while($row = $result->fetch_assoc()) {
							$app = $row["app"];
							$technique = $row["technique"];
							$image = '';

							switch($app) {
								case 'Facebook':
									$image = 'Facebook 3D.png';
									break;
								case 'Twitter':
									$image = 'Twitter 3D.png';
									break;
								case 'Instagram':
									$image = 'Instagram 3D.png';
									break;
								case 'Telegram':
									$image = 'Telegram 3D.png';
									break;
							}

							echo '<div class="apptip">';
							echo '<img src="images/'.$image.'" alt="'.$app.'">';
							echo '<div class="text">';
							echo '<h3>'.$app.'</h3>';
							echo '<p>'.$technique.'</p>';
							echo '</div>';
							echo '</div>';
						}
					} else {
						echo "No techniques found.";
					}

			// Close the database connection
			$conn->close();
				
			?>
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
				<div class="nav_div">
					<p>Home</p>
				</div>
			</a>

			<a href="information.html">
				<div class="nav_div">
					<p>Information</p>
				</div>
			</a>

			<a href=" Popular.php">
				<div id="current" class="nav_div">
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

	<script>
    // Function to search tips
    function searchTips() {
      // Get input value
      var searchValue = document.getElementById("searchInput").value.toLowerCase();
      // Get all tip elements
      var tips = document.getElementsByClassName("apptip");

      // Loop through tips and hide/show based on search
      for (var i = 0; i < tips.length; i++) {
        var appText = tips[i].querySelector("h3").innerText.toLowerCase();
        var techniqueText = tips[i].querySelector("p").innerText.toLowerCase();
        if (appText.includes(searchValue) || techniqueText.includes(searchValue)) {
          tips[i].style.display = "block"; // Show tip
        } else {
          tips[i].style.display = "none"; // Hide tip
        }
      }
    }
  </script>

	<script src="script.js"></script>
</body>
</html>