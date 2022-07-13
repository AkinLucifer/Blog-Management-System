<?php
include 'homepage.php';
if(isset($_POST['post'])){
    $blog_date = date('d');
    $blog_month =date('M');
    $username = $_SESSION['username'];
    $post = $_POST['content'];
    $sql = "Insert into project.blog(post,creator,date,month) Values ('$post','$username','$blog_date','$blog_month')";
    $blog_post = mysqli_query($connection,$sql);
    if($blog_post){
        header('Location:homepage.php');
    }
}