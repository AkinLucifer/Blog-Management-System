<?php
include 'database.php';
include 'sign_in.php';
$username = $_SESSION['FullName'];
$name = $_SESSION['username'];
if(!empty($connection)){
$sql = "select *from project.registration where username='$name'";
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
<style>
    * {
        margin:0;
        padding:0;
        box-sizing: border-box;
    }
    </style>
</head>
<body>
<section>
    <header >
        <nav class="navbar">
            <ul class="nav nav-pills nav-fill" style="margin-left: 10px;">
                <li class="nav-item nav-justified">
                    <a class="nav-link active text-black" aria-current="page">BMS</a>
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
                    if($user=='admin')
                    {
                        echo '<a href="admin_page.php" class="nav-link">Administrator</a>';
                    }
                    else{
                        echo '<a href="blogs.php" class="nav-link">Blogs</a>';
                    }
                    ?>
                </li>
            </ul>
            <ul class="nav nav-items">
                <li class="nav-item"><a class="nav-link disabled"><h4 style="text-align: end"><?php echo $username; ?></h4></a></li>
            </ul>
        </nav>

    </header>
</section>

</body>
</html>
