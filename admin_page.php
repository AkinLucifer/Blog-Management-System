
<?php
require 'nav.php';
    if (!empty($connection)) {
        $sql = "select *from project.registration where user_type = 'user'";
        $user_group = mysqli_query($connection, $sql);
        $num = mysqli_num_rows($user_group);
        $records = mysqli_fetch_array($user_group);
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
<p class="text-center"><?php echo$_SESSION['UserName']; ?></p>
<div class="container d-flex justify-content-center">
    <?php
    if($num) {
        echo '<table class="table table-striped table-hover table-borderless ">
        <tr>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Date of Birth</th>
            <th>Gender</th>
            <th>Contact</th>
            <th>Username</th>
            <th>Actions</th>
        </tr>
        <tr>
        <td>';
        echo $records['fname'];
        echo '</td>
        <td>';
        echo $records['lname'];
        echo '</td>
        <td>';
        echo $records['dob'];
        echo '</td>
        <td>';
        echo $records['gender'];
        echo '</td>
        <td>';
        echo $records['contact'];
        echo '</td>
        <td>';
        echo $records['username'];
        echo '</td>';
        echo ' <td>
        <button type="submit"  class="btn btn-info"><a href="info.php?infoid=' . $records['id'] . '" class="text-light text-decoration-none" style="text-decoration: none;">Info</a></button>
        &nbsp;
        <button type="submit"  class="btn btn-danger"><a href="delete.php?deleteid=' . $records['id'] . '" class="text-light text-decoration-none" style="text-decoration: none;">Delete</a></button>
        </td>
       </tr>';
        while ($records = mysqli_fetch_array($user_group)) {
            echo '</tr>
        <tr>
        <td>';
            echo $records['fname'];
            echo '</td>
        <td>';
            echo $records['lname'];
            echo '</td>
        <td>';
            echo $records['dob'];
            echo '</td>
        <td>';
            echo $records['gender'];
            echo '</td>
        <td>';
            echo $records['contact'];
            echo '</td>
        <td>';
            echo $records['username'];
            echo '</td>';
            echo ' <td>
        <button type="submit"  class="btn btn-info"><a href="info.php?infoid=' . $records['id'] . '" class="text-light text-decoration-none" style="text-decoration: none;">Info</a></button>
        &nbsp;
        <button type="submit"  class="btn btn-danger"><a href="delete.php?deleteid=' . $records['id'] . '" class="text-light text-decoration-none" style="text-decoration: none;">Delete</a></button>
        </td>
       </tr>';
        }
        echo '</table>';
    }
        else{
            echo'<p  style="font-size: 30px; color: #6a1a21;">No Data were Found</p>';
        }
        ?>
</div>

</body>
</html>