<?php
include 'homepage.php';
if(!empty($connection)) {
    if (isset($_POST['post'])) {
        $blog_date = date('d');
        $blog_month = date('M');
        $username = $_SESSION['username'];
        $post = $_POST['content'];

        /*Search for the user in the registration table*/
        $user_search_query = "select *from project.registration where username='$username'";
        $user_search = mysqli_query($connection, $user_search_query);
        $user_search_array = mysqli_fetch_array($user_search);
        $user_id = $user_search_array['id'];
        $user_name = $user_search_array['username'];


        $sql = "Insert into project.blog( id, post, date, month, creator) Values ('$user_id','$post','$blog_date','$blog_month','$username')";
        $blog_post = mysqli_query($connection, $sql);
        if($blog_post=='true') {
            header('Location:homepage.php');
        }
    }
}