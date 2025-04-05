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
   <h3 style="color: #000; margin: 10px 0; font-weight:600; padding-bottom: 5px; background-color:#fff; width:20vw; border-radius: 5px;text-align:center">Apply Leave</h3>
   <div class="row">
      <div class="col-md-6">
         <form action="" method="post">
            <div class="form-group pb-2" >
               <input type="text" class="form-control mb-2 py-1" name="subject" placeholder="Enter Subject">
            </div>
            <div class="form-group">
               <textarea name="message" id=""  cols="48" rows="3" placeholder="Type Message..."></textarea><br>
            </div>
            <input type="submit" class="btn btn-warning pt-2 m-1" name="submit_leave" value="Submit">
         </form>    
      </div>
   </div>
</body>
</html>
