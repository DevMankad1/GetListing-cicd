<!-- Header Include -->
<?php include('header.php'); ?>

<form class="authen_form" method="POST">
	<h2>Contact Listing Owner</h2>
	<input type="text" placeholder="Name" name="name">
	<input type="email" placeholder="Email" name="email">
	<input type="text" placeholder="Phone Number" name="contact" value="">
	<textarea cols="5" rows="5" name="message">Contact Reason Message</textarea><br>
	<input type="submit" value="Contact" name="submit">
</form>

<?php include('footer.php'); ?>