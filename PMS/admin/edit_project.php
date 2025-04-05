<?php
include("../includes/connection.php");

if (isset($_GET['id'])) {
    $project_id = $_GET['id'];

    // Fetch project details
    $query_fetch = "SELECT * FROM projects WHERE tid = $project_id";
    $query_fetch_run = mysqli_query($connection, $query_fetch);
    $project = mysqli_fetch_assoc($query_fetch_run);

    // Check if the form is submitted
    if (isset($_POST['update_project'])) {
        // Use different name for the hidden input field
        $user_id = $_POST['user_id'];
        $description = $_POST['description'];
        $start_date = $_POST['start_date'];
        $end_date = $_POST['end_date'];

        // Validate user selection
        if ($user_id == 'Select') {
            echo "<script type='text/javascript'>
            alert('Please select a user.');
            </script>";
        } else {
            // Update the project
            $query_update = "UPDATE projects SET uid = $user_id, description = '$description', start_date = '$start_date', end_date = '$end_date' WHERE tid = $project_id";
            $query_update_run = mysqli_query($connection, $query_update);

            if ($query_update_run) {
                echo "<script type='text/javascript'>
                alert('Project updated successfully...');
                window.location.href = 'admin_dashboard.php';
                </script>";
            } else {
                echo "<script type='text/javascript'>
                alert('Error...Please try again.');
                </script>";
            }
        }
    }
} else {
    // Handle case where 'id' is not set in the URL
    echo "Invalid project ID";
}
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
<div class="row" id="header">
    <div class="col-12">
        <h3><i class="fa-fa-solid fa-list" style="padding-right: 15px; font: weight 700px;"></i>Project Management System</h3>
    </div>
</div>
<div class="row">
    <div class="col-4 m-auto" style="color: #fff;"> <br>
        <center> <h3 style="color: #000; margin: 10px 0; font-weight:600; padding-bottom: 5px; background-color:#fff; width:25vw; border-radius: 5px;">Edit the Project</h3>  </center><br>
        <form action="" method="post" onsubmit="return validateForm();">
            <div class="form-group">
                <!-- Use a different name for the hidden input field -->
                <input type="hidden" name="project_id" class="form-control" value="<?php echo $project_id; ?>" required>
            </div>
            <div class="form-group">
                <label>Select User:</label>
                <select class="form-control" name="user_id" required>
                    <?php
                    $query1 = "select uid, name from users";
                    $query_run1 = mysqli_query($connection, $query1);
                    if (mysqli_num_rows($query_run1)) {
                        while ($row1 = mysqli_fetch_assoc($query_run1)) {
                            // Compare user IDs and set the 'selected' attribute if matched
                            $selected = ($row1['uid'] == $project['uid']) ? 'selected' : '';
                            ?>
                            <option value="<?php echo $row1['uid']; ?>" <?php echo $selected; ?>><?php echo $row1['name']; ?> </option>
                            <?php
                        }
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label>Description:</label>
                <textarea class="form-control" name="description" cols="45" rows="3"
                          required><?php echo $project['description']; ?></textarea>
            </div>
            <div class="form-group">
                <label>Start Date:</label>
                <input type="date" class="form-control" name="start_date" value="<?php echo $project['start_date']; ?>"
                       required>
            </div>
            <div class="form-group">
                <label>End Date:</label>
                <input type="date" class="form-control" name="end_date" value="<?php echo $project['end_date']; ?>"
                       required>
            </div>
            <input type="submit" class="btn btn-warning mt-3" name="update_project" value="Update">
        </form>
    </div>
</div>

<script type="text/javascript">
    function validateForm() {
        var user_id = document.getElementsByName("user_id")[0].value;
        if (user_id == 'Select') {
            alert('Please select a user.');
            return false;
        }
        return true;
    }
</script>
</body>
</html>
