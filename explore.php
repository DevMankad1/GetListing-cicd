<?php include('header.php'); ?>

<!-- Explore Form -->
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form method="POST" class="explore_form">
		<h3>Explore The Business Listing Here</h3>
		<input type="text" placeholder="What are you looking for">
		<input type="text" placeholder="location">
		<select>
                <option value="" disabled selected hidden>Category</option>
                <option>Hotel</option>
                <option>Restourant</option>
                <option>Mall</option>
                <option>Show Room</option>
                <option>School</option>
                <option>College</option>
                <option>Bakery</option>
                <option>Hospital</option>
                <option>Clinic</option>
                <option>Grocery Market</option>
        </select>
        <label>Filter By :</label>
        <select>
                <option value="" disabled selected hidden>Rating</option>
                <option>*</option>
                <option>**</option>
                <option>***</option>
                <option>****</option>
                <option>*****</option>
        </select>
        <select>
                <option value="" disabled selected hidden>Views</option>
                <option>Low</option>
                <option>Medium</option>
                <option>High</option>
        </select>
        <select>
                <option value="" disabled selected hidden>Listing</option>
                <option>Free</option>
                <option>Standard</option>
                <option>Premium</option>
        </select>
        <input type="submit">
	</form>

	<!-- Highlights -->
			<section class="wrapper wrapper_padding_explore_reduce">
				<div class="inner">
					<header class="special">
						<h2>FIND FEATURED BUSINESS LISTING</h2>
						<p>Just click to get the best and featured business listing.</p>
					</header>
					<div class="highlights">
						<section>
							<div class="content padding_reduce_content">
								<header>
									<a href="cate_restourant_listing.php"><img src="images/featured_listing1.jpg"></a>
									<h3>DELL LAPTOPS</h3>
									<h4>0 Favourites</h4>
								</header>
								<p>Nana Varachha,Deep Kamal Mall,Surat</p>
							</div>
						</section>
						<section>
							<div class="content padding_reduce_content">
								<header>
									<a href="cate_hospital_listing.php"><img src="images/featured_listing2.jpg"></a>
									<h3>OYYO ROOMS</h3>
									<h4>0 Favourites</h4>
								</header>
								<p>Nana Varachha,Deep Kamal Mall,Surat</p>
							</div>
						</section>
						<section>
							<div class="content padding_reduce_content">
								<header>
									<a href="cate_school_listing.php"><img src="images/featured_listing3.jpg"></a>
									<h3>MCDONALD'S</h3>
									<h4>0 Favourites</h4>
								</header>
								<p>Nana Varachha,Deep Kamal Mall,Surat</p>
							</div>
						</section>
						<section>
							<div class="content padding_reduce_content">
								<header>
									<a href="cate_hotel_listing.php"><img src="images/featured_listing4.jpg"></a>
									<h3>ADIDAS SHOES</h3>
									<h4>0 Favourites</h4>
								</header>
								<p>Nana Varachha,Deep Kamal Mall,Surat</p>
							</div>
						</section>
						<section>
							<div class="content padding_reduce_content">
								<header>
									<a href="cate_tour_listing.php"><img src="images/featured_listing5.jpg"></a>
									<h3>NIKE SHOES</h3>
									<h4>0 Favourites</h4>
								</header>
								<p>Nana Varachha,Deep Kamal Mall,Surat</p>
							</div>
						</section>
						<section>
							<div class="content padding_reduce_content">
								<header>
									<a href="cate_manufacturing_listing.php"><img src="images/featured_listing2.jpg"></a>
									<h3>LUXURIES HOTELS AND ROOMS</h3>
									<h4>0 Favourites</h4>
								</header>
								<p>Nana Varachha,Deep Kamal Mall,Surat</p>
							</div>
						</section>
					</div>
				</div>
			</section>

			<?php include('footer.php'); ?>