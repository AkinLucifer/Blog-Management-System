<?php
include 'database.php';
include 'admin_page.php';
if (isset($_GET['deleteid'])) {
    $id = $_GET['deleteid'];
    $sql = "delete from project.registration where username='$id'";
    $delete = mysqli_query($connection,$sql);
}