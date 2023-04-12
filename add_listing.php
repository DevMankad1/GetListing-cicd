<?php include('header.php'); ?>
<?php include('prevent_user.php'); ?>

<?php  
	
	if ($_GET['package'] == 'free') 
	{
		$free = mysqli_query($conn,"SELECT * FROM user_type WHERE id = '{$_SESSION['id']}'");
		$free_row = mysqli_fetch_row($free);

		if (isset($_POST['submit'])) 
		{
			$listing_name = $_POST['listing_name'];
			$listing_location = $_POST['listing_location'];
			$listing_email = $free_row['2'];
			$listing_member = $free_row['1'];
			$listing_city = $_POST['listing_city'];
			$listing_description = $_POST['listing_description'];
			$listing_contact = $_POST['listing_contact'];
			$listing_date = date("Y/m/d");
			$listing_category = $_POST['listing_category'];
			$listing_tagline = $_POST['listing_tagline'];
			$listing_telephone = $_POST['listing_telephone'];

			// listing from hours insertion
			$listing_from_hour = $_POST['listing_from_hour'];
			$listing_from_hour_arr = array();

			foreach ($listing_from_hour as $d)
			{
	    		$listing_from_hour_arr[] = $d;
			}
			$listing_from_hour_serialize = serialize($listing_from_hour_arr);

			// listing to hours insertion
			$listing_to_hour = $_POST['listing_to_hour'];
			$listing_to_hour_arr = array();

			foreach ($listing_to_hour as $e)
			{
	    		$listing_to_hour_arr[] = $e;
			}
			$listing_to_hour_serialize = serialize($listing_to_hour_arr);

			/*  Image upload 1*/
			$tmp_name1 = $_FILES['listing_image1']['tmp_name'];
			$listing_imgpath1 = "listed images/";
			$Filename1 = $_FILES['listing_image1']['name'];
			$Filename1 = rand(10, 1000).'-'.$Filename1;
			
			$new_filename1 = $listing_imgpath1.$Filename1;

			if(move_uploaded_file($_FILES['listing_image1']['tmp_name'], $new_filename1))
			{	
				$insert_q = "INSERT INTO listing (listing_name,listing_location,listing_email,listing_member_name,listing_category,listing_tagline,listing_city,listing_description,listing_contact,listing_date,type,payment,listing_image1,listing_hour_open,listing_hour_close,listing_telephone) VALUES ('$listing_name','$listing_location','$listing_email','$listing_member','$listing_category','$listing_tagline','$listing_city','$listing_description','$listing_contact','$listing_date','free','pending','$Filename1','$listing_from_hour_serialize','$listing_to_hour_serialize','$listing_telephone')";

				$insert = mysqli_query($conn, $insert_q);
				$update = mysqli_query($conn,"UPDATE user_type SET type = 'free' WHERE id='". $_SESSION['id']."' ");
				if ($insert==TRUE)
				{	
					header('location:payment.php');
				}
				else
				{
					echo "not inserted";
				}
			}
			else
			{
				echo"<script>alert('Something is incorrect please try again')</script>";
			}
		}



		// Form Design
		echo '

				<form method="POST" class="listing_form" enctype="multipart/form-data">
					<h3>ADD YOUR LISTING WITH GET LISTING</h3>
					<label>Business Name</label>
					<input type="text" placeholder="Business Name" name="listing_name">
					<label>Business Location</label>
					<input type="text" placeholder="Business Location" name="listing_location">
					<label>Business Email</label>
					<input type="text" value='.$row[2].' name="listing_email" readonly>
					<label>Business Categories</label>
					<select class="city_cate_tag" name="listing_category">
							<option value="Hospital">Hospital</option>
							<option value="Restourant">Restourant</option>
							<option value="Manufacturing">Manufacturing</option>
							<option value="Hotel Room">Hotel Room</option>
							<option value="School">School</option>
							<option value="College">College</option>
							<option value="Tour And tranvels">Tour And tranvels</option>
					</select>
					<label>Business Tagline</label>
					<input type="text" placeholder="Business Tagline" name="listing_tagline">
					<label>Business City</label>
					<select class="city_cate_tag" name="listing_city">
							<option value="Delhi">Delhi</option>
							<option value="Surat">Surat</option>
							<option value="Ahemdabad">Ahemdabad</option>
							<option value="Mumbai">Mumbai</option>
							<option value="Punjab">Punjab</option>
							<option value="Baroda">Baroda</option>
							<option value="Pune">Pune</option>
							<option value="Hydrabad">Hydrabad</option>
							<option value="Mysoure">Mysoure</option>
							<option value="Bangaluru">Bangaluru</option>
							<option value="Karnatak">Karnatak</option>
					</select>
					<label>Business Operation</label>
					<div class="form_op">
							<label class="day">Monday</label>
							<label class="open">Open</label>
							<select class="form_ope open_select" name="listing_from_hour[]">
									<option value="Closed">Closed</option>
									<option value="Open 24 Hour">Open 24 Hour</option>
									<option value="12:00 am">12:00 am</option>
									<option value="01:00 am">01:00 am</option>
									<option value="02:00 am">02:00 am</option>
									<option value="03:00 am">03:00 am</option>
									<option value="04:00 am">04:00 am</option>
									<option value="05:00 am">05:00 am</option>
									<option value="06:00 am">06:00 am</option>
									<option value="07:00 am">07:00 am</option>
									<option value="08:00 am">08:00 am</option>
									<option value="09:00 am">09:00 am</option>
									<option value="10:00 am">10:00 am</option>
									<option value="11:00 am">11:00 am</option>
									<option value="12:00 pm">12:00 pm</option>
									<option value="01:00 pm">01:00 pm</option>
									<option value="02:00 pm">02:00 pm</option>
									<option value="03:00 pm">03:00 pm</option>
									<option value="04:00 pm">04:00 pm</option>
									<option value="05:00 pm">05:00 pm</option>
									<option value="06:00 pm">06:00 pm</option>
									<option value="07:00 pm">07:00 pm</option>
									<option value="08:00 pm">08:00 pm</option>
									<option value="09:00 pm">09:00 pm</option>
									<option value="10:00 pm">10:00 pm</option>
									<option value="11:00 pm">11:00 pm</option>
							</select>
							<label class="close">Close</label>
							<select class="form_ope close_select" name="listing_to_hour[]">
									<option value="Closed">Closed</option>
									<option value="Open 24 Hour">Open 24 Hour</option>
									<option value="12:00 am">12:00 am</option>
									<option value="01:00 am">01:00 am</option>
									<option value="02:00 am">02:00 am</option>
									<option value="03:00 am">03:00 am</option>
									<option value="04:00 am">04:00 am</option>
									<option value="05:00 am">05:00 am</option>
									<option value="06:00 am">06:00 am</option>
									<option value="07:00 am">07:00 am</option>
									<option value="08:00 am">08:00 am</option>
									<option value="09:00 am">09:00 am</option>
									<option value="10:00 am">10:00 am</option>
									<option value="11:00 am">11:00 am</option>
									<option value="12:00 pm">12:00 pm</option>
									<option value="01:00 pm">01:00 pm</option>
									<option value="02:00 pm">02:00 pm</option>
									<option value="03:00 pm">03:00 pm</option>
									<option value="04:00 pm">04:00 pm</option>
									<option value="05:00 pm">05:00 pm</option>
									<option value="06:00 pm">06:00 pm</option>
									<option value="07:00 pm">07:00 pm</option>
									<option value="08:00 pm">08:00 pm</option>
									<option value="09:00 pm">09:00 pm</option>
									<option value="10:00 pm">10:00 pm</option>
									<option value="11:00 pm">11:00 pm</option>
							</select>
							<label class="day">Tuesday</label>
							<label class="open">Open</label>
							<select class="form_ope open_select" name="listing_from_hour[]">
									<option value="Closed">Closed</option>
									<option value="Open 24 Hour">Open 24 Hour</option>
									<option value="12:00 am">12:00 am</option>
									<option value="01:00 am">01:00 am</option>
									<option value="02:00 am">02:00 am</option>
									<option value="03:00 am">03:00 am</option>
									<option value="04:00 am">04:00 am</option>
									<option value="05:00 am">05:00 am</option>
									<option value="06:00 am">06:00 am</option>
									<option value="07:00 am">07:00 am</option>
									<option value="08:00 am">08:00 am</option>
									<option value="09:00 am">09:00 am</option>
									<option value="10:00 am">10:00 am</option>
									<option value="11:00 am">11:00 am</option>
									<option value="12:00 pm">12:00 pm</option>
									<option value="01:00 pm">01:00 pm</option>
									<option value="02:00 pm">02:00 pm</option>
									<option value="03:00 pm">03:00 pm</option>
									<option value="04:00 pm">04:00 pm</option>
									<option value="05:00 pm">05:00 pm</option>
									<option value="06:00 pm">06:00 pm</option>
									<option value="07:00 pm">07:00 pm</option>
									<option value="08:00 pm">08:00 pm</option>
									<option value="09:00 pm">09:00 pm</option>
									<option value="10:00 pm">10:00 pm</option>
									<option value="11:00 pm">11:00 pm</option>
							</select>
							<label class="close">Close</label>
							<select class="form_ope close_select" name="listing_to_hour[]">
									<option value="Closed">Closed</option>
									<option value="Open 24 Hour">Open 24 Hour</option>
									<option value="12:00 am">12:00 am</option>
									<option value="01:00 am">01:00 am</option>
									<option value="02:00 am">02:00 am</option>
									<option value="03:00 am">03:00 am</option>
									<option value="04:00 am">04:00 am</option>
									<option value="05:00 am">05:00 am</option>
									<option value="06:00 am">06:00 am</option>
									<option value="07:00 am">07:00 am</option>
									<option value="08:00 am">08:00 am</option>
									<option value="09:00 am">09:00 am</option>
									<option value="10:00 am">10:00 am</option>
									<option value="11:00 am">11:00 am</option>
									<option value="12:00 pm">12:00 pm</option>
									<option value="01:00 pm">01:00 pm</option>
									<option value="02:00 pm">02:00 pm</option>
									<option value="03:00 pm">03:00 pm</option>
									<option value="04:00 pm">04:00 pm</option>
									<option value="05:00 pm">05:00 pm</option>
									<option value="06:00 pm">06:00 pm</option>
									<option value="07:00 pm">07:00 pm</option>
									<option value="08:00 pm">08:00 pm</option>
									<option value="09:00 pm">09:00 pm</option>
									<option value="10:00 pm">10:00 pm</option>
									<option value="11:00 pm">11:00 pm</option>
							</select>
							<label class="day">Wednesday</label>
							<label class="open">Open</label>
							<select class="form_ope open_select" name="listing_from_hour[]">
									<option value="Closed">Closed</option>
									<option value="Open 24 Hour">Open 24 Hour</option>
									<option value="12:00 am">12:00 am</option>
									<option value="01:00 am">01:00 am</option>
									<option value="02:00 am">02:00 am</option>
									<option value="03:00 am">03:00 am</option>
									<option value="04:00 am">04:00 am</option>
									<option value="05:00 am">05:00 am</option>
									<option value="06:00 am">06:00 am</option>
									<option value="07:00 am">07:00 am</option>
									<option value="08:00 am">08:00 am</option>
									<option value="09:00 am">09:00 am</option>
									<option value="10:00 am">10:00 am</option>
									<option value="11:00 am">11:00 am</option>
									<option value="12:00 pm">12:00 pm</option>
									<option value="01:00 pm">01:00 pm</option>
									<option value="02:00 pm">02:00 pm</option>
									<option value="03:00 pm">03:00 pm</option>
									<option value="04:00 pm">04:00 pm</option>
									<option value="05:00 pm">05:00 pm</option>
									<option value="06:00 pm">06:00 pm</option>
									<option value="07:00 pm">07:00 pm</option>
									<option value="08:00 pm">08:00 pm</option>
									<option value="09:00 pm">09:00 pm</option>
									<option value="10:00 pm">10:00 pm</option>
									<option value="11:00 pm">11:00 pm</option>
							</select>
							<label class="close">Close</label>
							<select class="form_ope close_select" name="listing_to_hour[]">
									<option value="Closed">Closed</option>
									<option value="Open 24 Hour">Open 24 Hour</option>
									<option value="12:00 am">12:00 am</option>
									<option value="01:00 am">01:00 am</option>
									<option value="02:00 am">02:00 am</option>
									<option value="03:00 am">03:00 am</option>
									<option value="04:00 am">04:00 am</option>
									<option value="05:00 am">05:00 am</option>
									<option value="06:00 am">06:00 am</option>
									<option value="07:00 am">07:00 am</option>
									<option value="08:00 am">08:00 am</option>
									<option value="09:00 am">09:00 am</option>
									<option value="10:00 am">10:00 am</option>
									<option value="11:00 am">11:00 am</option>
									<option value="12:00 pm">12:00 pm</option>
									<option value="01:00 pm">01:00 pm</option>
									<option value="02:00 pm">02:00 pm</option>
									<option value="03:00 pm">03:00 pm</option>
									<option value="04:00 pm">04:00 pm</option>
									<option value="05:00 pm">05:00 pm</option>
									<option value="06:00 pm">06:00 pm</option>
									<option value="07:00 pm">07:00 pm</option>
									<option value="08:00 pm">08:00 pm</option>
									<option value="09:00 pm">09:00 pm</option>
									<option value="10:00 pm">10:00 pm</option>
									<option value="11:00 pm">11:00 pm</option>
							</select>
							<label class="day">Thursday</label>
							<label class="open">Open</label>
							<select class="form_ope open_select" name="listing_from_hour[]">
									<option value="Closed">Closed</option>
									<option value="Open 24 Hour">Open 24 Hour</option>
									<option value="12:00 am">12:00 am</option>
									<option value="01:00 am">01:00 am</option>
									<option value="02:00 am">02:00 am</option>
									<option value="03:00 am">03:00 am</option>
									<option value="04:00 am">04:00 am</option>
									<option value="05:00 am">05:00 am</option>
									<option value="06:00 am">06:00 am</option>
									<option value="07:00 am">07:00 am</option>
									<option value="08:00 am">08:00 am</option>
									<option value="09:00 am">09:00 am</option>
									<option value="10:00 am">10:00 am</option>
									<option value="11:00 am">11:00 am</option>
									<option value="12:00 pm">12:00 pm</option>
									<option value="01:00 pm">01:00 pm</option>
									<option value="02:00 pm">02:00 pm</option>
									<option value="03:00 pm">03:00 pm</option>
									<option value="04:00 pm">04:00 pm</option>
									<option value="05:00 pm">05:00 pm</option>
									<option value="06:00 pm">06:00 pm</option>
									<option value="07:00 pm">07:00 pm</option>
									<option value="08:00 pm">08:00 pm</option>
									<option value="09:00 pm">09:00 pm</option>
									<option value="10:00 pm">10:00 pm</option>
									<option value="11:00 pm">11:00 pm</option>
							</select>
							<label class="close">Close</label>
							<select class="form_ope close_select" name="listing_to_hour[]">
									<option value="Closed">Closed</option>
									<option value="Open 24 Hour">Open 24 Hour</option>
									<option value="12:00 am">12:00 am</option>
									<option value="01:00 am">01:00 am</option>
									<option value="02:00 am">02:00 am</option>
									<option value="03:00 am">03:00 am</option>
									<option value="04:00 am">04:00 am</option>
									<option value="05:00 am">05:00 am</option>
									<option value="06:00 am">06:00 am</option>
									<option value="07:00 am">07:00 am</option>
									<option value="08:00 am">08:00 am</option>
									<option value="09:00 am">09:00 am</option>
									<option value="10:00 am">10:00 am</option>
									<option value="11:00 am">11:00 am</option>
									<option value="12:00 pm">12:00 pm</option>
									<option value="01:00 pm">01:00 pm</option>
									<option value="02:00 pm">02:00 pm</option>
									<option value="03:00 pm">03:00 pm</option>
									<option value="04:00 pm">04:00 pm</option>
									<option value="05:00 pm">05:00 pm</option>
									<option value="06:00 pm">06:00 pm</option>
									<option value="07:00 pm">07:00 pm</option>
									<option value="08:00 pm">08:00 pm</option>
									<option value="09:00 pm">09:00 pm</option>
									<option value="10:00 pm">10:00 pm</option>
									<option value="11:00 pm">11:00 pm</option>
							</select>
							<label class="day">Friday</label>
							<label class="open">Open</label>
							<select class="form_ope open_select" name="listing_from_hour[]">
									<option value="Closed">Closed</option>
									<option value="Open 24 Hour">Open 24 Hour</option>
									<option value="12:00 am">12:00 am</option>
									<option value="01:00 am">01:00 am</option>
									<option value="02:00 am">02:00 am</option>
									<option value="03:00 am">03:00 am</option>
									<option value="04:00 am">04:00 am</option>
									<option value="05:00 am">05:00 am</option>
									<option value="06:00 am">06:00 am</option>
									<option value="07:00 am">07:00 am</option>
									<option value="08:00 am">08:00 am</option>
									<option value="09:00 am">09:00 am</option>
									<option value="10:00 am">10:00 am</option>
									<option value="11:00 am">11:00 am</option>
									<option value="12:00 pm">12:00 pm</option>
									<option value="01:00 pm">01:00 pm</option>
									<option value="02:00 pm">02:00 pm</option>
									<option value="03:00 pm">03:00 pm</option>
									<option value="04:00 pm">04:00 pm</option>
									<option value="05:00 pm">05:00 pm</option>
									<option value="06:00 pm">06:00 pm</option>
									<option value="07:00 pm">07:00 pm</option>
									<option value="08:00 pm">08:00 pm</option>
									<option value="09:00 pm">09:00 pm</option>
									<option value="10:00 pm">10:00 pm</option>
									<option value="11:00 pm">11:00 pm</option>
							</select>
							<label class="close">Close</label>
							<select class="form_ope close_select" name="listing_to_hour[]">
									<option value="Closed">Closed</option>
									<option value="Open 24 Hour">Open 24 Hour</option>
									<option value="12:00 am">12:00 am</option>
									<option value="01:00 am">01:00 am</option>
									<option value="02:00 am">02:00 am</option>
									<option value="03:00 am">03:00 am</option>
									<option value="04:00 am">04:00 am</option>
									<option value="05:00 am">05:00 am</option>
									<option value="06:00 am">06:00 am</option>
									<option value="07:00 am">07:00 am</option>
									<option value="08:00 am">08:00 am</option>
									<option value="09:00 am">09:00 am</option>
									<option value="10:00 am">10:00 am</option>
									<option value="11:00 am">11:00 am</option>
									<option value="12:00 pm">12:00 pm</option>
									<option value="01:00 pm">01:00 pm</option>
									<option value="02:00 pm">02:00 pm</option>
									<option value="03:00 pm">03:00 pm</option>
									<option value="04:00 pm">04:00 pm</option>
									<option value="05:00 pm">05:00 pm</option>
									<option value="06:00 pm">06:00 pm</option>
									<option value="07:00 pm">07:00 pm</option>
									<option value="08:00 pm">08:00 pm</option>
									<option value="09:00 pm">09:00 pm</option>
									<option value="10:00 pm">10:00 pm</option>
									<option value="11:00 pm">11:00 pm</option>
							</select>
							<label class="day">Saturday</label>
							<label class="open">Open</label>
							<select class="form_ope open_select" name="listing_from_hour[]">
									<option value="Closed">Closed</option>
									<option value="Open 24 Hour">Open 24 Hour</option>
									<option value="12:00 am">12:00 am</option>
									<option value="01:00 am">01:00 am</option>
									<option value="02:00 am">02:00 am</option>
									<option value="03:00 am">03:00 am</option>
									<option value="04:00 am">04:00 am</option>
									<option value="05:00 am">05:00 am</option>
									<option value="06:00 am">06:00 am</option>
									<option value="07:00 am">07:00 am</option>
									<option value="08:00 am">08:00 am</option>
									<option value="09:00 am">09:00 am</option>
									<option value="10:00 am">10:00 am</option>
									<option value="11:00 am">11:00 am</option>
									<option value="12:00 pm">12:00 pm</option>
									<option value="01:00 pm">01:00 pm</option>
									<option value="02:00 pm">02:00 pm</option>
									<option value="03:00 pm">03:00 pm</option>
									<option value="04:00 pm">04:00 pm</option>
									<option value="05:00 pm">05:00 pm</option>
									<option value="06:00 pm">06:00 pm</option>
									<option value="07:00 pm">07:00 pm</option>
									<option value="08:00 pm">08:00 pm</option>
									<option value="09:00 pm">09:00 pm</option>
									<option value="10:00 pm">10:00 pm</option>
									<option value="11:00 pm">11:00 pm</option>
							</select>
							<label class="close">Close</label>
							<select class="form_ope close_select" name="listing_to_hour[]">
									<option value="Closed">Closed</option>
									<option value="Open 24 Hour">Open 24 Hour</option>
									<option value="12:00 am">12:00 am</option>
									<option value="01:00 am">01:00 am</option>
									<option value="02:00 am">02:00 am</option>
									<option value="03:00 am">03:00 am</option>
									<option value="04:00 am">04:00 am</option>
									<option value="05:00 am">05:00 am</option>
									<option value="06:00 am">06:00 am</option>
									<option value="07:00 am">07:00 am</option>
									<option value="08:00 am">08:00 am</option>
									<option value="09:00 am">09:00 am</option>
									<option value="10:00 am">10:00 am</option>
									<option value="11:00 am">11:00 am</option>
									<option value="12:00 pm">12:00 pm</option>
									<option value="01:00 pm">01:00 pm</option>
									<option value="02:00 pm">02:00 pm</option>
									<option value="03:00 pm">03:00 pm</option>
									<option value="04:00 pm">04:00 pm</option>
									<option value="05:00 pm">05:00 pm</option>
									<option value="06:00 pm">06:00 pm</option>
									<option value="07:00 pm">07:00 pm</option>
									<option value="08:00 pm">08:00 pm</option>
									<option value="09:00 pm">09:00 pm</option>
									<option value="10:00 pm">10:00 pm</option>
									<option value="11:00 pm">11:00 pm</option>
							</select>
							<label class="day">Sunday</label>
							<label class="open">Open</label>
							<select class="form_ope open_select" name="listing_from_hour[]">
									<option value="Closed">Closed</option>
									<option value="Open 24 Hour">Open 24 Hour</option>
									<option value="12:00 am">12:00 am</option>
									<option value="01:00 am">01:00 am</option>
									<option value="02:00 am">02:00 am</option>
									<option value="03:00 am">03:00 am</option>
									<option value="04:00 am">04:00 am</option>
									<option value="05:00 am">05:00 am</option>
									<option value="06:00 am">06:00 am</option>
									<option value="07:00 am">07:00 am</option>
									<option value="08:00 am">08:00 am</option>
									<option value="09:00 am">09:00 am</option>
									<option value="10:00 am">10:00 am</option>
									<option value="11:00 am">11:00 am</option>
									<option value="12:00 pm">12:00 pm</option>
									<option value="01:00 pm">01:00 pm</option>
									<option value="02:00 pm">02:00 pm</option>
									<option value="03:00 pm">03:00 pm</option>
									<option value="04:00 pm">04:00 pm</option>
									<option value="05:00 pm">05:00 pm</option>
									<option value="06:00 pm">06:00 pm</option>
									<option value="07:00 pm">07:00 pm</option>
									<option value="08:00 pm">08:00 pm</option>
									<option value="09:00 pm">09:00 pm</option>
									<option value="10:00 pm">10:00 pm</option>
									<option value="11:00 pm">11:00 pm</option>
							</select>
							<label class="close">Close</label>
							<select class="form_ope close_select" name="listing_to_hour[]">
									<option value="Closed">Closed</option>
									<option value="Open 24 Hour">Open 24 Hour</option>
									<option value="12:00 am">12:00 am</option>
									<option value="01:00 am">01:00 am</option>
									<option value="02:00 am">02:00 am</option>
									<option value="03:00 am">03:00 am</option>
									<option value="04:00 am">04:00 am</option>
									<option value="05:00 am">05:00 am</option>
									<option value="06:00 am">06:00 am</option>
									<option value="07:00 am">07:00 am</option>
									<option value="08:00 am">08:00 am</option>
									<option value="09:00 am">09:00 am</option>
									<option value="10:00 am">10:00 am</option>
									<option value="11:00 am">11:00 am</option>
									<option value="12:00 pm">12:00 pm</option>
									<option value="01:00 pm">01:00 pm</option>
									<option value="02:00 pm">02:00 pm</option>
									<option value="03:00 pm">03:00 pm</option>
									<option value="04:00 pm">04:00 pm</option>
									<option value="05:00 pm">05:00 pm</option>
									<option value="06:00 pm">06:00 pm</option>
									<option value="07:00 pm">07:00 pm</option>
									<option value="08:00 pm">08:00 pm</option>
									<option value="09:00 pm">09:00 pm</option>
									<option value="10:00 pm">10:00 pm</option>
									<option value="11:00 pm">11:00 pm</option>	
							</select>
						</div>
					</div>
					<label>Business Gallery</label>
					<input type="file" name="listing_image1">
					<label>Business Description</label>
					<textarea rows="5" cols="5" placeholder="Business Description" name="listing_description"></textarea>
					<label>Business Phone Number</label>
					<input type="text" placeholder="Business Phone" name="listing_contact">
					<label>Business Telephone Number</label>
					<input type="text" placeholder="Business Telephone Number" name="listing_telephone">
					<input type="submit" name="submit">
				</form>

		';
	}
	elseif ($_GET['package'] == 'standard') 
	{

		$standard = mysqli_query($conn,"SELECT * FROM user_type WHERE id = '{$_SESSION['id']}'");
		$standard_row = mysqli_fetch_row($standard);

		if (isset($_POST['submit'])) 
		{
			$listing_name = $_POST['listing_name'];
			$listing_location = $_POST['listing_location'];
			$listing_email = $row['2'];
			$listing_member = $row['1'];
			$listing_category = $_POST['listing_category'];
			$listing_tagline = $_POST['listing_tagline'];
			$listing_city = $_POST['listing_city'];
			$listing_description = $_POST['listing_description'];
			$listing_contact = $_POST['listing_contact'];
			$listing_video = $_POST['listing_video'];
			$listing_website = $_POST['listing_website'];
			$listing_facebook = $_POST['listing_facebook'];
			$listing_instagram = $_POST['listing_instagram'];
			$listing_date = date("Y/m/d");
			$listing_telephone = $_POST['listing_telephone'];


			// listing from hours insertion
			$listing_from_hour = $_POST['listing_from_hour'];
			$listing_from_hour_arr = array();

			foreach ($listing_from_hour as $d)
			{
	    		$listing_from_hour_arr[] = $d;
			}
			$listing_from_hour_serialize = serialize($listing_from_hour_arr);

			// listing to hours insertion
			$listing_to_hour = $_POST['listing_to_hour'];
			$listing_to_hour_arr = array();

			foreach ($listing_to_hour as $e)
			{
	    		$listing_to_hour_arr[] = $e;
			}
			$listing_to_hour_serialize = serialize($listing_to_hour_arr);

			/*  Image upload 1*/
			$tmp_name1 = $_FILES['listing_image1']['tmp_name'];
			$listing_imgpath1 = "listed images/";
			$Filename1 = $_FILES['listing_image1']['name'];
			$Filename1 = rand(10, 1000).'-'.$Filename1;
			
			$new_filename1 = $listing_imgpath1.$Filename1;

			/*  Image upload 2*/
			$tmp_name2 = $_FILES['listing_image2']['tmp_name'];
			$listing_imgpath2 = "listed images/";
			$Filename2 = $_FILES['listing_image2']['name'];
			$Filename2 = rand(10, 1000).'-'.$Filename2;
			
			$new_filename2 = $listing_imgpath2.$Filename2;


			if(move_uploaded_file($_FILES['listing_image1']['tmp_name'], $new_filename1) AND move_uploaded_file($_FILES['listing_image2']['tmp_name'], $new_filename2))
			{

				$insert_q = "INSERT INTO listing (listing_name,listing_location,listing_email,listing_member_name,listing_category,listing_tagline,listing_city,listing_description,listing_contact,listing_date,type,payment,listing_image1,listing_image2,listing_hour_open,listing_hour_close,listing_video_url,listing_website_url,listing_telephone) VALUES ('$listing_name','$listing_location','$listing_email','{$standard_row['1']}','$listing_category','$listing_tagline','$listing_city','$listing_description','$listing_contact','$listing_date','standard','pending','$Filename1','$Filename2','$listing_from_hour_serialize','$listing_to_hour_serialize','$listing_video','$listing_website','$listing_telephone')";

				$insert = mysqli_query($conn, $insert_q);
				$update = mysqli_query($conn,"UPDATE user_type SET type = 'standard' WHERE id='". $_SESSION['id']."' ");
				if ($insert==TRUE)
				{	
					header('location:payment.php');
				}
			}
			else
			{
				echo"<script>alert('Something is incorrect please try again')</script>";
			}
		}


			echo '

			<form method="POST" class="listing_form" enctype="multipart/form-data">
				<h3>ADD YOUR LISTING WITH GET LISTING</h3>
				<label>Business Name</label>
				<input type="text" placeholder="Business Name" name="listing_name">
				<label>Business Location</label>
				<input type="text" placeholder="Business Location" name="listing_location">
				<label>Business Email</label>
				<input type="text" value='.$row[2].' name="listing_email" readonly>
				<label>Business Categories</label>
				<select class="city_cate_tag" name="listing_category">
						<option value="Hospital">Hospital</option>
						<option value="Restourant">Restourant</option>
						<option value="Manufacturing">Manufacturing</option>
						<option value="Hotel Room">Hotel Room</option>
						<option value="School">School</option>
						<option value="College">College</option>
						<option value="Tour And tranvels">Tour And tranvels</option>
				</select>
				<label>Business Tagline</label>
				<input type="text" placeholder="Business Tagline" name="listing_tagline">
				<label>Business City</label>
				<select class="city_cate_tag" name="listing_city">
						<option value="Delhi">Delhi</option>
						<option value="Surat">Surat</option>
						<option value="Ahemdabad">Ahemdabad</option>
						<option value="Mumbai">Mumbai</option>
						<option value="Baroda">Baroda</option>
						<option value="Punjab">Punjab</option>
						<option value="Pune">Pune</option>
						<option value="Hydrabad">Hydrabad</option>
						<option value="Mysoure">Mysoure</option>
						<option value="Bangaluru">Bangaluru</option>
						<option value="Karnatak">Karnatak</option>
				</select>
				<label>Business Operation</label>
				<div class="form_op">
						<label class="day">Monday</label>
						<label class="open">Open</label>
						<select class="form_ope open_select" name="listing_from_hour[]">
								<option value="Closed">Closed</option>
								<option value="Open 24 Hour">Open 24 Hour</option>
								<option value="12:00 am">12:00 am</option>
								<option value="01:00 am">01:00 am</option>
								<option value="02:00 am">02:00 am</option>
								<option value="03:00 am">03:00 am</option>
								<option value="04:00 am">04:00 am</option>
								<option value="05:00 am">05:00 am</option>
								<option value="06:00 am">06:00 am</option>
								<option value="07:00 am">07:00 am</option>
								<option value="08:00 am">08:00 am</option>
								<option value="09:00 am">09:00 am</option>
								<option value="10:00 am">10:00 am</option>
								<option value="11:00 am">11:00 am</option>
								<option value="12:00 pm">12:00 pm</option>
								<option value="01:00 pm">01:00 pm</option>
								<option value="02:00 pm">02:00 pm</option>
								<option value="03:00 pm">03:00 pm</option>
								<option value="04:00 pm">04:00 pm</option>
								<option value="05:00 pm">05:00 pm</option>
								<option value="06:00 pm">06:00 pm</option>
								<option value="07:00 pm">07:00 pm</option>
								<option value="08:00 pm">08:00 pm</option>
								<option value="09:00 pm">09:00 pm</option>
								<option value="10:00 pm">10:00 pm</option>
								<option value="11:00 pm">11:00 pm</option>
						</select>
						<label class="close">Close</label>
						<select class="form_ope close_select" name="listing_to_hour[]">
								<option value="Closed">Closed</option>
								<option value="Open 24 Hour">Open 24 Hour</option>
								<option value="12:00 am">12:00 am</option>
								<option value="01:00 am">01:00 am</option>
								<option value="02:00 am">02:00 am</option>
								<option value="03:00 am">03:00 am</option>
								<option value="04:00 am">04:00 am</option>
								<option value="05:00 am">05:00 am</option>
								<option value="06:00 am">06:00 am</option>
								<option value="07:00 am">07:00 am</option>
								<option value="08:00 am">08:00 am</option>
								<option value="09:00 am">09:00 am</option>
								<option value="10:00 am">10:00 am</option>
								<option value="11:00 am">11:00 am</option>
								<option value="12:00 pm">12:00 pm</option>
								<option value="01:00 pm">01:00 pm</option>
								<option value="02:00 pm">02:00 pm</option>
								<option value="03:00 pm">03:00 pm</option>
								<option value="04:00 pm">04:00 pm</option>
								<option value="05:00 pm">05:00 pm</option>
								<option value="06:00 pm">06:00 pm</option>
								<option value="07:00 pm">07:00 pm</option>
								<option value="08:00 pm">08:00 pm</option>
								<option value="09:00 pm">09:00 pm</option>
								<option value="10:00 pm">10:00 pm</option>
								<option value="11:00 pm">11:00 pm</option>
						</select>
						<label class="day">Tuesday</label>
						<label class="open">Open</label>
						<select class="form_ope open_select" name="listing_from_hour[]">
								<option value="Closed">Closed</option>
								<option value="Open 24 Hour">Open 24 Hour</option>
								<option value="12:00 am">12:00 am</option>
								<option value="01:00 am">01:00 am</option>
								<option value="02:00 am">02:00 am</option>
								<option value="03:00 am">03:00 am</option>
								<option value="04:00 am">04:00 am</option>
								<option value="05:00 am">05:00 am</option>
								<option value="06:00 am">06:00 am</option>
								<option value="07:00 am">07:00 am</option>
								<option value="08:00 am">08:00 am</option>
								<option value="09:00 am">09:00 am</option>
								<option value="10:00 am">10:00 am</option>
								<option value="11:00 am">11:00 am</option>
								<option value="12:00 pm">12:00 pm</option>
								<option value="01:00 pm">01:00 pm</option>
								<option value="02:00 pm">02:00 pm</option>
								<option value="03:00 pm">03:00 pm</option>
								<option value="04:00 pm">04:00 pm</option>
								<option value="05:00 pm">05:00 pm</option>
								<option value="06:00 pm">06:00 pm</option>
								<option value="07:00 pm">07:00 pm</option>
								<option value="08:00 pm">08:00 pm</option>
								<option value="09:00 pm">09:00 pm</option>
								<option value="10:00 pm">10:00 pm</option>
								<option value="11:00 pm">11:00 pm</option>
						</select>
						<label class="close">Close</label>
						<select class="form_ope close_select" name="listing_to_hour[]">
								<option value="Closed">Closed</option>
								<option value="Open 24 Hour">Open 24 Hour</option>
								<option value="12:00 am">12:00 am</option>
								<option value="01:00 am">01:00 am</option>
								<option value="02:00 am">02:00 am</option>
								<option value="03:00 am">03:00 am</option>
								<option value="04:00 am">04:00 am</option>
								<option value="05:00 am">05:00 am</option>
								<option value="06:00 am">06:00 am</option>
								<option value="07:00 am">07:00 am</option>
								<option value="08:00 am">08:00 am</option>
								<option value="09:00 am">09:00 am</option>
								<option value="10:00 am">10:00 am</option>
								<option value="11:00 am">11:00 am</option>
								<option value="12:00 pm">12:00 pm</option>
								<option value="01:00 pm">01:00 pm</option>
								<option value="02:00 pm">02:00 pm</option>
								<option value="03:00 pm">03:00 pm</option>
								<option value="04:00 pm">04:00 pm</option>
								<option value="05:00 pm">05:00 pm</option>
								<option value="06:00 pm">06:00 pm</option>
								<option value="07:00 pm">07:00 pm</option>
								<option value="08:00 pm">08:00 pm</option>
								<option value="09:00 pm">09:00 pm</option>
								<option value="10:00 pm">10:00 pm</option>
								<option value="11:00 pm">11:00 pm</option>
						</select>
						<label class="day">Wednesday</label>
						<label class="open">Open</label>
						<select class="form_ope open_select" name="listing_from_hour[]">
								<option value="Closed">Closed</option>
								<option value="Open 24 Hour">Open 24 Hour</option>
								<option value="12:00 am">12:00 am</option>
								<option value="01:00 am">01:00 am</option>
								<option value="02:00 am">02:00 am</option>
								<option value="03:00 am">03:00 am</option>
								<option value="04:00 am">04:00 am</option>
								<option value="05:00 am">05:00 am</option>
								<option value="06:00 am">06:00 am</option>
								<option value="07:00 am">07:00 am</option>
								<option value="08:00 am">08:00 am</option>
								<option value="09:00 am">09:00 am</option>
								<option value="10:00 am">10:00 am</option>
								<option value="11:00 am">11:00 am</option>
								<option value="12:00 pm">12:00 pm</option>
								<option value="01:00 pm">01:00 pm</option>
								<option value="02:00 pm">02:00 pm</option>
								<option value="03:00 pm">03:00 pm</option>
								<option value="04:00 pm">04:00 pm</option>
								<option value="05:00 pm">05:00 pm</option>
								<option value="06:00 pm">06:00 pm</option>
								<option value="07:00 pm">07:00 pm</option>
								<option value="08:00 pm">08:00 pm</option>
								<option value="09:00 pm">09:00 pm</option>
								<option value="10:00 pm">10:00 pm</option>
								<option value="11:00 pm">11:00 pm</option>
						</select>
						<label class="close">Close</label>
						<select class="form_ope close_select" name="listing_to_hour[]">
								<option value="Closed">Closed</option>
								<option value="Open 24 Hour">Open 24 Hour</option>
								<option value="12:00 am">12:00 am</option>
								<option value="01:00 am">01:00 am</option>
								<option value="02:00 am">02:00 am</option>
								<option value="03:00 am">03:00 am</option>
								<option value="04:00 am">04:00 am</option>
								<option value="05:00 am">05:00 am</option>
								<option value="06:00 am">06:00 am</option>
								<option value="07:00 am">07:00 am</option>
								<option value="08:00 am">08:00 am</option>
								<option value="09:00 am">09:00 am</option>
								<option value="10:00 am">10:00 am</option>
								<option value="11:00 am">11:00 am</option>
								<option value="12:00 pm">12:00 pm</option>
								<option value="01:00 pm">01:00 pm</option>
								<option value="02:00 pm">02:00 pm</option>
								<option value="03:00 pm">03:00 pm</option>
								<option value="04:00 pm">04:00 pm</option>
								<option value="05:00 pm">05:00 pm</option>
								<option value="06:00 pm">06:00 pm</option>
								<option value="07:00 pm">07:00 pm</option>
								<option value="08:00 pm">08:00 pm</option>
								<option value="09:00 pm">09:00 pm</option>
								<option value="10:00 pm">10:00 pm</option>
								<option value="11:00 pm">11:00 pm</option>
						</select>
						<label class="day">Thursday</label>
						<label class="open">Open</label>
						<select class="form_ope open_select" name="listing_from_hour[]">
								<option value="Closed">Closed</option>
								<option value="Open 24 Hour">Open 24 Hour</option>
								<option value="12:00 am">12:00 am</option>
								<option value="01:00 am">01:00 am</option>
								<option value="02:00 am">02:00 am</option>
								<option value="03:00 am">03:00 am</option>
								<option value="04:00 am">04:00 am</option>
								<option value="05:00 am">05:00 am</option>
								<option value="06:00 am">06:00 am</option>
								<option value="07:00 am">07:00 am</option>
								<option value="08:00 am">08:00 am</option>
								<option value="09:00 am">09:00 am</option>
								<option value="10:00 am">10:00 am</option>
								<option value="11:00 am">11:00 am</option>
								<option value="12:00 pm">12:00 pm</option>
								<option value="01:00 pm">01:00 pm</option>
								<option value="02:00 pm">02:00 pm</option>
								<option value="03:00 pm">03:00 pm</option>
								<option value="04:00 pm">04:00 pm</option>
								<option value="05:00 pm">05:00 pm</option>
								<option value="06:00 pm">06:00 pm</option>
								<option value="07:00 pm">07:00 pm</option>
								<option value="08:00 pm">08:00 pm</option>
								<option value="09:00 pm">09:00 pm</option>
								<option value="10:00 pm">10:00 pm</option>
								<option value="11:00 pm">11:00 pm</option>
						</select>
						<label class="close">Close</label>
						<select class="form_ope close_select" name="listing_to_hour[]">
								<option value="Closed">Closed</option>
								<option value="Open 24 Hour">Open 24 Hour</option>
								<option value="12:00 am">12:00 am</option>
								<option value="01:00 am">01:00 am</option>
								<option value="02:00 am">02:00 am</option>
								<option value="03:00 am">03:00 am</option>
								<option value="04:00 am">04:00 am</option>
								<option value="05:00 am">05:00 am</option>
								<option value="06:00 am">06:00 am</option>
								<option value="07:00 am">07:00 am</option>
								<option value="08:00 am">08:00 am</option>
								<option value="09:00 am">09:00 am</option>
								<option value="10:00 am">10:00 am</option>
								<option value="11:00 am">11:00 am</option>
								<option value="12:00 pm">12:00 pm</option>
								<option value="01:00 pm">01:00 pm</option>
								<option value="02:00 pm">02:00 pm</option>
								<option value="03:00 pm">03:00 pm</option>
								<option value="04:00 pm">04:00 pm</option>
								<option value="05:00 pm">05:00 pm</option>
								<option value="06:00 pm">06:00 pm</option>
								<option value="07:00 pm">07:00 pm</option>
								<option value="08:00 pm">08:00 pm</option>
								<option value="09:00 pm">09:00 pm</option>
								<option value="10:00 pm">10:00 pm</option>
								<option value="11:00 pm">11:00 pm</option>
						</select>
						<label class="day">Friday</label>
						<label class="open">Open</label>
						<select class="form_ope open_select" name="listing_from_hour[]">
								<option value="Closed">Closed</option>
								<option value="Open 24 Hour">Open 24 Hour</option>
								<option value="12:00 am">12:00 am</option>
								<option value="01:00 am">01:00 am</option>
								<option value="02:00 am">02:00 am</option>
								<option value="03:00 am">03:00 am</option>
								<option value="04:00 am">04:00 am</option>
								<option value="05:00 am">05:00 am</option>
								<option value="06:00 am">06:00 am</option>
								<option value="07:00 am">07:00 am</option>
								<option value="08:00 am">08:00 am</option>
								<option value="09:00 am">09:00 am</option>
								<option value="10:00 am">10:00 am</option>
								<option value="11:00 am">11:00 am</option>
								<option value="12:00 pm">12:00 pm</option>
								<option value="01:00 pm">01:00 pm</option>
								<option value="02:00 pm">02:00 pm</option>
								<option value="03:00 pm">03:00 pm</option>
								<option value="04:00 pm">04:00 pm</option>
								<option value="05:00 pm">05:00 pm</option>
								<option value="06:00 pm">06:00 pm</option>
								<option value="07:00 pm">07:00 pm</option>
								<option value="08:00 pm">08:00 pm</option>
								<option value="09:00 pm">09:00 pm</option>
								<option value="10:00 pm">10:00 pm</option>
								<option value="11:00 pm">11:00 pm</option>
						</select>
						<label class="close">Close</label>
						<select class="form_ope close_select" name="listing_to_hour[]">
								<option value="Closed">Closed</option>
								<option value="Open 24 Hour">Open 24 Hour</option>
								<option value="12:00 am">12:00 am</option>
								<option value="01:00 am">01:00 am</option>
								<option value="02:00 am">02:00 am</option>
								<option value="03:00 am">03:00 am</option>
								<option value="04:00 am">04:00 am</option>
								<option value="05:00 am">05:00 am</option>
								<option value="06:00 am">06:00 am</option>
								<option value="07:00 am">07:00 am</option>
								<option value="08:00 am">08:00 am</option>
								<option value="09:00 am">09:00 am</option>
								<option value="10:00 am">10:00 am</option>
								<option value="11:00 am">11:00 am</option>
								<option value="12:00 pm">12:00 pm</option>
								<option value="01:00 pm">01:00 pm</option>
								<option value="02:00 pm">02:00 pm</option>
								<option value="03:00 pm">03:00 pm</option>
								<option value="04:00 pm">04:00 pm</option>
								<option value="05:00 pm">05:00 pm</option>
								<option value="06:00 pm">06:00 pm</option>
								<option value="07:00 pm">07:00 pm</option>
								<option value="08:00 pm">08:00 pm</option>
								<option value="09:00 pm">09:00 pm</option>
								<option value="10:00 pm">10:00 pm</option>
								<option value="11:00 pm">11:00 pm</option>
						</select>
						<label class="day">Saturday</label>
						<label class="open">Open</label>
						<select class="form_ope open_select" name="listing_from_hour[]">
								<option value="Closed">Closed</option>
								<option value="Open 24 Hour">Open 24 Hour</option>
								<option value="12:00 am">12:00 am</option>
								<option value="01:00 am">01:00 am</option>
								<option value="02:00 am">02:00 am</option>
								<option value="03:00 am">03:00 am</option>
								<option value="04:00 am">04:00 am</option>
								<option value="05:00 am">05:00 am</option>
								<option value="06:00 am">06:00 am</option>
								<option value="07:00 am">07:00 am</option>
								<option value="08:00 am">08:00 am</option>
								<option value="09:00 am">09:00 am</option>
								<option value="10:00 am">10:00 am</option>
								<option value="11:00 am">11:00 am</option>
								<option value="12:00 pm">12:00 pm</option>
								<option value="01:00 pm">01:00 pm</option>
								<option value="02:00 pm">02:00 pm</option>
								<option value="03:00 pm">03:00 pm</option>
								<option value="04:00 pm">04:00 pm</option>
								<option value="05:00 pm">05:00 pm</option>
								<option value="06:00 pm">06:00 pm</option>
								<option value="07:00 pm">07:00 pm</option>
								<option value="08:00 pm">08:00 pm</option>
								<option value="09:00 pm">09:00 pm</option>
								<option value="10:00 pm">10:00 pm</option>
								<option value="11:00 pm">11:00 pm</option>
						</select>
						<label class="close">Close</label>
						<select class="form_ope close_select" name="listing_to_hour[]">
								<option value="Closed">Closed</option>
								<option value="Open 24 Hour">Open 24 Hour</option>
								<option value="12:00 am">12:00 am</option>
								<option value="01:00 am">01:00 am</option>
								<option value="02:00 am">02:00 am</option>
								<option value="03:00 am">03:00 am</option>
								<option value="04:00 am">04:00 am</option>
								<option value="05:00 am">05:00 am</option>
								<option value="06:00 am">06:00 am</option>
								<option value="07:00 am">07:00 am</option>
								<option value="08:00 am">08:00 am</option>
								<option value="09:00 am">09:00 am</option>
								<option value="10:00 am">10:00 am</option>
								<option value="11:00 am">11:00 am</option>
								<option value="12:00 pm">12:00 pm</option>
								<option value="01:00 pm">01:00 pm</option>
								<option value="02:00 pm">02:00 pm</option>
								<option value="03:00 pm">03:00 pm</option>
								<option value="04:00 pm">04:00 pm</option>
								<option value="05:00 pm">05:00 pm</option>
								<option value="06:00 pm">06:00 pm</option>
								<option value="07:00 pm">07:00 pm</option>
								<option value="08:00 pm">08:00 pm</option>
								<option value="09:00 pm">09:00 pm</option>
								<option value="10:00 pm">10:00 pm</option>
								<option value="11:00 pm">11:00 pm</option>
						</select>
						<label class="day">Sunday</label>
						<label class="open">Open</label>
						<select class="form_ope open_select" name="listing_from_hour[]">
								<option value="Closed">Closed</option>
								<option value="Open 24 Hour">Open 24 Hour</option>
								<option value="12:00 am">12:00 am</option>
								<option value="01:00 am">01:00 am</option>
								<option value="02:00 am">02:00 am</option>
								<option value="03:00 am">03:00 am</option>
								<option value="04:00 am">04:00 am</option>
								<option value="05:00 am">05:00 am</option>
								<option value="06:00 am">06:00 am</option>
								<option value="07:00 am">07:00 am</option>
								<option value="08:00 am">08:00 am</option>
								<option value="09:00 am">09:00 am</option>
								<option value="10:00 am">10:00 am</option>
								<option value="11:00 am">11:00 am</option>
								<option value="12:00 pm">12:00 pm</option>
								<option value="01:00 pm">01:00 pm</option>
								<option value="02:00 pm">02:00 pm</option>
								<option value="03:00 pm">03:00 pm</option>
								<option value="04:00 pm">04:00 pm</option>
								<option value="05:00 pm">05:00 pm</option>
								<option value="06:00 pm">06:00 pm</option>
								<option value="07:00 pm">07:00 pm</option>
								<option value="08:00 pm">08:00 pm</option>
								<option value="09:00 pm">09:00 pm</option>
								<option value="10:00 pm">10:00 pm</option>
								<option value="11:00 pm">11:00 pm</option>
						</select>
						<label class="close">Close</label>
						<select class="form_ope close_select" name="listing_to_hour[]">
								<option value="Closed">Closed</option>
								<option value="Open 24 Hour">Open 24 Hour</option>
								<option value="12:00 am">12:00 am</option>
								<option value="01:00 am">01:00 am</option>
								<option value="02:00 am">02:00 am</option>
								<option value="03:00 am">03:00 am</option>
								<option value="04:00 am">04:00 am</option>
								<option value="05:00 am">05:00 am</option>
								<option value="06:00 am">06:00 am</option>
								<option value="07:00 am">07:00 am</option>
								<option value="08:00 am">08:00 am</option>
								<option value="09:00 am">09:00 am</option>
								<option value="10:00 am">10:00 am</option>
								<option value="11:00 am">11:00 am</option>
								<option value="12:00 pm">12:00 pm</option>
								<option value="01:00 pm">01:00 pm</option>
								<option value="02:00 pm">02:00 pm</option>
								<option value="03:00 pm">03:00 pm</option>
								<option value="04:00 pm">04:00 pm</option>
								<option value="05:00 pm">05:00 pm</option>
								<option value="06:00 pm">06:00 pm</option>
								<option value="07:00 pm">07:00 pm</option>
								<option value="08:00 pm">08:00 pm</option>
								<option value="09:00 pm">09:00 pm</option>
								<option value="10:00 pm">10:00 pm</option>
								<option value="11:00 pm">11:00 pm</option>	
						</select>
					</div>
				</div>
				<label>Business Gallery Image #1</label>
				<input type="file" name="listing_image1">
				<label>Business Gallery Image #2</label>
				<input type="file" name="listing_image2">
				<label>Business Description</label>
				<textarea rows="5" cols="5" placeholder="Business Description" name="listing_description"></textarea>
				<label>Business Phone Number</label>
				<input type="text" placeholder="Business Phone" name="listing_contact">
				<label>Business Telephone Number</label>
				<input type="text" placeholder="Business Telephone Number" name="listing_telephone">
				<label>Business Media</label>
				<input type="text" placeholder="Business Video"  name="listing_video">
				<label>Business Social Media</label>
				<input type="text" placeholder="Business Website URL"  name="listing_website">
				<input type="submit"  name="submit">
			</form>

		';
	}
	elseif ($_GET['package'] == 'premium') 
	{
		$premium = mysqli_query($conn,"SELECT * FROM user_type WHERE id = '{$_SESSION['id']}'");
		$premium_row = mysqli_fetch_row($premium);

		if (isset($_POST['submit'])) 
		{
			$listing_name = $_POST['listing_name'];
			$listing_location = $_POST['listing_location'];
			$listing_email = $row['2'];
			$listing_member = $row['1'];
			$listing_category = $_POST['listing_category'];
			$listing_tagline = $_POST['listing_tagline'];
			$listing_city = $_POST['listing_city'];
			$listing_description = $_POST['listing_description'];
			$listing_contact = $_POST['listing_contact'];
			$listing_video = $_POST['listing_video'];
			$listing_website = $_POST['listing_website'];
			$listing_facebook = $_POST['listing_facebook'];
			$listing_instagram = $_POST['listing_instagram'];
			$listing_telephone = $_POST['listing_telephone'];
			$listing_date = date("Y/m/d");

			// listing from hours insertion
			$listing_from_hour = $_POST['listing_from_hour'];
			$listing_from_hour_arr = array();

			foreach ($listing_from_hour as $d)
			{
	    		$listing_from_hour_arr[] = $d;
			}
			$listing_from_hour_serialize = serialize($listing_from_hour_arr);

			// listing to hours insertion
			$listing_to_hour = $_POST['listing_to_hour'];
			$listing_to_hour_arr = array();

			foreach ($listing_to_hour as $e)
			{
	    		$listing_to_hour_arr[] = $e;
			}
			$listing_to_hour_serialize = serialize($listing_to_hour_arr);

			/*  Image upload 1*/
			$tmp_name1 = $_FILES['listing_image1']['tmp_name'];
			$listing_imgpath1 = "listed images/";
			$Filename1 = $_FILES['listing_image1']['name'];
			$Filename1 = rand(10, 1000).'-'.$Filename1;
			
			$new_filename1 = $listing_imgpath1.$Filename1;

			/*  Image upload 2*/
			$tmp_name2 = $_FILES['listing_image2']['tmp_name'];
			$listing_imgpath2 = "listed images/";
			$Filename2 = $_FILES['listing_image2']['name'];
			$Filename2 = rand(10, 1000).'-'.$Filename2;
			
			$new_filename2 = $listing_imgpath2.$Filename2;

			/*  Image upload 3*/
			$tmp_name3 = $_FILES['listing_image3']['tmp_name'];
			$listing_imgpath3 = "listed images/";
			$Filename3=$_FILES['listing_image3']['name'];
			$Filename3 = rand(10, 1000).'-'.$Filename3;
			
			$new_filename3 = $listing_imgpath3.$Filename3;

			if(move_uploaded_file($_FILES['listing_image1']['tmp_name'], $new_filename1) AND move_uploaded_file($_FILES['listing_image2']['tmp_name'], $new_filename2) AND move_uploaded_file($_FILES['listing_image3']['tmp_name'], $new_filename3))
			{
				$insert_q = "INSERT INTO listing (listing_name,listing_location,listing_email,listing_member_name,listing_category,listing_tagline,listing_city,listing_description,listing_contact,listing_date,type,payment,listing_image1,listing_image2,listing_image3,listing_hour_open,listing_hour_close,listing_video_url,listing_website_url,listing_facebook_url,listing_instagram_url,listing_telephone) VALUES ('$listing_name','$listing_location','$listing_email','{$premium_row['1']}','$listing_category','$listing_tagline','$listing_city','$listing_description','$listing_contact','$listing_date','premium','pending','$Filename1','$Filename2','$Filename3','$listing_from_hour_serialize','$listing_to_hour_serialize','$listing_video','$listing_website','$listing_facebook','$listing_instagram','$listing_telephone')";

				$insert = mysqli_query($conn, $insert_q);
				$update = mysqli_query($conn,"UPDATE user_type SET type = 'premium' WHERE id='". $_SESSION['id']."' ");
				if ($insert==TRUE)
				{	
					header('location:payment.php');
				}
			} 
			else
			{
				echo"<script>alert('Something is incorrect please try again')</script>";
			}
		}


			echo '

			<form method="POST" class="listing_form" enctype="multipart/form-data">
				<h3>ADD YOUR LISTING WITH GET LISTING</h3>
				<label>Business Name</label>
				<input type="text" placeholder="Business Name" name="listing_name">
				<label>Business Location</label>
				<input type="text" placeholder="Business Location" name="listing_location">
				<label>Business Email</label>
				<input type="text" value='.$row[2].' name="listing_email" readonly>
				<label>Business Categories</label>
				<select class="city_cate_tag" name="listing_category">
						<option value="Hospital">Hospital</option>
						<option value="Restourant">Restourant</option>
						<option value="Manufacturing">Manufacturing</option>
						<option value="Hotel Room">Hotel Room</option>
						<option value="School">School</option>
						<option value="College">College</option>
						<option value="Tour And tranvels">Tour And tranvels</option>
				</select>
				<label>Business Tagline</label>
				<input type="text" placeholder="Business Tagline" name="listing_tagline">
				<label>Business City</label>
				<select class="city_cate_tag" name="listing_city">
						<option value="Delhi">Delhi</option>
						<option value="Surat">Surat</option>
						<option value="Ahemdabad">Ahemdabad</option>
						<option value="Mumbai">Mumbai</option>
						<option value="Baroda">Baroda</option>
						<option value="Pune">Pune</option>
						<option value="Punjab">Punjab</option>
						<option value="Hydrabad">Hydrabad</option>
						<option value="Mysoure">Mysoure</option>
						<option value="Bangaluru">Bangaluru</option>
						<option value="Karnatak">Karnatak</option>
				</select>
				<label>Business Operation</label>
				<div class="form_op">
						<label class="day">Monday</label>
						<label class="open">Open</label>
						<select class="form_ope open_select" name="listing_from_hour[]">
								<option value="Closed">Closed</option>
								<option value="Open 24 Hour">Open 24 Hour</option>
								<option value="12:00 am">12:00 am</option>
								<option value="01:00 am">01:00 am</option>
								<option value="02:00 am">02:00 am</option>
								<option value="03:00 am">03:00 am</option>
								<option value="04:00 am">04:00 am</option>
								<option value="05:00 am">05:00 am</option>
								<option value="06:00 am">06:00 am</option>
								<option value="07:00 am">07:00 am</option>
								<option value="08:00 am">08:00 am</option>
								<option value="09:00 am">09:00 am</option>
								<option value="10:00 am">10:00 am</option>
								<option value="11:00 am">11:00 am</option>
								<option value="12:00 pm">12:00 pm</option>
								<option value="01:00 pm">01:00 pm</option>
								<option value="02:00 pm">02:00 pm</option>
								<option value="03:00 pm">03:00 pm</option>
								<option value="04:00 pm">04:00 pm</option>
								<option value="05:00 pm">05:00 pm</option>
								<option value="06:00 pm">06:00 pm</option>
								<option value="07:00 pm">07:00 pm</option>
								<option value="08:00 pm">08:00 pm</option>
								<option value="09:00 pm">09:00 pm</option>
								<option value="10:00 pm">10:00 pm</option>
								<option value="11:00 pm">11:00 pm</option>
						</select>
						<label class="close">Close</label>
						<select class="form_ope close_select" name="listing_to_hour[]">
								<option value="Closed">Closed</option>
								<option value="Open 24 Hour">Open 24 Hour</option>
								<option value="12:00 am">12:00 am</option>
								<option value="01:00 am">01:00 am</option>
								<option value="02:00 am">02:00 am</option>
								<option value="03:00 am">03:00 am</option>
								<option value="04:00 am">04:00 am</option>
								<option value="05:00 am">05:00 am</option>
								<option value="06:00 am">06:00 am</option>
								<option value="07:00 am">07:00 am</option>
								<option value="08:00 am">08:00 am</option>
								<option value="09:00 am">09:00 am</option>
								<option value="10:00 am">10:00 am</option>
								<option value="11:00 am">11:00 am</option>
								<option value="12:00 pm">12:00 pm</option>
								<option value="01:00 pm">01:00 pm</option>
								<option value="02:00 pm">02:00 pm</option>
								<option value="03:00 pm">03:00 pm</option>
								<option value="04:00 pm">04:00 pm</option>
								<option value="05:00 pm">05:00 pm</option>
								<option value="06:00 pm">06:00 pm</option>
								<option value="07:00 pm">07:00 pm</option>
								<option value="08:00 pm">08:00 pm</option>
								<option value="09:00 pm">09:00 pm</option>
								<option value="10:00 pm">10:00 pm</option>
								<option value="11:00 pm">11:00 pm</option>
						</select>
						<label class="day">Tuesday</label>
						<label class="open">Open</label>
						<select class="form_ope open_select" name="listing_from_hour[]">
								<option value="Closed">Closed</option>
								<option value="Open 24 Hour">Open 24 Hour</option>
								<option value="12:00 am">12:00 am</option>
								<option value="01:00 am">01:00 am</option>
								<option value="02:00 am">02:00 am</option>
								<option value="03:00 am">03:00 am</option>
								<option value="04:00 am">04:00 am</option>
								<option value="05:00 am">05:00 am</option>
								<option value="06:00 am">06:00 am</option>
								<option value="07:00 am">07:00 am</option>
								<option value="08:00 am">08:00 am</option>
								<option value="09:00 am">09:00 am</option>
								<option value="10:00 am">10:00 am</option>
								<option value="11:00 am">11:00 am</option>
								<option value="12:00 pm">12:00 pm</option>
								<option value="01:00 pm">01:00 pm</option>
								<option value="02:00 pm">02:00 pm</option>
								<option value="03:00 pm">03:00 pm</option>
								<option value="04:00 pm">04:00 pm</option>
								<option value="05:00 pm">05:00 pm</option>
								<option value="06:00 pm">06:00 pm</option>
								<option value="07:00 pm">07:00 pm</option>
								<option value="08:00 pm">08:00 pm</option>
								<option value="09:00 pm">09:00 pm</option>
								<option value="10:00 pm">10:00 pm</option>
								<option value="11:00 pm">11:00 pm</option>
						</select>
						<label class="close">Close</label>
						<select class="form_ope close_select" name="listing_to_hour[]">
								<option value="Closed">Closed</option>
								<option value="Open 24 Hour">Open 24 Hour</option>
								<option value="12:00 am">12:00 am</option>
								<option value="01:00 am">01:00 am</option>
								<option value="02:00 am">02:00 am</option>
								<option value="03:00 am">03:00 am</option>
								<option value="04:00 am">04:00 am</option>
								<option value="05:00 am">05:00 am</option>
								<option value="06:00 am">06:00 am</option>
								<option value="07:00 am">07:00 am</option>
								<option value="08:00 am">08:00 am</option>
								<option value="09:00 am">09:00 am</option>
								<option value="10:00 am">10:00 am</option>
								<option value="11:00 am">11:00 am</option>
								<option value="12:00 pm">12:00 pm</option>
								<option value="01:00 pm">01:00 pm</option>
								<option value="02:00 pm">02:00 pm</option>
								<option value="03:00 pm">03:00 pm</option>
								<option value="04:00 pm">04:00 pm</option>
								<option value="05:00 pm">05:00 pm</option>
								<option value="06:00 pm">06:00 pm</option>
								<option value="07:00 pm">07:00 pm</option>
								<option value="08:00 pm">08:00 pm</option>
								<option value="09:00 pm">09:00 pm</option>
								<option value="10:00 pm">10:00 pm</option>
								<option value="11:00 pm">11:00 pm</option>
						</select>
						<label class="day">Wednesday</label>
						<label class="open">Open</label>
						<select class="form_ope open_select" name="listing_from_hour[]">
								<option value="Closed">Closed</option>
								<option value="Open 24 Hour">Open 24 Hour</option>
								<option value="12:00 am">12:00 am</option>
								<option value="01:00 am">01:00 am</option>
								<option value="02:00 am">02:00 am</option>
								<option value="03:00 am">03:00 am</option>
								<option value="04:00 am">04:00 am</option>
								<option value="05:00 am">05:00 am</option>
								<option value="06:00 am">06:00 am</option>
								<option value="07:00 am">07:00 am</option>
								<option value="08:00 am">08:00 am</option>
								<option value="09:00 am">09:00 am</option>
								<option value="10:00 am">10:00 am</option>
								<option value="11:00 am">11:00 am</option>
								<option value="12:00 pm">12:00 pm</option>
								<option value="01:00 pm">01:00 pm</option>
								<option value="02:00 pm">02:00 pm</option>
								<option value="03:00 pm">03:00 pm</option>
								<option value="04:00 pm">04:00 pm</option>
								<option value="05:00 pm">05:00 pm</option>
								<option value="06:00 pm">06:00 pm</option>
								<option value="07:00 pm">07:00 pm</option>
								<option value="08:00 pm">08:00 pm</option>
								<option value="09:00 pm">09:00 pm</option>
								<option value="10:00 pm">10:00 pm</option>
								<option value="11:00 pm">11:00 pm</option>
						</select>
						<label class="close">Close</label>
						<select class="form_ope close_select" name="listing_to_hour[]">
								<option value="Closed">Closed</option>
								<option value="Open 24 Hour">Open 24 Hour</option>
								<option value="12:00 am">12:00 am</option>
								<option value="01:00 am">01:00 am</option>
								<option value="02:00 am">02:00 am</option>
								<option value="03:00 am">03:00 am</option>
								<option value="04:00 am">04:00 am</option>
								<option value="05:00 am">05:00 am</option>
								<option value="06:00 am">06:00 am</option>
								<option value="07:00 am">07:00 am</option>
								<option value="08:00 am">08:00 am</option>
								<option value="09:00 am">09:00 am</option>
								<option value="10:00 am">10:00 am</option>
								<option value="11:00 am">11:00 am</option>
								<option value="12:00 pm">12:00 pm</option>
								<option value="01:00 pm">01:00 pm</option>
								<option value="02:00 pm">02:00 pm</option>
								<option value="03:00 pm">03:00 pm</option>
								<option value="04:00 pm">04:00 pm</option>
								<option value="05:00 pm">05:00 pm</option>
								<option value="06:00 pm">06:00 pm</option>
								<option value="07:00 pm">07:00 pm</option>
								<option value="08:00 pm">08:00 pm</option>
								<option value="09:00 pm">09:00 pm</option>
								<option value="10:00 pm">10:00 pm</option>
								<option value="11:00 pm">11:00 pm</option>
						</select>
						<label class="day">Thursday</label>
						<label class="open">Open</label>
						<select class="form_ope open_select" name="listing_from_hour[]">
								<option value="Closed">Closed</option>
								<option value="Open 24 Hour">Open 24 Hour</option>
								<option value="12:00 am">12:00 am</option>
								<option value="01:00 am">01:00 am</option>
								<option value="02:00 am">02:00 am</option>
								<option value="03:00 am">03:00 am</option>
								<option value="04:00 am">04:00 am</option>
								<option value="05:00 am">05:00 am</option>
								<option value="06:00 am">06:00 am</option>
								<option value="07:00 am">07:00 am</option>
								<option value="08:00 am">08:00 am</option>
								<option value="09:00 am">09:00 am</option>
								<option value="10:00 am">10:00 am</option>
								<option value="11:00 am">11:00 am</option>
								<option value="12:00 pm">12:00 pm</option>
								<option value="01:00 pm">01:00 pm</option>
								<option value="02:00 pm">02:00 pm</option>
								<option value="03:00 pm">03:00 pm</option>
								<option value="04:00 pm">04:00 pm</option>
								<option value="05:00 pm">05:00 pm</option>
								<option value="06:00 pm">06:00 pm</option>
								<option value="07:00 pm">07:00 pm</option>
								<option value="08:00 pm">08:00 pm</option>
								<option value="09:00 pm">09:00 pm</option>
								<option value="10:00 pm">10:00 pm</option>
								<option value="11:00 pm">11:00 pm</option>
						</select>
						<label class="close">Close</label>
						<select class="form_ope close_select" name="listing_to_hour[]">
								<option value="Closed">Closed</option>
								<option value="Open 24 Hour">Open 24 Hour</option>
								<option value="12:00 am">12:00 am</option>
								<option value="01:00 am">01:00 am</option>
								<option value="02:00 am">02:00 am</option>
								<option value="03:00 am">03:00 am</option>
								<option value="04:00 am">04:00 am</option>
								<option value="05:00 am">05:00 am</option>
								<option value="06:00 am">06:00 am</option>
								<option value="07:00 am">07:00 am</option>
								<option value="08:00 am">08:00 am</option>
								<option value="09:00 am">09:00 am</option>
								<option value="10:00 am">10:00 am</option>
								<option value="11:00 am">11:00 am</option>
								<option value="12:00 pm">12:00 pm</option>
								<option value="01:00 pm">01:00 pm</option>
								<option value="02:00 pm">02:00 pm</option>
								<option value="03:00 pm">03:00 pm</option>
								<option value="04:00 pm">04:00 pm</option>
								<option value="05:00 pm">05:00 pm</option>
								<option value="06:00 pm">06:00 pm</option>
								<option value="07:00 pm">07:00 pm</option>
								<option value="08:00 pm">08:00 pm</option>
								<option value="09:00 pm">09:00 pm</option>
								<option value="10:00 pm">10:00 pm</option>
								<option value="11:00 pm">11:00 pm</option>
						</select>
						<label class="day">Friday</label>
						<label class="open">Open</label>
						<select class="form_ope open_select" name="listing_from_hour[]">
								<option value="Closed">Closed</option>
								<option value="Open 24 Hour">Open 24 Hour</option>
								<option value="12:00 am">12:00 am</option>
								<option value="01:00 am">01:00 am</option>
								<option value="02:00 am">02:00 am</option>
								<option value="03:00 am">03:00 am</option>
								<option value="04:00 am">04:00 am</option>
								<option value="05:00 am">05:00 am</option>
								<option value="06:00 am">06:00 am</option>
								<option value="07:00 am">07:00 am</option>
								<option value="08:00 am">08:00 am</option>
								<option value="09:00 am">09:00 am</option>
								<option value="10:00 am">10:00 am</option>
								<option value="11:00 am">11:00 am</option>
								<option value="12:00 pm">12:00 pm</option>
								<option value="01:00 pm">01:00 pm</option>
								<option value="02:00 pm">02:00 pm</option>
								<option value="03:00 pm">03:00 pm</option>
								<option value="04:00 pm">04:00 pm</option>
								<option value="05:00 pm">05:00 pm</option>
								<option value="06:00 pm">06:00 pm</option>
								<option value="07:00 pm">07:00 pm</option>
								<option value="08:00 pm">08:00 pm</option>
								<option value="09:00 pm">09:00 pm</option>
								<option value="10:00 pm">10:00 pm</option>
								<option value="11:00 pm">11:00 pm</option>
						</select>
						<label class="close">Close</label>
						<select class="form_ope close_select" name="listing_to_hour[]">
								<option value="Closed">Closed</option>
								<option value="Open 24 Hour">Open 24 Hour</option>
								<option value="12:00 am">12:00 am</option>
								<option value="01:00 am">01:00 am</option>
								<option value="02:00 am">02:00 am</option>
								<option value="03:00 am">03:00 am</option>
								<option value="04:00 am">04:00 am</option>
								<option value="05:00 am">05:00 am</option>
								<option value="06:00 am">06:00 am</option>
								<option value="07:00 am">07:00 am</option>
								<option value="08:00 am">08:00 am</option>
								<option value="09:00 am">09:00 am</option>
								<option value="10:00 am">10:00 am</option>
								<option value="11:00 am">11:00 am</option>
								<option value="12:00 pm">12:00 pm</option>
								<option value="01:00 pm">01:00 pm</option>
								<option value="02:00 pm">02:00 pm</option>
								<option value="03:00 pm">03:00 pm</option>
								<option value="04:00 pm">04:00 pm</option>
								<option value="05:00 pm">05:00 pm</option>
								<option value="06:00 pm">06:00 pm</option>
								<option value="07:00 pm">07:00 pm</option>
								<option value="08:00 pm">08:00 pm</option>
								<option value="09:00 pm">09:00 pm</option>
								<option value="10:00 pm">10:00 pm</option>
								<option value="11:00 pm">11:00 pm</option>
						</select>
						<label class="day">Saturday</label>
						<label class="open">Open</label>
						<select class="form_ope open_select" name="listing_from_hour[]">
								<option value="Closed">Closed</option>
								<option value="Open 24 Hour">Open 24 Hour</option>
								<option value="12:00 am">12:00 am</option>
								<option value="01:00 am">01:00 am</option>
								<option value="02:00 am">02:00 am</option>
								<option value="03:00 am">03:00 am</option>
								<option value="04:00 am">04:00 am</option>
								<option value="05:00 am">05:00 am</option>
								<option value="06:00 am">06:00 am</option>
								<option value="07:00 am">07:00 am</option>
								<option value="08:00 am">08:00 am</option>
								<option value="09:00 am">09:00 am</option>
								<option value="10:00 am">10:00 am</option>
								<option value="11:00 am">11:00 am</option>
								<option value="12:00 pm">12:00 pm</option>
								<option value="01:00 pm">01:00 pm</option>
								<option value="02:00 pm">02:00 pm</option>
								<option value="03:00 pm">03:00 pm</option>
								<option value="04:00 pm">04:00 pm</option>
								<option value="05:00 pm">05:00 pm</option>
								<option value="06:00 pm">06:00 pm</option>
								<option value="07:00 pm">07:00 pm</option>
								<option value="08:00 pm">08:00 pm</option>
								<option value="09:00 pm">09:00 pm</option>
								<option value="10:00 pm">10:00 pm</option>
								<option value="11:00 pm">11:00 pm</option>
						</select>
						<label class="close">Close</label>
						<select class="form_ope close_select" name="listing_to_hour[]">
								<option value="Closed">Closed</option>
								<option value="Open 24 Hour">Open 24 Hour</option>
								<option value="12:00 am">12:00 am</option>
								<option value="01:00 am">01:00 am</option>
								<option value="02:00 am">02:00 am</option>
								<option value="03:00 am">03:00 am</option>
								<option value="04:00 am">04:00 am</option>
								<option value="05:00 am">05:00 am</option>
								<option value="06:00 am">06:00 am</option>
								<option value="07:00 am">07:00 am</option>
								<option value="08:00 am">08:00 am</option>
								<option value="09:00 am">09:00 am</option>
								<option value="10:00 am">10:00 am</option>
								<option value="11:00 am">11:00 am</option>
								<option value="12:00 pm">12:00 pm</option>
								<option value="01:00 pm">01:00 pm</option>
								<option value="02:00 pm">02:00 pm</option>
								<option value="03:00 pm">03:00 pm</option>
								<option value="04:00 pm">04:00 pm</option>
								<option value="05:00 pm">05:00 pm</option>
								<option value="06:00 pm">06:00 pm</option>
								<option value="07:00 pm">07:00 pm</option>
								<option value="08:00 pm">08:00 pm</option>
								<option value="09:00 pm">09:00 pm</option>
								<option value="10:00 pm">10:00 pm</option>
								<option value="11:00 pm">11:00 pm</option>
						</select>
						<label class="day">Sunday</label>
						<label class="open">Open</label>
						<select class="form_ope open_select" name="listing_from_hour[]">
								<option value="Closed">Closed</option>
								<option value="Open 24 Hour">Open 24 Hour</option>
								<option value="12:00 am">12:00 am</option>
								<option value="01:00 am">01:00 am</option>
								<option value="02:00 am">02:00 am</option>
								<option value="03:00 am">03:00 am</option>
								<option value="04:00 am">04:00 am</option>
								<option value="05:00 am">05:00 am</option>
								<option value="06:00 am">06:00 am</option>
								<option value="07:00 am">07:00 am</option>
								<option value="08:00 am">08:00 am</option>
								<option value="09:00 am">09:00 am</option>
								<option value="10:00 am">10:00 am</option>
								<option value="11:00 am">11:00 am</option>
								<option value="12:00 pm">12:00 pm</option>
								<option value="01:00 pm">01:00 pm</option>
								<option value="02:00 pm">02:00 pm</option>
								<option value="03:00 pm">03:00 pm</option>
								<option value="04:00 pm">04:00 pm</option>
								<option value="05:00 pm">05:00 pm</option>
								<option value="06:00 pm">06:00 pm</option>
								<option value="07:00 pm">07:00 pm</option>
								<option value="08:00 pm">08:00 pm</option>
								<option value="09:00 pm">09:00 pm</option>
								<option value="10:00 pm">10:00 pm</option>
								<option value="11:00 pm">11:00 pm</option>
						</select>
						<label class="close">Close</label>
						<select class="form_ope close_select" name="listing_to_hour[]">
								<option value="Closed">Closed</option>
								<option value="Open 24 Hour">Open 24 Hour</option>
								<option value="12:00 am">12:00 am</option>
								<option value="01:00 am">01:00 am</option>
								<option value="02:00 am">02:00 am</option>
								<option value="03:00 am">03:00 am</option>
								<option value="04:00 am">04:00 am</option>
								<option value="05:00 am">05:00 am</option>
								<option value="06:00 am">06:00 am</option>
								<option value="07:00 am">07:00 am</option>
								<option value="08:00 am">08:00 am</option>
								<option value="09:00 am">09:00 am</option>
								<option value="10:00 am">10:00 am</option>
								<option value="11:00 am">11:00 am</option>
								<option value="12:00 pm">12:00 pm</option>
								<option value="01:00 pm">01:00 pm</option>
								<option value="02:00 pm">02:00 pm</option>
								<option value="03:00 pm">03:00 pm</option>
								<option value="04:00 pm">04:00 pm</option>
								<option value="05:00 pm">05:00 pm</option>
								<option value="06:00 pm">06:00 pm</option>
								<option value="07:00 pm">07:00 pm</option>
								<option value="08:00 pm">08:00 pm</option>
								<option value="09:00 pm">09:00 pm</option>
								<option value="10:00 pm">10:00 pm</option>
								<option value="11:00 pm">11:00 pm</option>	
						</select>
					</div>
				</div>
				<label>Business Gallery Image #1</label>
				<input type="file" name="listing_image1">
				<label>Business Gallery Image #2</label>
				<input type="file" name="listing_image2">
				<label>Business Gallery Image #3</label>
				<input type="file" name="listing_image3">
				<label>Business Description</label>
				<textarea rows="5" cols="5" placeholder="Business Description" name="listing_description"></textarea>
				<label>Business Phone Number</label>
				<input type="text" placeholder="Business Phone" name="listing_contact">
				<label>Business Telephone Number</label>
				<input type="text" placeholder="Business Telephone Number" name="listing_telephone">
				<label>Business Media</label>
				<input type="text" placeholder="Business Video" name="listing_video">
				<label>Business Social Media #1</label>
				<input type="text" placeholder="Business Website URL" name="listing_website">
				<label>Business Social Media #2</label>
				<input type="text" placeholder="Business Facebook URL" name="listing_facebook">
				<label>Business Social Media #3</label>
				<input type="text" placeholder="Business Instagram URL" name="listing_instagram">
				<input type="submit" name="submit">
			</form>

		';
	}

?>


<?php include('footer.php'); ?>