<?php
include('includes/connection.php');

if(isset($_POST['UserRegistration'])) {
    $name = mysqli_real_escape_string($connection, $_POST['name']);
    $email = mysqli_real_escape_string($connection, $_POST['email']);
    $password = mysqli_real_escape_string($connection, $_POST['password']);
    $mobile = mysqli_real_escape_string($connection, $_POST['mobile']);

    // Hash the password before storing it in the database
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Insert into users without specifying reset_token
    $query = "INSERT INTO users (name, email, password, mobile) VALUES (?, ?, ?, ?)";
    $stmt = mysqli_prepare($connection, $query);
    mysqli_stmt_bind_param($stmt, "ssss", $name, $email, $hashed_password, $mobile);
    
    $query_run = mysqli_stmt_execute($stmt);

    if($query_run) {
        echo "<script type='text/javascript'>
        alert('User Registered Successfully...');
        window.location.href = 'index.php'; </script>";
    } else {
        echo "<script type='text/javascript'>
        alert('Error... Please Try Again');
        window.location.href = 'register.php';
        </script>";
    }

    mysqli_stmt_close($stmt);
    mysqli_close($connection);
}
?>






<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Register</title>
   <!-- jquery files -->
   <script src="includes/jquery-3.7.1.min.js"></script>
   <!-- bootstrap files -->
   <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
   <script src="bootstrap/js/bootstrap.min.js"></script>
   <!-- external css -->
   <link rel="stylesheet" href="style.css">
</head>
<body>
   <div class="row">
      <div class="col-md-3 m-auto mt-5"  style="background-color:#81CACF;">
         <center><h3 style="background-color:#5a8F7B; padding:5px; width:15vw;" class="my-2">User Registration</h3></center>
         <form action="
         " method="post" >
         <div class="form-group">
            <input type="text" name="name" class="form-control my-2" placeholder="Enter your Name" autocomplete="off"  required>
         </div>
         <div class="form-group">
            <input type="email" name="email" class="form-control my-2" placeholder="Enter Email" autocomplete="off" required>
         </div>
         <div class="form-group">
            <input type="Password" name="password" class="form-control my-2" placeholder="Enter Password" required>
         </div>
         <div class="form-group">
            <input type="text" name="mobile" class="form-control my-2" placeholder="Enter Mobile No." autocomplete="off" required>
         </div>
         <div class="form-group">
           <center> <input type="submit" name="UserRegistration" value="Register" class=" btn btn-warning mb-2">
           </center>
         </div><br>
         </form>
      </div> 
      <center> <a href="index.php" class="btn btn-danger mt-3">Go to Home</a></center>
   </div>
</body>
</html>