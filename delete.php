<?php
include 'database.php';
if(!empty($connection)) {
    if (isset($_GET['deleteid'])) {
        $id = $_GET['deleteid'];


        /*Deleting user from the registered table*/

        /*Linked data from the blog table*/
        $user_delete_blog_query = "delete from project.blog where id = $id";
        $user_delete_blog = mysqli_query($connection, $user_delete_blog_query);

        /*Linked data from the blog_action table*/
        $user_delete_blog_action_query = "delete from project.blog_action where actor_id = $id";
        $user_delete_blog_action = mysqli_query($connection, $user_delete_blog_action_query);

        /*Linked data from the comment table*/
        $user_delete_comment_query = "delete from project.comment where actor_id=$id";
        $user_delete_comment = mysqli_query($connection, $user_delete_comment_query);

        /*Linked data from the report table*/
        $user_delete_report_query = "delete from project.report where report_users_id=$id";
        $user_delete_report = mysqli_query($connection, $user_delete_report_query);


        $user_delete_query = "delete from project.registration where id=$id";
        $user_delete = mysqli_query($connection, $user_delete_query);
        if ($user_delete) {
            header('Location:admin_page.php');
        }
    }
}