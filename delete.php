<?php
include 'database.php';
include 'admin_page.php';
if(!empty($connection)) {
    if (isset($_GET['deleteid'])) {
        $id = $_GET['deleteid'];
        $sql = "delete from project.registration where username='$id'";
        $delete = mysqli_query($connection, $sql);
        if ($delete) {
            header('Location:admin_page.php');
        }
    }
}