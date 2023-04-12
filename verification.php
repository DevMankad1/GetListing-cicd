<!-- Header Include -->
<?php include('header.php'); ?>

<!-- Verification code -->
<?php  

	if (isset($_POST['submit'])) 
    {
         $contact = $_POST['contact'];
         $verify_code = $_POST['verify_code'];

         if ($contact !=  " " && $verify_code !=  " ") 
         {
           $query =  "SELECT id FROM user_type WHERE contact='$contact' && verify_code='$verify_code' ";
           $result = mysqli_query($conn,$query);
           if (mysqli_num_rows($result)>0) 
            {
                $row = mysqli_fetch_row($result);
                $user_id = $row[0];

                $update_status = mysqli_query($conn,"UPDATE user_type SET status='1' where id='$user_id' ");
                header('location:login.php');
                
            }
            else
            {
              echo "<script>alert('Entered code is invalid')</script>";
            }  
         }
         else
         {
          echo "<script>alert('Please enter field')</script>";
         } 

      }

?>
<form class="authen_form" method="POST">
	<h2>Verify Yourself Into Get Listing</h2>
	<input type="text" placeholder="Phone Number" name="contact">
	<input type="text" placeholder="Verification Code" name="verify_code">
	<input type="submit" value="Verify" name="submit">
	<label class="note">Note : Complete your verification before login</label>
</form>

<?php include('footer.php'); ?>