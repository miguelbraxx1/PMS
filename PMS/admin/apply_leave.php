<?php 
include("../includes/connection.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>
    <!-- jquery files -->
    <script src="../includes/jquery-3.7.1.min.js"></script>
   <!-- bootstrap files -->
   <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
   <script src="../bootstrap/js/bootstrap.min.js"></script>
   <!-- external css -->
   <link rel="stylesheet" href="../style.css">
   
</head>
<body>
   <center>
      <h3 style="color: #000; margin: 10px 0; font-weight:600; padding:5px; background-color:#fff; width:25vw; border-radius: 5px;">All Leave Applications</h3>
   </center> <br>
   <table class="table" style="background-color: whitesmoke; width:75vw; margin:auto">
    <tr>
        <th>S.No</th>
        <th>User</th>
        <th>Subject</th>
        <th style="width:40%;">Message</th>
        <th>Status</th>
        <th>Action</th>
    </tr>
    <?php 
    $sno = 1;
    $query = "select * from leaves";
    $query_run = mysqli_query($connection, $query);
    while($row = mysqli_fetch_assoc($query_run)) {
    ?>
    <tr>
        <td><?php echo $sno;?></td>
        <?php 
        $query1 = "select name from users where uid = $row[uid]";
        $query_run1 = mysqli_query($connection, $query1);
        while($row1 = mysqli_fetch_assoc($query_run1)){
          ?>
          <td><?php echo $row1['name'];?></td>  
          <?php
        }
        ?>
        <td><?php echo $row['subject'];?></td>
        <td><?php echo $row['message'];?></td>
        <td><?php echo $row['status'];?></td>
        <td><a style="text-decoration: none;" href="approve_leave.php?id=<?php echo $row['lid'];?>">Approve</a> | <a style="text-decoration:none;" href="reject_leave.php?id=<?php echo $row['lid'];?>">Reject</a></td>
    </tr>
    <?php
    }
   ?>

</table>
</body>
</html>


