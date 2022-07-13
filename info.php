<?php
include 'database.php';
require 'nav.php';
if(isset($_GET['infoid'])){
    $id = $_GET['infoid'];

    $sql_user = "select * from project.registration where username='$id'";
    $search_user = mysqli_query($connection,$sql_user);
    $record_user = mysqli_fetch_array($search_user);

    $sql_blog ="select *from project.blog where creator='$id'";
    $search_blog = mysqli_query($connection,$sql_blog);
    $record_blog =mysqli_fetch_array($search_blog);


    $fullname =$record_user['fname'].' '. $record_user['lname'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>BMS</title>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
</head>
<body style="background-color: #d3cbcb">
            <h2 class="text-center"><?php echo$id?>'s created Blog</h2>
    <div class="container-sm w-50">
            <?php
            echo $record_blog['post'];
            echo '<br>';
            while($record_blog =mysqli_fetch_array($search_blog)){
                echo $record_blog['post'];
                echo '<br>';
            }
            ?>
    </div>
<?php
require 'footer.php';
?>
</body>
</html>
