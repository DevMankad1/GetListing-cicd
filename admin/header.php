<?php include('../db.php'); session_start(); ?>

<!-- CSS Link -->
<link rel="stylesheet" href="../css/style.css" />

<!-- Header User Butoon and Session -->
<?php  

	if (isset($_SESSION['admin_id'])) 
	{
		$query = mysqli_query($conn,"SELECT * FROM admin WHERE id='{$_SESSION['admin_id']}'");
		$row = mysqli_fetch_row($query);
		echo "

			<header id='header'>
				<a class='logo' href='../index.php'>GET LISTING</a>
				<nav class='nav_header'>
					<a href='home.php' class='header_admin_a'>{$row['1']}</a>
				</nav>
			</header>

		";
	}
	else
	{
		echo "

			<header id='header'>
				<a class='logo' href='../index.php'>GET LISTING</a>
				<nav>
					<a href='../index.php'>Home</a>
					<a href='../explore.php'>Explore</a>
					<a href='../learn.php'>Learn</a>
					<a href='../blog.php'>Blog</a>
					<a href='../plans.php'>Add Properties</a>
					<a href='../signup.php'>Join Us</a>
					<a href='../login.php'>Login</a>
				</nav>
			</header>

		";
	}

?>