<?php
include 'database.php';
include 'sign_in.php';
$username = $_SESSION['FullName'];
$name = $_SESSION['username'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <Title></Title>
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
    <header>
        <nav class="navbar">
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">BMS</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">About Us</a>
                </li>

                <li class="nav-item ">
                    <a href="profile.php?profileid='.$username.'" class="nav-link ">Profile</a>
                </li>
            </ul>
            <ul class="nav nav-items">
                <li class="nav-item"><a class="nav-link disabled"><h4 style="text-align: end">Hello <?php echo $name; ?></h4></a></li>
                <img src="./images/avatar.png"  style="height: 50px; width: 50px;">
            </ul>
        </nav>

    </header>
</section>

</body>
</html>