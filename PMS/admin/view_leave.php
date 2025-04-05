<?php include('../includes/connection.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>
</head>
<body>
   <center><h3 style="color: #000; margin: 10px 0; font-weight:600; padding-bottom: 5px; background-color:#fff; width:25vw; border-radius: 5px;">All Application Leaves </h3></center> <br>
   <table class="table" style="background-color: whitesmoke; width:75vw; margin:auto">
      <tr>
         <th>S.No</th>
         <th>User</th>
         <th>Subject</th>
         <th>Message</th>
         <th>Status</th>
         <th>Action</th>
      </tr>
      <?php 
      $sno = 1;
      $query = "SELECT * FROM leaves";
      $query_run = mysqli_query($connection, $query);

      while($row = mysqli_fetch_assoc($query_run)){
      ?>
      <tr>
         <td><?php echo $sno; ?></td>
         <?php 
         $userId = isset($row['uid']) ? $row['uid'] : 0; // Set a default value if 'uid' is not set
         $query1 = "SELECT name FROM users WHERE uid = $userId";
         $query_run1 = mysqli_query($connection, $query1);
         $row1 = mysqli_fetch_assoc($query_run1);
         ?>
         <td><?php echo $row1['name']; ?></td>
         <td><?php echo $row['subject']; ?></td>
         <td><?php echo $row['message']; ?></td>
         <td><?php echo $row['status']; ?></td>
         <td><a href="approve_leave.php?id=<?php echo $row['lid']; ?>">Approve</a>|<a href="reject_leave.php?id=<?php echo $row['lid']; ?>">Reject</a> </td>
      </tr>
      <?php
         $sno++;
      }
      ?>
   </table>
</body>
</html>
