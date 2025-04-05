<?php
session_start();
include('../includes/connection.php');

if(isset($_POST['reset_password'])) {
    // Retrieve email from session
    $email = $_SESSION['reset_email'];

    // Retrieve new password from form
    $new_password = mysqli_real_escape_string($connection, $_POST['new_password']);

    // Hash the new password
    $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

    // Update the password
    $update_query = "UPDATE admins SET password = '$hashed_password' WHERE email = '$email'";
    $update_query_run = mysqli_query($connection, $update_query);

    if($update_query_run) {
        // Password updated successfully
        echo "<script>alert('Password reset successfully...'); window.location.href = 'admin_login.php';</script>";
        exit();
    } else {
        // Error updating password
        echo "<script>alert('Error resetting password. Please try again later.'); window.location.href = 'admin_reset_password.php';</script>";
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Admin Reset Password</title>
   <!-- jquery files -->
   <script src="../includes/jquery-3.7.1.min.js"></script>
   <!-- bootstrap files -->
   <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
   <script src="../bootstrap/js/bootstrap.min.js"></script>
   <!-- external css -->
   <link rel="stylesheet" href="../style.css">
</head>
<body>
   <div class="row">
      <div class="col-md-3 m-auto mt-5" style="background-color:#81CACF;">
         <center><h3 style="background-color:#5a8F7B; padding:5px; width:15vw;" class="my-2">Admin Reset Password</h3></center>
         <form action="" method="post">
            <div class="form-group">
               <input type="password" name="new_password" class="form-control my-2" placeholder="Enter New Password" required>
            </div>
            <div class="form-group">
               <center>
                  <input type="submit" name="reset_password" value="Reset Password" class="btn btn-warning mb-2">
               </center>
            </div><br>
         </form>
      </div>
   </div>
</body>
</html>
