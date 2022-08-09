<?php
include 'profile.php';
if (isset($_POST['change'])) {
    $confirm = $_POST['confirm'];
    $new = $_POST['new'];
    if($new===$confirm){
        $new_hash =password_hash($new);
        $username = $row['username'];
        $sql = "select *from project.registration where username= '$username' ";
        $check = mysqli_query($connection, $sql);
        $record = mysqli_fetch_array($check);

            $change = "update project.registration
set password = '$new_hash'
where username = '$username';";
    }
    else{
        echo "<p>Confirm password doesn't match</p>";
    }
}
