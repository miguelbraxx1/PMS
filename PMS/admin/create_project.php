<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- jquery files -->
    <script src="../includes/jquery-3.7.1.min.js"></script>
   <!-- bootstrap files -->
   <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
   <script src="../bootstrap/js/bootstrap.min.js"></script>
   <!-- external css -->
   <link rel="stylesheet" href="../style.css">
   
</head>
<body>
   <h3  style="color: #000; margin: 10px 0; text-align:center; font-weight:600; padding:5px; background-color:#fff; width:25vw; border-radius: 5px;">Create a New Project</h3>
   <div class="row" >
      <div class="col-md-6">
         <form action="
         "method="post" >
         <div class="form-group">
            <label >Select User:</label>
            <select class="form-control" name="id" required>
               <option >Select</option>
               <?php 
               include("../includes/connection.php");
               $query = "select uid, name from users";
               $query_run =mysqli_query($connection,$query);
               if(mysqli_num_rows($query_run)){
                  while($row = mysqli_fetch_assoc($query_run) ){
                   ?>
                   <option value="<?php echo $row['uid']; ?>"><?php echo $row['name']; ?> </option>  
                   <?php
                  }
               }
               ?>
            </select>
   
      </div>
      <div class="form-group">
         <label>Description:</label>
         <textarea name="description"  cols="48" rows="3" placeholder="Mention Project" required></textarea>
         <div class="form-group">
            <label>Start Date:</label>
            <input type="date" class="form-control" name="start_date" required>
         </div>
         <div class="form-group">
            <label>End Date:</label>
            <input type="date" class="form-control" name="end_date" required>
         </div>
         <input type="submit" class="btn btn-warning mt-3" name="create_project" value="Create">
            </form>
      </div>
            </div>
</body>
</html>