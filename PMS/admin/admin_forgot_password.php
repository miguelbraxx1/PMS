<?php
session_start();
include('../includes/connection.php');

if(isset($_POST['submit'])) {
    $email = mysqli_real_escape_string($connection, $_POST['email']);

    // Check if the email exists in the database
    $query = "SELECT * FROM admins WHERE email = '$email'";
    $query_run = mysqli_query($connection, $query);

    if(mysqli_num_rows($query_run) > 0) {
        // Generate a unique token and store it in the session
        $_SESSION['reset_email'] = $email;
        $token = bin2hex(random_bytes(32));
        $_SESSION['reset_token'] = $token;

        // Redirect to reset password page
        header("Location: admin_reset_password.php");
        exit();
    } else {
        echo "<script type='text/javascript'>
              alert('Email not found');
              window.location.href = 'admin_forgot_password.php';
              </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <!-- jquery files -->
   <script src="../includes/jquery-3.7.1.min.js"></script>
   <!-- bootstrap files -->
   <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
   <script src=../bootstrap/js/bootstrap.min.js"></script>
   <!-- external css -->
   <link rel="stylesheet" href="../style.css">
   <title>Admin Forgot Password</title>
   
</head>
<body>
   <div class="row">
      <div class="col-md-3 m-auto mt-5" style="background-color:#81CACF;">
         <center><h3 style="background-color:#5a8F7B; padding:5px; width:15vw;" class="my-2">Admin Forgot Password</h3></center>
         <form action="" method="post">
            <div class="form-group">
               <input type="email" name="email" class="form-control my-2" placeholder="Enter Email" autocomplete="off" required>
            </div>
            <div class="form-group">
               <center>
                  <input type="submit" name="submit" value="Submit" class="btn btn-warning mb-2">
               </center>
            </div><br>
         </form>
      </div>
   </div>
</body>
</html>
