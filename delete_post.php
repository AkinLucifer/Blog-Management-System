<?php
include 'database.php';
if (!empty($connection)) {
    if (isset($_GET['deleteid'])) {
        $id = $_GET['deleteid'];
        echo $id;

        /*Delete post from the database
        For that firstly deleting all the linked data of that particular post*/

        /*Linked data from the blog_action table*/

        $delete_blog_action_query = "delete from project.blog_action where post_id=$id";
        $delete_blog_action = mysqli_query($connection, $delete_blog_action_query);

        /*Linked data from the report table*/

        $delete_report_query = "delete from project.report where post_id=$id";
        $delete_report = mysqli_query($connection, $delete_report_query);

        /*Linked data from the comment table*/

        $delete_comment_query = "delete from project.comment where post_id=$id";
        $delete_comment = mysqli_query($connection, $delete_comment_query);


        $delete_post_query = "delete from project.blog where post_id = $id";
        $delete_post = mysqli_query($connection, $delete_post_query);


    }
}
