<?php

include 'nav.php';
$username = $_SESSION['UserName'];

if(!empty($connection)) {
    if (isset($_GET['comment_id'])) {
        $id = $_GET['comment_id'];
        /*Check the details of the post*/
        $check_users_blog_query = "select *from project.blog where post_id=$id ";
        $check_users_blog = mysqli_query($connection, $check_users_blog_query);
        $check_users_blog_record = mysqli_fetch_array($check_users_blog);
        $date = $check_users_blog_record['date'];
        $month = $check_users_blog_record['month'];
        /*Check the comments on the selected post*/
        $check_comment_query="select *from project.comment where post_id=$id";
        $check_comment = mysqli_query($connection,$check_comment_query);
        $check_comment_record = mysqli_fetch_array($check_comment);


        $_SESSION['post_id'] = $id;

    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>BMS</title>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <script src="./js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
    <?php

    echo'<div>';
        echo'<span style="font-weight: bold;font-size: 14px;font-family: Segoe UI Historic">';
    echo $check_users_blog_record["creator"];
    echo'</span>
        &nbsp;&nbsp;';
        echo'<span style="font-size: 14px;font-family: Segoe UI Historic ;margin-top:5px;">';
    echo $check_users_blog_record["date"] . ' ' . $check_users_blog_record['month'];
    echo'</span>';

        echo '</div>';
    echo'<div class="card">';
        echo '<div class="card-body">';
            echo '<p class="text-start">';
                echo $check_users_blog_record["post"];
                echo '</div>';
    echo '</div>';
    echo '</p>';
    echo '<br>';
    echo $check_users_blog_record['like'];

    echo '<hr style="color: #c2bdbd;">';
    echo '<br>';
    $_SESSION['post_id'] = $id;
    ?>
    <form method="post" action="comment_submit.php">
        <div class="card w-75">
            <div class="card-body">
                <div class="mb-3">

                    <input type="text" name="username" value="<?php echo $username; ?>" style="display: none;">
                    <input type="text" name="id" value="<?php echo $id; ?>" style="display: none;">
                    <div class="form-floating">
                        <input type="text" name="" id="floatingInput" class="form-control" placeholder="comment">
                        <label for="floatingInput">Comment Here..</label>
                    </div>
                    <br>
                    <div class="d-grid gap-5 d-md-block">
                        <input class="btn btn-success" type="submit" name="submit" value="Comment">
                        <input class="btn btn-danger" type="reset" value="Cancel">
                    </div>
                </div>
            </div>
        </div>
    </form>
    <br><br>
    <?php

    /*Check the comment details*/
    $check_comment_query = "select *from project.comment where post_id=$id";
    $check_comment = mysqli_query($connection, $check_comment_query);
    $check_comment_record = mysqli_fetch_array($check_comment);
    echo $check_comment_record['actor'];
    echo '<div class="card" style="width:18rem;">';
    echo '<div class="card-body">';
    echo '<p class="text-start">';
    echo $check_comment_record['comment'];
    echo '</div>
        </div>';
    echo '<div><a href="" class="text-decoration-none" style="margin-right: 12px;">Like</a><a href="" class="text-decoration-none"  style="margin-right: 12px;">Reply</a></div>';
    while ($check_comment_record = mysqli_fetch_array($check_comment)) {
        echo $check_comment_record['actor'];
        echo '<div class="card" style="width:18rem;">';
        echo '<div class="card-body">';
        echo '<p class="text-start">';
        echo $check_comment_record['comment'];
        echo '</div>
        </div>';
        echo '<div><a href="" class="text-decoration-none" style="margin-right: 12px;">Like</a>
        <a href="" class="text-decoration-none"  style="margin-right: 12px;">Reply</a></div>';
    }
    ?>
</div>
</body>
</html>
