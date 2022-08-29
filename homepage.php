<?php include 'nav.php';
error_reporting(0);
if(!empty($connection)and!empty($row)) {
    $user = $row['user_type'];
    $sql = "select *from project.blog order by post_id DESC ";
    $search = mysqli_query($connection, $sql);
    $blog_num = mysqli_num_rows($search);
    $blog_records = mysqli_fetch_array($search);
    $username = $_SESSION['UserName'];


}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>BMS</title>

</head>
<body >
<?php
if ($user == 'user') {
    echo "<p class='text-center'><a href='blogs.php' class='text-decoration-none btn btn-secondary w-25'>What's on your mind?</a></p>";
}
?>
<div class="container-sm  w-75 mt-4 ">
    <?php
    if(!$blog_num){

    }
    else{
    echo'<div>';
        echo '<span style="font-weight: bold;font-size: 14px;font-family: Segoe UI Historic;">';
        echo '<a href="user_profile.php?user_profile_id=' . $username . '" style="text-decoration:none;">';
        echo $blog_records["creator"];
        echo '</a>';
        echo '</span>
    &nbsp;&nbsp;';
        echo '<span style="font-size: 14px;font-family: Segoe UI Historic ;margin-top:5px;">';
        echo $blog_records["date"] . ' ' . $blog_records['month'];
        echo '</span>';

        echo '</div>';
        echo '<div class="card w-75">';
        echo '<div class="card-body">';
        echo '<p class="text-start">';
        echo $blog_records["post"];
        echo '</div>';
        echo '</div>';
        echo '</p>';
        $id = $blog_records['post_id'];
        $like_update_sql = "select *from project.blog_action where post_id=$id and `like`='1'";
        $like_update_query = mysqli_query($connection, $like_update_sql);
        $like_update_count = mysqli_num_rows($like_update_query);


        $blog_update_sql = "update project.blog set `like` = $like_update_count where post_id=$id";
        $blog_update_query = mysqli_query($connection, $blog_update_sql);

        $like_search_sql = "select *from project.blog_action where post_id=$id and actor='$username' and `like`='1'";
        $like_search_query = mysqli_query($connection, $like_search_sql);
        $like_search_num = mysqli_num_rows($like_search_query);

        echo $blog_records['like'];

        echo '<hr class="w-75">';
        echo '<div>';
        if ($like_search_num) {
            echo '<a class="  btn  text-primary " href="like_poke.php?like_id=' . $blog_records['post_id'] . '" "><i class="heart-icon"></i>Like</a>';
        } else {
            echo '<a class="  btn " href="like.php?like_id=' . $blog_records['post_id'] . '" ">Like</a>';
        }
        echo '
   
    <a href="comment.php?comment_id=' . $blog_records['post_id'] . '" class=" btn" >Comment</a>
    ';
        if ($user == 'user') {
            if ($username != $blog_records['creator']) {
                echo '<a href="report.php?report_id=' . $blog_records['post_id'] . '" class="btn text-danger">Report</a>
';
            }
        }
        echo '</div>';

        while ($blog_records = mysqli_fetch_array($search)) {
            echo '<div>';
            echo '<span style="font-weight: bold;font-size: 14px;font-family: Segoe UI Historic">';
            echo '<a href="user_profile.php?user_profile_id=' . $username . '" style="text-decoration:none;">';
            echo $blog_records["creator"];
            echo '</a>';
            echo '</span>
    &nbsp;&nbsp;';
            echo'<span style="font-size: 14px;font-family: Segoe UI Historic ;margin-top:5px;">';
            echo $blog_records["date"] . ' ' . $blog_records['month'];
            echo'</span>';

            echo '</div>';
            echo '<div class="card w-75">';
            echo '<div class="card-body">';
            echo '<p class="text-start">';
            echo $blog_records["post"];
            echo '</div>';
            echo'</div>';
            echo '</p>';
            $id = $blog_records['post_id'];
            $like_update_sql = "select *from project.blog_action where post_id=$id and `like`='1'";
            $like_update_query = mysqli_query($connection,$like_update_sql);
            $like_update_count = mysqli_num_rows($like_update_query);


            $blog_update_sql = "update project.blog set `like` = $like_update_count where post_id=$id";
            $blog_update_query = mysqli_query($connection, $blog_update_sql);

            $like_search_sql = "select *from project.blog_action where post_id=$id and actor='$username' and `like`='1'";
            $like_search_query = mysqli_query($connection, $like_search_sql);
            $like_search_num = mysqli_num_rows($like_search_query);

            echo $blog_records['like'];

            echo '<hr class="w-75">';
            echo '<div>';
            if ($like_search_num) {
                echo '<a class="  btn text-primary " href="like_poke.php?like_id=' . $blog_records['post_id'] . '" "><i class="heart icon"></i>Like</a>';
            } else {
                echo '<a class="  btn  " href="like.php?like_id=' . $blog_records['post_id'] . '" ">Like</a>';
            }
            echo '
   
    <a href="comment.php?comment_id=' . $blog_records['post_id'] . '" class=" btn ">Comment</a>
    ';
            if ($user == 'user') {
                if ($username != $blog_records['creator']) {
                    echo '
    <a href="report.php?report_id=' . $blog_records['post_id'] . '" class="btn text-danger">Report</a>
';
                }
            }
            echo '</div>';

        }

    }
    ?>
</div>
</body>
</html>