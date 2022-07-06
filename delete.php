<?php
include 'database.php';
include 'admin_page.php';
if (isset($_GET['deleteid'])) {
    $id = $_GET['deleteid'];
    if (!(empty($connection))) {
        $sql = "Delete from project.registration where username=$id";
        $delete = mysqli_query($connection,$sql);
        if ($delete) {
            header("Location:admin_page.php");
        }
    }
}