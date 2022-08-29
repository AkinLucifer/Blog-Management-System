<?php
include 'database.php';
include 'sign_in.php';
$name = $_SESSION['FullName'];
$username = $_SESSION['UserName'];
$letter =$_SESSION['Name'];
if(!empty($connection)){
$sql = "select *from project.registration where username='$username'";
$check = mysqli_query($connection,$sql);
$row = mysqli_fetch_array($check);
$user = $row['user_type'];
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <Title>BMS</Title>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
</head>
<body>
<section>
    <header>
        <nav class="navbar">
            <ul class="nav nav-pills nav-fill ms-3">
                <li class="nav-item nav-justified">
                    <a class="nav-link active text-white" aria-current="page">BMS</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="homepage.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="about_us.php">About Us</a>
                </li>

                <li class="nav-item ">
                    <a href="profile.php" class="nav-link ">Profile</a>
                </li>
                <li class="nav-item ">
                    <?php
                    if ($user == 'admin') {
                        echo '
                            <li class="nav-item">
                            <a href="admin_page.php" class="nav-link">Administrator</a>
                            </li>
                            <li class="nav-item">
                            <a href="reported_page.php" class="nav-link">Reports</a>
                            </li>';
                    } else {
                        echo '<a href="user_blog.php" class="nav-link">Blogs</a>
                        <li class="nav-item ">
                    <a href="reported_page.php" class="nav-link ">Reported</a>
                </li>';
                    }
                    ?>
                </li>
                <li class="nav-item">
                    <a href="log_out.php" class="nav-link">Log Out</a>
                </li>
            </ul>
            <ul class="nav nav-items">
                <li class="nav-item">
                    <a class="nav-link disabled"><h4 style="text-align: end;" >

                            <?php echo $letter; ?></h4></a></li>

            </ul>
        </nav>

    </header>
</section>

</body>
</html>
