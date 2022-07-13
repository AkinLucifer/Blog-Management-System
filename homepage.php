<?php include 'nav.php';
if(!empty($connection)and!empty($row)) {
    $user = $row['user_type'];
    $sql = "select *from project.blog";
    $search = mysqli_query($connection, $sql);
    $blog_num = mysqli_num_rows($search);
    $blog_records = mysqli_fetch_array($search);

    $username = $_SESSION['username'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>BMS</title>
    <script type="text/javascript">
        function autoRefreshPage()
        {
            window.location = window.location.href;
        }
        setInterval('autoRefreshPage()', 15000);
    </script>
</head>
<body >
<?php
if ($user=='user'){
echo '<form method="post" action="post.php">
<div class="input-group w-50 " style="margin-left:300px;">
  <input type="text" name="content" class="form-control text-center" placeholder="What is on your mind?" aria-label="What is on your mind?" aria-describedby="button-addon2" style="width: 50px; height:50px;opacity: 0.8;" autocomplete="off">
    <input class="btn btn-outline-secondary" type="submit" name="post" value="Post" style="opacity:0.5; font-weight: bold">
</div>
</form>';}
?>
<div class="container-sm  w-75" style="margin-top: 20px;">
    <?php
    if(!$blog_num){
        error_reporting(0);
    }
    else{
    echo'<div>';
    echo'<span style="font-weight: bold;font-size: 14px;font-family: Segoe UI Historic">';
    echo $blog_records["creator"];
    echo'</span>
    &nbsp;&nbsp;';
    echo'<span style="font-size: 14px;font-family: Segoe UI Historic ;margin-top:5px;">';
    echo $blog_records["date"] . ' ' . $blog_records['month'];
    echo'</span>';

    echo '</div>';
    echo'<div class="card">';
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
        $blog_update_query =mysqli_query($connection,$blog_update_sql);

        $like_search_sql = "select *from project.blog_action where post_id=$id and actor='$username' and `like`='1'";
        $like_search_query = mysqli_query($connection,$like_search_sql);
        $like_search_num = mysqli_num_rows($like_search_query);

        echo $blog_records['like'];

    echo '<hr>';
    echo '<div class="row d-flex justify-content-center">
    <div class="col">';
        if($like_search_num){
            echo '<a class="  btn btn-lg w-100 text-primary " href="like_poke.php?like_id='.$blog_records['post_id'].'" onclick="autoRefreshPage()">Like</a>';
        }
        else{
         echo '<a class="  btn btn-lg w-100  " href="like.php?like_id='.$blog_records['post_id'].'">Like</a>';
        }
        echo '</div>
    <div class=col>
    <a href="" class=" btn btn-lg w-100 ">Comment</a>
    </div>
        </div>';

        while ($blog_records = mysqli_fetch_array($search)){
            echo'<div>';
            echo'<span style="font-weight: bold;font-size: 14px;font-family: Segoe UI Historic">';
            echo $blog_records["creator"];
            echo'</span>
    &nbsp;&nbsp;';
            echo'<span style="font-size: 14px;font-family: Segoe UI Historic ;margin-top:5px;">';
            echo $blog_records["date"] . ' ' . $blog_records['month'];
            echo'</span>';

            echo '</div>';
            echo'<div class="card">';
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
            $blog_update_query =mysqli_query($connection,$blog_update_sql);

            $like_search_sql = "select *from project.blog_action where post_id=$id and actor='$username' and `like`='1'";
            $like_search_query = mysqli_query($connection,$like_search_sql);
            $like_search_num = mysqli_num_rows($like_search_query);

            echo $blog_records['like'];

            echo '<hr>';
            echo '<div class="row d-flex justify-content-center">
    <div class="col">';
            if($like_search_num){
                echo '<a class="  btn btn-lg w-100 text-primary " href="like_poke.php?like_id='.$blog_records['post_id'].'">Like</a>';
            }
            else{
                echo '<a class="  btn btn-lg w-100  " href="like.php?like_id='.$blog_records['post_id'].'">Like</a>';
            }
            echo '</div>
    <div class=col>
    <a href="" class=" btn btn-lg w-100 ">Comment</a>
    </div>
        </div>';

        }
    }
    ?>
</div>
</body>
</html>