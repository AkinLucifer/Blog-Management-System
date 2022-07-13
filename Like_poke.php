<?php
include "database.php";
include 'homepage.php';
$username = $_SESSION['username'];

if (isset($_GET['like_id'])) {
    if (!empty($connection)) {
        $id = $_GET['like_id'];
        echo $id;
        echo $username;

        $like_poke_sql = "update project.blog_action set `like`='0' where actor='$username'and post_id=$id";
        $like_poke_query = mysqli_query($connection, $like_poke_sql);
    }
    header('Location:homepage.php');
}
