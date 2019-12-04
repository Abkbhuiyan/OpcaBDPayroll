<?php 
$connection = mysqli_connect("localhost", "root", "");
if (!$connection) {
    die("Database connection failed: " . mysqli_error());
}

// 2. Select a database to use 
$db_select = mysqli_select_db($connection,'opcabd_org');
if (!$db_select) {
    die("Database selection failed: " . mysqli_error());
}
 
?>

