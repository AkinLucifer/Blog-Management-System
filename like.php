<?php
include 'database.php';
include 'homepage.php';

$username = $_SESSION['username'];

if (isset($_GET['like_id'])) {
    if (!empty($connection)) {
        $id = $_GET['like_id'];
        $like_check_sql = "select *from project.blog_action where actor='$username' and post_id=$id";
        $like_check_query = mysqli_query($connection, $like_check_sql);
        $like_check_num = mysqli_num_rows($like_check_query);


        if ($like_check_num != 1) {
            $like_insert_sql = "insert into project.blog_action(post_id, actor, `like`) values($id,'$username','1')";
            $like_insert_query = mysqli_query($connection, $like_insert_sql);
        }
        else{
            $like_update_sql = "update project.blog_action set `like`='1' where actor='$username' and post_id=$id";
            $like_update_query = mysqli_query($connection, $like_update_sql);
        }
        header('Location:homepage.php');
    }
}