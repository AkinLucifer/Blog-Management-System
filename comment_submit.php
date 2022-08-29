<?php
include 'database.php';

if(isset($_POST['submit'])){
    if(!empty($connection)) {
        $comment = $_POST['comment'];
        $username = $_POST['username'];
        $id = $_POST['id'];

        /*Check user details*/
        $check_user_query = "select *from project.registration where username='$username'";
        $check_user = mysqli_query($connection, $check_user_query);
        $check_user_record = mysqli_fetch_array($check_user);
        $actor_id = $check_user_record['id'];


        /*Insert into comment table*/
        $comment_query = "insert into project.comment (comment, post_id, actor_id,actor) 
                            values ('$comment',$id,$actor_id,$username)";
        $comment = mysqli_query($connection, $comment_query);

    }
}