<<<<<<< HEAD
<?php
include 'database.php';
include 'admin_page.php';
if (isset($_GET['deleteid'])) {
    $id = $_GET['deleteid'];
    $sql = "delete from project.registration where username='$id'";
    $delete = mysqli_query($connection,$sql);
=======
<?php
include 'database.php';
include 'admin_page.php';
if (isset($_GET['deleteid'])) {
    $id = $_GET['deleteid'];
    $sql = "delete from project.registration where username='$id'";
    $delete = mysqli_query($connection,$sql);
>>>>>>> 84e9b46788ecc4199ca7a8b3600eee9b925f9a7a
}