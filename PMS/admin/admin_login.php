<?php
session_start();
include('../includes/connection.php');

if(isset($_POST['adminLogin'])) {
   $email = mysqli_real_escape_string($connection, $_POST['email']);
   $password = mysqli_real_escape_string($connection, $_POST['password']);

   // Hash the password before comparing
   $hashed_password = password_hash($password, PASSWORD_DEFAULT);

   $query = "SELECT name, email, password, id FROM admins WHERE email = '$email'";
   $query_run = mysqli_query($connection, $query);

   if(mysqli_num_rows($query_run) > 0) {
      $row = mysqli_fetch_assoc($query_run);

      // Verify password
      if(password_verify($password, $row['password'])) {
         $_SESSION['email'] = $row['email'];
         $_SESSION['name'] = $row['name'];
         header("Location: admin_dashboard.php");
         exit();
      } else {
         echo "<script type='text/javascript'>
               alert('Incorrect password');
               window.location.href = 'admin_login.php';
               </script>";
      }
   } else {
      echo "<script type='text/javascript'>
            alert('Email not found');
            window.location.href = 'admin_login.php';
            </script>";
   }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Admin Login</title>
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
      <div class="col-md-3 m-auto mt-5"  style="background-color:#81CACF;">
         <center><h3 style="background-color:#5a8F7B; padding:5px; width:15vw;" class="my-2">Admin Login</h3></center>
         <form action="" method="post" >
         <div class="form-group">
            <input type="email" name="email" class="form-control my-2" placeholder="Enter Email" autocomplete="off" required>
         </div>
         <div class="form-group">
            <input type="Password" name="password" class="form-control my-2" placeholder="Enter Password" required>
         </div>
         <div class="form-group">
           <center> <input type="submit" name="adminLogin" value="Login" class=" btn btn-warning mb-2">
           </center>
           <center>
                  <a style="text-decoration: none; font-size:16px; font-weight:400px; color:#072d94; " href="../admin/admin_forgot_password.php">Forgot Password?</a>
               </center>
         </div><br>
         </form>
      </div> 
      <center> <a href="../index.php" class="btn btn-danger mt-3">Go to Home</a></center>
   </div>
</body>
</html>
