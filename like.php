<?php
include 'database.php';
include 'homepage.php';
if(!empty($connection)) {
    $username = $_SESSION['UserName'];
    /*Search for the user's details*/
    $user_search_query = "select *from project.registration where username='$username'";
    $user_search = mysqli_query($connection, $user_search_query);
    $user_records = mysqli_fetch_array($user_search);
    $user_id = $user_records['id'];


    if (isset($_GET['like_id'])) {
        $id = $_GET['like_id'];
        $like_check_sql = "select *from project.blog_action where actor='$username' and post_id=$id";
        $like_check_query = mysqli_query($connection, $like_check_sql);
        $like_check_num = mysqli_num_rows($like_check_query);


        if ($like_check_num != 1) {
            $like_insert_sql = "insert into project.blog_action(post_id, actor_id, `like`,  actor) 
                            values($id,$user_id,'1','$username')";
            $like_update_query = mysqli_query($connection, $like_insert_sql);
        } else {
            $like_update_sql = "update project.blog_action set `like`='1' where actor='$username' and post_id=$id";
            $like_update_query = mysqli_query($connection, $like_update_sql);
        }
        if ($like_update_query) {
            echo '
            <script>
            window.location=homepage.php;
</script>
            ';
        }
    }
}