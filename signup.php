<!-- Header Include -->
<?php include('header.php'); ?>

<!-- Sign code -->
<?php

 	if (isset($_POST['submit']))
 	{
 		$name = $_POST['name'];
 		$email = $_POST['email'];
		$contact = $_POST['contact'];
    $password = $_POST['password'];
		$confirm_password = $_POST['confirm_password'];
		$verify_code = mt_rand(100000, 999999);

    	if ($password == $confirm_password) 
    	{
      		$query = mysqli_query($conn,"INSERT INTO user_type (name,email,contact,password,verify_code) VALUES ('$name','$email','$contact','$password','$verify_code')");
    	}
    	else
    	{
      		echo "<script>alert('PassWord Not Matched , Please Try Again')</script>";
    	}
		
		
		if ($query == TRUE)
		{
  			
    			    /* SMS sending code */
              $curl = curl_init();

              curl_setopt_array($curl, array(
              CURLOPT_URL => "http://2factor.in/API/V1/ee71c342-71e0-11eb-a9bc-0200cd936042/SMS/".$contact."/".$verify_code."",
              CURLOPT_RETURNTRANSFER => true,
              CURLOPT_ENCODING => "",
              CURLOPT_MAXREDIRS => 10,
              CURLOPT_TIMEOUT => 30,
              CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
              CURLOPT_CUSTOMREQUEST => "GET",
              CURLOPT_POSTFIELDS => "",
              CURLOPT_HTTPHEADER => array(
                "content-type: application/x-www-form-urlencoded"
              ),
            ));

            $response = curl_exec($curl);
            $err = curl_error($curl);

            curl_close($curl);

            if ($err) {
              echo "cURL Error #:" . $err;
            } else {
              echo $response;
            }
            header('location:verification.php');
    		}
    		else
    		{
        		echo "<script>alert('Some error please try again')</script>";
    		}
	}
 ?>
<form class="authen_form" method="POST">
	<h2>Join The Get Listing</h2>
	<input type="text" placeholder="Name" name="name">
	<input type="email" placeholder="Email" name="email">
	<input type="text" placeholder="Phone Number" name="contact">
	<input type="password" placeholder="Password" name="password">
	<input type="password" placeholder="Confirm Password" name="confirm_password">
	<input type="submit" value="Join" name="submit">
	<a href="login.php">Already Join</a>
</form>

<?php include('footer.php'); ?>