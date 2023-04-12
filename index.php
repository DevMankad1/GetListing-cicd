<?php  
		include('db.php');
		$listing_fetch = mysqli_query($conn,"SELECT * FROM listing WHERE status!='0' AND type='premium'");

?>
<!DOCTYPE HTML>
<html>
	<head>
		<title>GET LISTING</title>
	</head>
	<body class="is-preload">

		<?php include('header.php'); ?>
		<!-- Banner -->
			<section id="banner">
				<div class="inner">
					<h2>Explore The GET LISTING</h2>
					<form class="banner_form">
						<input type="text" placeholder="What are you looking for" class="banner_form_what">
						<input type="text" placeholder="Location" class="banner_form_location">
						<input type="submit" value="Search">
					</form>
				</div>
			</section>

		<!-- Highlights -->
		<?php  

			$listing_category_restourant = 'restourant';
			$listing_category_hospital = 'hospital';
			$listing_category_school_and_college = 'school_and_college';
			$listing_category_hotel_room = 'hotel_room';
			$listing_category_manufacturing = 'manufacturing';
			$listing_category_tour_travel = 'tour_travel';

		?>
			<section class="wrapper">
				<div class="inner">
					<header class="special">
						<h2>FIND LOCAL BUSINESS BY POPULAR CATEGORIES</h2>
						<p>Just click to get the best and featured business listing by business categories</p>
					</header>
					<div class="highlights">
						<section>
							<div class="content">
								<header>
									<?php echo '<a href="listing_category.php?category='.$listing_category_restourant.'"><img src="images/restourant.png"></a>'; ?>
									<h3>RESTOURANT</h3>
								</header>
								<p>Are you hungry then explore restourants by getlisting.</p>
							</div>
						</section>
						<section>
							<div class="content">
								<header>
									<?php echo '<a href="listing_category.php?category='.$listing_category_hospital.'"><img src="images/hospital.png"></a>'; ?>
									<h3>HOSPITAL</h3>
								</header>
								<p>Get the clean and nearest health center by just click in getlisting.</p>
							</div>
						</section>
						<section>
							<div class="content">
								<header>
									<?php echo '<a href="listing_category.php?category='.$listing_category_school_and_college.'"><img src="images/school.png"></a>'; ?>
									<h3>SCHOOL AND COLLEGE</h3>
								</header>
								<p>Find the best and nearest education trusts.</p>
							</div>
						</section>
						<section>
							<div class="content">
								<header>
									<?php echo '<a href="listing_category.php?category='.$listing_category_hotel_room.'"><img src="images/hotel.png"></a>'; ?>
									<h3>HOTEL ROOM</h3>
								</header>
								<p>Explore comforts bedroom and hotels by just click in getlisting.</p>
							</div>
						</section>
						<section>
							<div class="content">
								<header>
									<?php echo '<a href="listing_category.php?category='.$listing_category_tour_travel.'"><img src="images/tour.png"></a>'; ?>
									<h3>TOUR AND TRAVEL</h3>
								</header>
								<p>Wanna go somewhere then just open getlisting and you will find the best tours.</p>
							</div>
						</section>
						<section>
							<div class="content">
								<header>
									<?php echo '<a href="listing_category.php?category='.$listing_category_manufacturing.'"><img src="images/manufacturing.png"></a>'; ?>
									<h3>MANUFACTURING</h3>
								</header>
								<p>Get the best and less expensive manufacturer from getlisting.</p>
							</div>
						</section>
					</div>
				</div>
			</section>

			<!-- Highlights -->
			<section class="wrapper wrapper_padding_reduce">
				<div class="inner">
					<header class="special">
						<h2>FIND FEATURED BUSINESS LISTING</h2>
						<p>Just click to get the best and featured business listing.</p>
					</header>
					<div class="highlights">
						<?php  

							while ($listing_fetch_row = mysqli_fetch_row($listing_fetch)) 
							{
								echo '

										<section>
											<div class="content padding_reduce_content">
												<header>
													<a href="listing_page.php?lid='.$listing_fetch_row['0'].'"></a>
													<h3>'.$listing_fetch_row['1'].'</h3>
													<h4>'.$listing_fetch_row['23'].' Likes</h4>
												</header>
												<p>'.$listing_fetch_row['2'].'</p>
												<label>Featured</label>
											</div>
										</section>

									';
							}

						?>
					</div>
				</div>
			</section>

		<!-- CTA -->
			<section id="cta" class="wrapper">
				<div class="inner">
					<h2>GET LISTING MAIN FEATURES ?</h2>
					<p>As their are wide use of technology, We made the getlisting for users who wants to get the details of any thing at their home place. Many peoples are confused for going any entertainment place that which one is good or not, so we reduce that confusion point here by displaying business listing to users.</p>
				</div>
			</section>

		<!-- Highlights -->
		<?php  

			$listing_city_mumbai = 'mumbai';
			$listing_city_punjab = 'punjab';
			$listing_city_delhi = 'delhi';

		?>
			<section class="wrapper">
				<div class="inner">
					<header class="special">
						<h2>FIND LOCAL BUSINESS BY POPULAR CITY</h2>
						<p>Just click to get the best and featured business listing by business city</p>
					</header>
					<div class="highlights">
						<section>
							<div class="content">
								<header>
									<?php echo '<a href="listing_city.php?city='.$listing_city_delhi.'"><img src="images/delhi.png"></a>'; ?>
									<h3>DELHI</h3>
								</header>
							</div>
						</section>
						<section>
							<div class="content">
								<header>
									<?php echo '<a href="listing_city.php?city='.$listing_city_punjab.'"><img src="images/punjab.png"></a>'; ?>
									<h3>PUNJAB</h3>
								</header>
							</div>
						</section>
						<section>
							<div class="content">
								<header>
									<?php echo '<a href="listing_city.php?city='.$listing_city_mumbai.'"><img src="images/mumbai.png"></a>'; ?>
									<h3>MUMBAI</h3>
								</header>
							</div>
						</section>
					</div>
				</div>
			</section>

		<!-- Testimonials -->
			<section class="wrapper wrapper_padding_reduce">
				<div class="inner">
					<header class="special">
						<h2>OUR TEAM</h2>
						<p>These are the our group member who made the getlisting best and will make it more good in future.</p>
					</header>
					<div class="testimonials">
						<section>
							<div class="content">
								<blockquote>
									<p>UI/UX Design, Front-End</p>
								</blockquote>
								<div class="author">
									<div class="image">
										<img src="images/pic03.jpg" alt="" />
									</div>
									<p class="credit">- <strong>Alish Tadhani</strong> <span>G leader - GETLISTING INC.</span></p>
								</div>
							</div>
						</section>
						<section>
							<div class="content">
								<blockquote>
									<p>Back-end, Documantation</p>
								</blockquote>
								<div class="author">
									<div class="image">
										<img src="images/pic03.jpg" alt="" />
									</div>
									<p class="credit">- <strong>Dev Mankad</strong> <span>G member - GETLISTING INC.</span></p>
								</div>
							</div>
						</section>
					</div>
				</div>
			</section>

		<?php include('footer.php'); ?>

	</body>
</html>