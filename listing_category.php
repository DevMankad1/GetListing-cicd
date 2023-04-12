<?php include('header.php'); ?>
<?php  

	if ($_GET['category'] == 'restourant') 
	{	
		$listing_fetch = mysqli_query($conn,"SELECT * FROM listing WHERE status != 0 AND listing_category = 'Restourant' ");
		echo "


				<div class='blog'>
					<!-- Highlights -->
					<section class='wrapper'>
						<div class='inner'>
							<header class='special'>
								<h2>FIND LOCAL BUSINESS BY RESTOURANT CATEGORY</h2>
							</header>
							<div class='highlights'>
			 ";

			 while ($listing_fetch_row = mysqli_fetch_row($listing_fetch)) 
			 {
			 	echo "

			 			<section>
							<div class='content padding_reduce_content'>
								<header>
									<a href='listing_page.php?lid=".$listing_fetch_row['0']."'><img src='listed images/".$listing_fetch_row['13']."'></a>
									<h3>".$listing_fetch_row['1']."</h3>
									<h4>".$listing_fetch_row['23']." Likes</h4>
								</header>
								<p>".$listing_fetch_row['2']."</p>
							</div>
						</section>

			 		 ";
			 }

			 echo "

			 				</div>
						</div>
					</section>
				</div>

			 	  ";

	}
	elseif ($_GET['category'] == 'hospital') 
	{
		$listing_fetch = mysqli_query($conn,"SELECT * FROM listing WHERE status != 0 AND listing_category = 'Hospital' ");
		echo "


				<div class='blog'>
					<!-- Highlights -->
					<section class='wrapper'>
						<div class='inner'>
							<header class='special'>
								<h2>FIND LOCAL BUSINESS BY HOSPITAL CATEGORY</h2>
							</header>
							<div class='highlights'>
			 ";

			 while ($listing_fetch_row = mysqli_fetch_row($listing_fetch)) 
			 {
			 	echo "

			 			<section>
							<div class='content padding_reduce_content'>
								<header>
									<a href='listing_page.php?lid=".$listing_fetch_row['0']."'><img src='listed images/".$listing_fetch_row['13']."'></a>
									<h3>".$listing_fetch_row['1']."</h3>
									<h4>".$listing_fetch_row['23']." Likes</h4>
								</header>
								<p>".$listing_fetch_row['2']."</p>
							</div>
						</section>

			 		 ";
			 }

			 echo "

			 				</div>
						</div>
					</section>
				</div>

			 	  ";
	}
	elseif ($_GET['category'] == 'school_and_college') 
	{
		$listing_fetch = mysqli_query($conn,"SELECT * FROM listing WHERE status != 0 AND listing_category = 'School'
						OR listing_category='College' ");
		echo "


				<div class='blog'>
					<!-- Highlights -->
					<section class='wrapper'>
						<div class='inner'>
							<header class='special'>
								<h2>FIND LOCAL BUSINESS BY SCHOOL AND COLLEGE CATEGORY</h2>
							</header>
							<div class='highlights'>
			 ";

			 while ($listing_fetch_row = mysqli_fetch_row($listing_fetch)) 
			 {
			 	echo "

			 			<section>
							<div class='content padding_reduce_content'>
								<header>
									<a href='listing_page.php?lid=".$listing_fetch_row['0']."'><img src='listed images/".$listing_fetch_row['13']."'></a>
									<h3>".$listing_fetch_row['1']."</h3>
									<h4>".$listing_fetch_row['23']." Likes</h4>
								</header>
								<p>".$listing_fetch_row['2']."</p>
							</div>
						</section>

			 		 ";
			 }

			 echo "

			 				</div>
						</div>
					</section>
				</div>

			 	  ";
	}
	elseif ($_GET['category'] == 'hotel_room') 
	{
		$listing_fetch = mysqli_query($conn,"SELECT * FROM listing WHERE status != 0 AND listing_category = 'Hotel Room' ");
		echo "


				<div class='blog'>
					<!-- Highlights -->
					<section class='wrapper'>
						<div class='inner'>
							<header class='special'>
								<h2>FIND LOCAL BUSINESS BY HOTEL ROOM CATEGORY</h2>
							</header>
							<div class='highlights'>
			 ";

			 while ($listing_fetch_row = mysqli_fetch_row($listing_fetch)) 
			 {
			 	echo "

			 			<section>
							<div class='content padding_reduce_content'>
								<header>
									<a href='listing_page.php?lid=".$listing_fetch_row['0']."'><img src='listed images/".$listing_fetch_row['13']."'></a>
									<h3>".$listing_fetch_row['1']."</h3>
									<h4>".$listing_fetch_row['23']." Likes</h4>
								</header>
								<p>".$listing_fetch_row['2']."</p>
							</div>
						</section>

			 		 ";
			 }

			 echo "

			 				</div>
						</div>
					</section>
				</div>

			 	  ";
	}
	elseif ($_GET['category'] == 'manufacturing') 
	{
		$listing_fetch = mysqli_query($conn,"SELECT * FROM listing WHERE status != 0 AND listing_category = 'Manufacturing' ");
		echo "


				<div class='blog'>
					<!-- Highlights -->
					<section class='wrapper'>
						<div class='inner'>
							<header class='special'>
								<h2>FIND LOCAL BUSINESS BY MANUFACTURING CATEGORY</h2>
							</header>
							<div class='highlights'>
			 ";

			 while ($listing_fetch_row = mysqli_fetch_row($listing_fetch)) 
			 {
			 	echo "

			 			<section>
							<div class='content padding_reduce_content'>
								<header>
									<a href='listing_page.php?lid=".$listing_fetch_row['0']."'><img src='listed images/".$listing_fetch_row['13']."'></a>
									<h3>".$listing_fetch_row['1']."</h3>
									<h4>".$listing_fetch_row['23']." Likes</h4>
								</header>
								<p>".$listing_fetch_row['2']."</p>
							</div>
						</section>

			 		 ";
			 }

			 echo "

			 				</div>
						</div>
					</section>
				</div>

			 	  ";
	}
	elseif ($_GET['category'] == 'tour_travel')
	{
		$listing_fetch = mysqli_query($conn,"SELECT * FROM listing WHERE status != 0 AND listing_category = 'Tour And tranvels' ");
		echo "


				<div class='blog'>
					<!-- Highlights -->
					<section class='wrapper'>
						<div class='inner'>
							<header class='special'>
								<h2>FIND LOCAL BUSINESS BY RESTOURANT CATEGORY</h2>
							</header>
							<div class='highlights'>
			 ";

			 while ($listing_fetch_row = mysqli_fetch_row($listing_fetch)) 
			 {
			 	echo "

			 			<section>
							<div class='content padding_reduce_content'>
								<header>
									<a href='listing_page.php?lid=".$listing_fetch_row['0']."'><img src='listed images/".$listing_fetch_row['13']."'></a>
									<h3>".$listing_fetch_row['1']."</h3>
									<h4>".$listing_fetch_row['23']." Likes</h4>
								</header>
								<p>".$listing_fetch_row['2']."</p>
							</div>
						</section>

			 		 ";
			 }

			 echo "

			 				</div>
						</div>
					</section>
				</div>

			 	  ";
	}

?>
<?php include('footer.php'); ?>