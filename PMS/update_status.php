
<?php 
 include("includes/connection.php");
 if( isset($_POST['update'])){
   $query = "update projects set status = '$_POST[status]' where tid = $_GET[id]";
   $query_run = mysqli_query($connection,$query);
   if($query_run){
      echo "<script>alert('Status updated successfully...');
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
   <div class="row" id="header">
      <div class="col-12">
 <h3><i class="fa-fa-solid fa-list" style="padding-right: 15px; font: weight 700px;"></i>Project Management System</h3> 
       </div> 
   </div>
   <div class="row">
      <div class="col-4 m-auto" style="color: #fff;"> <br>
        <center> <h3 style="color: #000; margin: 10px 0; font-weight:600; padding-bottom: 5px; background-color:#fff; width:25vw; border-radius: 5px;">Update the Project</h3>  </center><br>
        <?php 
        $query = "select * from projects where tid = $_GET[id]";
        $query_run = mysqli_query($connection, $query);
        while($row = mysqli_fetch_assoc($query_run)) {
        ?>
                  
         <form action="" method="post">
         <div class="form-group">
            <select name="status" class="form-control">
               <option value="">-Select-</option>  <option value="In-Progress">In-Progress</option>
               <option value="Completed">Completed</option>
            </select>
         </div>

         <button type="submit" class="btn btn-warning mt-3" name="update" value="Update">Update</button>
         </form>

         <script>
         $(document).ready(function() {
         $('form').submit(function(event) {
            if ($('select[name="status"]').val() === "") {  // Check if the default option is selected
               event.preventDefault();  // Prevent form submission
               alert("Please select a valid project status.");  // Prompt the user to update
            }
         });
         });
         </script>

            <?php 
              }
            ?>
      </div>
   </div>
</body>
</html>


