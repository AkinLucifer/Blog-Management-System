<?php

include "database.php";

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $contact = $_POST['contact'];
    if (!empty($connection)) {
        $sql = 'select *from project.registration';
        $verify = mysqli_query($connection, $sql);
        $row = mysqli_fetch_assoc($verify);

        if (!($username === $row['username'])) {
            echo 'User not have been registered';
        } else if (!($contact === $row['contact'])) {
            echo "Your registered contact not matched";
        } else {
            if ($row['user_type'] = 'admin') {
                echo "Sorry! You can't go through here";
            }
            header('Location:homepage.php');
        }
    }
}
