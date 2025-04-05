<?php
$connection = mysqli_connect("localhost", "root", "");
$db = mysqli_select_db($connection, "pms_db");

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

if (!$db) {
    die("Database selection failed: " . mysqli_error($connection));
}
?>
