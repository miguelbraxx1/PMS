<?php 
session_start();
include('includes/connection.php')
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>
   <!-- jquery files -->
   <script src="includes/jquery-3.7.1.min.js"></script>
   <!-- bootstrap files -->
   <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
   <script src="bootstrap/js/bootstrap.min.js"></script>
   <!-- external css -->
   <link rel="stylesheet" href="style.css">
</head>
<body>
   <center><h3 style="color: #000; margin: 10px 0; font-weight:500; padding-bottom: 5px; background-color:#fff; width:15vw; border-radius: 5px; ">Your leave Applications</h3></center><br>
   <table class="table" style="background-color:whitesmoke; width:75vw;">
      <tr>
         <th>S.No</th>
         <th>Subject</th>
         <th style="width: 40%;">Message</th>
         <th>Status</th>
      </tr>
      <?php 
      $sno = 1;
      $query = "select * from leaves  where uid  = $_SESSION[uid]" ;
      $query_run = mysqli_query($connection, $query) ;
      while($row = mysqli_fetch_assoc($query_run))  {
         ?>
         <tr>
            <td><?php echo $sno;?></td>
            <td><?php echo $row['subject']?></td>
            <td><?php echo $row['message']?></td>
            <td><?php echo $row['status']?></td>
         </tr>
         <?php 
         $sno = $sno + 1;
      }  
      
      ?>
   </table>
</body>
</html>