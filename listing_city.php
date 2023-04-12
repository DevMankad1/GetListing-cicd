<?php include('header.php'); ?>
<?php  

	if ($_GET['city'] == 'mumbai')
	{	
		$listing_fetch = mysqli_query($conn,"SELECT * FROM listing WHERE status != 0 AND listing_city = 'Mumbai' ");
		echo "


				<div class='blog'>
					<!-- Highlights -->
					<section class='wrapper'>
						<div class='inner'>
							<header class='special'>
								<h2>FIND LOCAL BUSINESS BY MUMBAI CITY</h2>
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
	elseif ($_GET['city'] == 'punjab') 
	{
		$listing_fetch = mysqli_query($conn,"SELECT * FROM listing WHERE status != 0 AND listing_city = 'Punjab' ");
		echo "


				<div class='blog'>
					<!-- Highlights -->
					<section class='wrapper'>
						<div class='inner'>
							<header class='special'>
								<h2>FIND LOCAL BUSINESS BY PUNJAB CITY</h2>
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
	elseif ($_GET['city'] == 'delhi') 
	{
		$listing_fetch = mysqli_query($conn,"SELECT * FROM listing WHERE status != 0 AND listing_city = 'Delhi' ");
		echo "


				<div class='blog'>
					<!-- Highlights -->
					<section class='wrapper'>
						<div class='inner'>
							<header class='special'>
								<h2>FIND LOCAL BUSINESS BY DELHI CITY</h2>
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