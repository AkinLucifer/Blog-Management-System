<?php
include 'nav.php';
$username = $_SESSION['UserName'];


if(!empty($connection)) {
    if (isset($_GET['report_id'])) {
        $id = $_GET['report_id'];
        /*Check the details of the post*/
        $check_users_blog_query = "select *from project.blog where post_id=$id ";
        $check_users_blog = mysqli_query($connection, $check_users_blog_query);
        $check_users_blog_record = mysqli_fetch_array($check_users_blog);
        $date = $check_users_blog_record['date'];
        $month = $check_users_blog_record['month'];
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>BMS</title>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <?php
    /*Check the blog _detail*/
    $check_blog_query = "select *from project.blog where post_id=$id";
    $check_blog = mysqli_query($connection,$check_blog_query);
    $check_blog_record = mysqli_fetch_array($check_blog);
    $creator = $check_blog_record['creator'];


    if($creator!=$username){
    echo'<div>';
    echo'<span style="font-weight: bold;font-size: 14px;font-family: Segoe UI Historic">';
    echo $check_users_blog_record["creator"];
        echo '</span>
        &nbsp;&nbsp;';
        echo '<span style="font-size: 14px;font-family: Segoe UI Historic ;margin-top:5px;">';
        echo $check_users_blog_record["date"] . ' ' . $check_users_blog_record['month'];
        echo '</span>';

        echo '</div>';
        echo '<div class="card">';
        echo '<div class="card-body">';
        echo '<p class="text-start">';
        echo $check_users_blog_record["post"];
        echo '</div>';
        echo '</div>';
        echo '</p>';
        echo '<br>';
        echo $check_users_blog_record['like'];

        echo '<hr>';
        echo '<br>';
        $_SESSION['post_id'] = $id;

        echo '<form method="post" action="report_submit.php">
        <div class="card w-50">
            <div class="card-body">
                <div class="mb-3">'; ?>

        <input type="text" name="username" value="<?php echo $username; ?>" style="display:none;">
        <input type="text" name="id" value="<?php echo $id; ?>" style="display: none;"><?php
        echo '<div class="form-floating mb-3 mt-3">
                    <input type="text"  id="exampleFormControlTextarea1" name="reason" class="form-control" placeholder="reason" autocomplete="off" maxlength="20">
                    <label for="exampleFormControlTextarea1">Reasons to Report:</label>
                    </div>
                    <div class="d-grid gap-5 d-md-block">
                        <input  class="btn btn-success" type="submit" name="report" value="Report">
                        <input class="btn btn-danger" type="reset" value="Cancel">
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>';
    } else {
        echo '<script>
window.alert("Users cannot report its own post.");
</script>';
        include 'homepage.php';
    } ?>
</body>
</html>
