<?php
include 'profile.php';
if (isset($_POST['change'])) {
    $confirm = $_POST['confirm'];
    $new = $_POST['new'];
    $new_hash = password_hash($new, PASSWORD_BCRYPT);
    $username = $row['username'];
    $sql = "select *from project.registration where username= '$username' ";
    $check = mysqli_query($connection, $sql);
    $record = mysqli_fetch_array($check);
    if (!password_verify($confirm, $new_hash)) {
        echo '<p class="text-danger text-center">Confirm Password Doesnot Match</p>';
    } else {
        $change = "update project.registration
set password = '$new_hash'
where username = '$username';";
    }
}
