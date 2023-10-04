<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>INFORMATION</title>
	<link rel="stylesheet" href="flexible.css" />
	<link rel="stylesheet" href="boxicons/css/boxicons.min.css">
</head>

<body>
	<div class='row'>
		<div class='header'>
		<img id="log" src="logo.png"><h1>Engineer Project Management System</h1>
		</div>
	</div>

	<div class='row'>
		<div class='col-12'>
			<div id='nav'>
				<ul>
				<li class="active"><a href="home.php"><i class='bx bxs-home'></i>HOME</a></li>
					<li><a href=designs.php"><i class='bx bxs-info-circle'></i>DESIGNS</a></li>
					<li><a href="about.php"><i class='bx bx-swim'></i>ABOUT </a></li>
					<li><a href="feature.php"><i class='bx bxs-cog'></i>FEATURES</a></li>
					<li><a href="user_reviews.php"><i class='bx bx-comment-detail'></i>REVIEW</a></li>	
					<li><a href="contacts.html"><i class='bx bx-message'></i></i>CONTACT</a></li>
					<li><a href="logout-user.php"><i class='bx bxs-tree'></i>LOG OUT</a></li>
				</ul>
			</div>
		</div>
	</div>
	<div class="row">
	<h3>LOCATION MAPS & FEATURES</h3>	
	</div>
	
	<div class='row'>
		<div class='col-8'>

			<div class="maps">
				<div id="map1"><iframe
						src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d246693.53404361426!2d35.11660153015564!3d-14.960115072939198!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x18d9275e736d19b7%3A0x6126bbe4fb9feceb!2sLiwonde%20Safari%20Camp!5e0!3m2!1sen!2smw!4v1680526673184!5m2!1sen!2smw"
						allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe></div>


				<div id="map1"><iframe
						src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15632.910669009547!2d34.27970374750788!3d-11.607111737340439!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x191d68f3ce345fbd%3A0x82d0827da711d561!2sMayoka%20Village!5e0!3m2!1sen!2smw!4v1680526788944!5m2!1sen!2smw"
						allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe></div>

				<div id="map1"><iframe
						src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d491613.1958621133!2d34.83791237613714!3d-15.71257637603314!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x18d9e2b36aeef3e3%3A0x76ba6b2873d5ec9!2sAfrica%20Wild%20Truck!5e0!3m2!1sen!2smw!4v1680528334453!5m2!1sen!2smw"
						allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe></div>

			</div>

		</div>
		<div class=col-4>
			<div id="features">
				<img class="ft" src="parking.png">
				<h3>We have a huge parking area for your vehicles </h3>
			</div>
			<br>
			<div id="features">
				<img class="ft" src="movie.png">
				<h3>Every night we do Movie night from 9pm-11:30pm </h3>
			</div>
			<br>
			<div id="features">
				<img class="ft" src="wifi.png">
				<h3>Free wifi in all our sites with high internet speed </h3>
			</div>
		</div>

	</div>
	<h3>RSS Feed and Pitch Types</h3>
	<div class=row>
		<div class=col-4>
				<h2><i class='bx bx-rss'></i>RSS FEED</h2>
			<?php
           
          $rss_feed_url = 'https://campfiremag.co.uk/feed/';

            $xml = simplexml_load_file($rss_feed_url);

            echo '<h2>' . $xml->channel->title . '</h2>';
            $counter=0;
            foreach ($xml->channel->item as $item) {
                echo '<h3><a href="' . $item->link . '">' . $item->title . '</a></h3>';
              
                $counter++;
                if($counter==4){
                    break;
                }
            }

            ?>
		</div>

		<div class=col-4>
			<div id=sites>
				<img class="site" src="site2.png">
				<h3>This pitch type is located in Liwonde and it is called Liwonde Safari Camp.</h3>
				<button> <a href="pitch_types.php">MORE PITCH TYPES</a></button>
			</div>

		</div>
		<div class=col-4>
			<div id=sites>
				<img class="site" src="site3.png">
				<h3>This pitch type is located in Nkhatabay and is called Nkhakar Camp.</h3>
			</div>
		</div>

	</div>
	</div>
	<h3>Local Attraction</h3>
	<div class=row>
		<div class='col-4'>
			<div id="sites">
				<img class="Vsite" src="view1.png">
				<h3>This view was captured in Nkhatabay. Nkhakar camp 50 camping tents can be built on this site.</h3>
			</div>
		</div>

		<div class='col-4'>
			<div id="sites">
				<img class="Vsite" src="view2.png">
				<h3>This view was captured in Liwonde. Liwonde Safari camp is the largest site having 80 camping tents.
				</h3>
				<button> <a href="local_attraction.php">GO TO LOCAL ATTRACTION</a></button>
			</div>
		</div>

		<div class='col-4'>
			<div id="sites">
				<img class="site" src="view3.png">
				<h3>This view was captured in Mulanje. It has the best natural view and can have 30 camping tents</h3>
			</div>
		</div>
	</div>

	<div class='row'>
		<div id='footer'>
			<div id="footerNav">
				<li><a href="home.php">HOME</a></li>
				<li class="active"><a href="information.php">INFORMATION</a></li>
				<li><a href="pitch_types.php">PITCH TYPES </a></li>
				<li><a href="review.php">REVIEW</a></li>
				<li><a href="feature.php">FEATURE</a></li>
				<li><a href="contacts.html">CONTACT</a></li>
				<li><a href="local_Attraction.php">LOCAL ATTRACTION</a></li>
			</div>
			
			<a><i class='bx bxl-facebook-circle'></i></a>
			<a><i class='bx bxl-twitter'></i></a>
			<a><i class='bx bxl-whatsapp'></i></a>
			<a><i class='bx bxl-instagram'></i></a>
			<a><i class='bx bxl-tiktok'></i></a>
			<div id = "view"><h2>This page has been viewed <?php echo $views; ?> times.</h2></div>
			<h3>Global Wild Camping and Swimming &copy;copyrightsreserved </h3>
		</div>
	</div>
</body>

</html>