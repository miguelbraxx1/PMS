<?php 
session_start();
include('includes/connection.php');

if(isset($_POST['submit_leave'])){
   $subject = mysqli_real_escape_string($connection, $_POST['subject']);
   $message = mysqli_real_escape_string($connection, $_POST['message']);
   $uid = $_SESSION['uid'];

   $query = "INSERT INTO leaves VALUES (null, $uid, '$subject', '$message', 'No Action')";
   $query_run = mysqli_query($connection, $query);

   if($query_run){
       echo "<script type='text/javascript'>
      alert('Form Submitted Successfully...');
      window.location.href = 'User_dashboard.php';
      </script>";
}else{
   echo "<script type='text/javascript'>
   alert('Error...Please try again.');
   window.location.href = 'User_dashboard.php';
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
    <script src="includes/jquery-3.7.1.min.js"></script>
   <!-- bootstrap files -->
   <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
   <script src="bootstrap/js/bootstrap.min.js"></script>
   <!-- external css -->
   <link rel="stylesheet" href="style.css">
   <title>Document</title>
   <script type="text/javascript">
      $(document).ready(function(){
         $("#manage_project").click(function(){
            $("#right_sidebar").load("project.php");
         });
      });
      $(document).ready(function(){
         $("#apply_leave").click(function(){
            $("#right_sidebar").load("leaveForm.php");
         });
      });
      $(document).ready(function(){
         $("#leave_status").click(function(){
            $("#right_sidebar").load("leave_status.php");
         });
      });
   </script>
</head>
<body>
  
   <div class="row" id="header">
    <div class="col-md-12">
     <div class="col-md-4 mx-5 p-2" style="display: inline-block; ">
       <h3>Project Management System </h3>
     </div>
     <div class="col-md-6" style="display: inline-block; text-align:right">
       <b> Email: </b> <?php 
       echo $_SESSION['email'];
       ?>
       <span style="margin-left: 25px;"><b>Name:</b> <?php 
       echo $_SESSION['name'];
       ?></span>
     </div>
    </div>
   </div>
   <div class="row">
      <div class="col-md-2" id="left_sidebar">
         <table class="table">
            <tr>
               <td style="text-align: center;">
                  <a href="User_dashboard.php" type="button" id="logout_link">Dashboard</a>
               </td>
            </tr >
            <tr>
               <td style="text-align: center" >
               <a  type="button" class="link" id="manage_project"> Update Project</a
               </td>
            </tr>
            <tr>
               <td style="text-align: center" >
               <a type="button" class="link" id="apply_leave"> Apply Leave</a
               </td>
            </tr>
            <tr>
               <td style="text-align: center" >
               <a type="button" class="link" id="leave_status">Leave Status</a
               </td>
            </tr>
            <tr>
               <td style="text-align: center" >
               <a href="logout.php" type="button" id="logout_link">Logout</a
               </td>
            </tr>
         </table>
         </div>
         <div class="col-md-10" id="right_sidebar">
          <h4 >Instructions for Employees</h4>
          <ul style="line-height: 3em; font: size 1.2em;list-style-type:none">
            <li> 1.All the employee should mark their attendance daily.</li>
            <li> 2.Everyone must complete the task assigned to them.</li>
            <li> 3.Kindly maintain decorum of the office.</li>
            <li> 4.Keep office and your area neat and clean.</li>
          </ul>
         </div>
      
   </div>
</body>
</html>