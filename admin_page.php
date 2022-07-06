<?php


include 'database.php';
include 'sign_in.php';


if(!empty($connection)){
    $sql = "select *from project.registration where user_type = 'user'";
    $user_group = mysqli_query($connection, $sql);
    $num = mysqli_num_rows($user_group);
    if(!($num)){
        error_reporting(0);
        echo "Data not fetched";
    }
    else{
        $records = mysqli_fetch_array($user_group);

    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo $_SESSION['FullName'];?></title>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
</head>
<body>
<h1 class="text-center" style="color: crimson;">Welcome Back</h1>
<p class="text-center"><?php echo$_SESSION['username']; ?></p>
<div class="container-fluid ">
    <table class="table table-hover table-borderless">
        <tr>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Date of Birth</th>
            <th>Gender</th>
            <th>Contact</th>
            <th>Username</th>
            <th>Actions</th>
        </tr>
        <?php
        echo'<tr>';
        echo'<td>';
        echo $records['fname'];
        echo'</td>';
        echo'<td>';
        echo $records['lname'];
        echo'</td>';
        echo'<td>';
        echo $records['dob'];
        echo '</td>';
        echo'<td>';
        echo $records['gender'];
        echo '</td>';
        echo'<td>';
        echo $records['contact'];
        echo '</td>';
        echo'<td>';
        echo $records['username'];
        echo '</td>';
        echo'<td>';
        echo '<button type="submit"  class="btn btn-info"><a href="update.php?updateid='.$records['username'].'" class="text-light text-decoration-none" style="text-decoration: none;">Update</a></button>';
        echo '&nbsp;';
        echo '<button type="submit"  class="btn btn-danger"><a href="delete.php?deleteid='.$records['username'].'" class="text-light text-decoration-none" style="text-decoration: none;">Delete</a></button>';
        echo '</td>';
        echo'</tr>';
        while ($records = mysqli_fetch_array($user_group)){
            echo'<tr>';
            echo'<td>';
            echo $records['fname'];
            echo'</td>';
            echo'<td>';
            echo $records['lname'];
            echo'</td>';
            echo'<td>';
            echo $records['dob'];
            echo '</td>';
            echo'<td>';
            echo $records['gender'];
            echo '</td>';
            echo'<td>';
            echo $records['contact'];
            echo '</td>';
            echo'<td>';
            echo $records['username'];
            echo '</td>';
            echo'<td>';
            echo '<button type="submit"  class="btn btn-info"><a href="update.php?updateid='.$records['username'].'" class="text-light text-decoration-none" style="text-decoration: none;">Update</a></button>';
            echo '&nbsp;';
            echo '<button type="submit"  class="btn btn-danger"><a href="delete.php?deleteid='.$records['username'].'" class="text-light text-decoration-none" style="text-decoration: none;">Delete</a></button>';
            echo '</td>';
            echo'</tr>';
        }
        ?>
    </table>
    </table>
</div>
<div class="d-flex justify-content-center">
    <input type="button" value="Log out" class="btn btn-lg btn-warning text-white w-25" onclick="document.location='index.html'">
</div>
</body>
</html>