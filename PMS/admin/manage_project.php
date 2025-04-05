<?php 
include('../includes/connection.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>
   
</head>
<body>
   <center><h3 style="color: #000; margin: 10px 0; font-weight:600; padding:5px; background-color:#fff; width:25vw; border-radius: 5px;">All Assigned Projects</h3></center><br>
   <table class="table" style="background-color: whitesmoke; width:75vw; margin:auto">
      <tr>
         <th>S.No</th>
         <th>Task ID</th>
         <th style="width:40%;">Description</th> 
         <th>Start Date</th>
         <th>End Date</th>
         <th>Status</th>
         <th>Action</th>
      </tr>
      <?php 
      $sno = 1;
      $query = "select * from projects";
      $query_run = mysqli_query($connection, $query);
      while($row = mysqli_fetch_assoc($query_run)){
         ?>
         <tr>
         <td><?php echo $sno?></td>
         <td><?php echo $row['tid'];?></td>
         <td ><?php echo $row['description'];?></td>
         <td><?php echo $row['start_date'];?></td>
         <td><?php echo $row['end_date'];?></td>
         <td><?php echo $row['status'];?></td>
         <td><a style="text-decoration: none;" href="edit_project.php?id=<?php echo $row['tid']; ?>">Edit</a> | <a style="text-decoration: none;" href="delete_project.php?id=<?php echo $row['tid']; ?>">Delete</a></td>
         </tr>
         <?php
         $sno = $sno +1;
      }

      ?>
   </table>
</body>
</html>