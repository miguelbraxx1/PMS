
<?php 
session_start();
include('includes/connection.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>PMS|Projects</title>
   <!-- jquery files -->
   <script src="includes/jquery-3.7.1.min.js"></script>
   <!-- bootstrap files -->
   <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
   <script src="bootstrap/js/bootstrap.min.js"></script>
   <!-- external css -->
   <link rel="stylesheet" href="style.css">
</head>
<body>
   <center><h3 style="color: #000; margin: 10px 0; font-weight:600; padding:5px; background-color:#fff; width:25vw; border-radius: 5px;">Your projects</h3></center>
      <table class="table" style="background-color: whitesmoke; width:75vw; margin:auto">
      <tr >
         <th>S.No</th>
         <th>Project ID</th>
         <th style="width: 40%;">Description</th>
         <th>Start Date</th>
         <th>End Date</th>
         <th>Status</th>
         <th>Action</th>
      </tr>
      <?php 
        $query = " select * from projects where uid = $_SESSION[uid]";
        $sno = 1;
        $query_run = mysqli_query($connection, $query);
        while($row = mysqli_fetch_assoc($query_run)){
         ?>
         <tr>
            <td><?php echo $sno;?></td>
            <td><?php echo $row['tid'];?></td>
            <td><?php echo $row['description'];?></td>
            <td><?php echo $row['start_date'];?></td>
            <td><?php echo $row['end_date'];?></td>
            <td><?php echo $row['status'];?></td>
            <td><a style="text-decoration: none;" href="update_status.php?id=<?php echo $row['tid'];?>">Update</a></td>
         </tr>
         <?php  
         $sno = $sno + 1; 
        }
         ?>
      
   </table>
   
</body>
</html>