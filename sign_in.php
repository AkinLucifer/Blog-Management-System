<?php

include 'database.php';
session_start();
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

$_SESSION['username'] = $username;
   if (!empty($connection)) {
        $query = "select *from project.registration where username = '$username';";
        $verify = mysqli_query($connection, $query);
        $num = mysqli_num_rows($verify);
        if ($num != 0) {
            $row = mysqli_fetch_assoc($verify);
            $user_type = $row['user_type'];
            $fname = $row['fname'];
            $lname = $row['lname'];
            $pass = $row['password'];
            $pass_verify = password_verify($pass, $password);
            if ($username = '' & $password = '') {
                echo"Login Credential is empty";
            } else {
                if (!$row) {
                    error_reporting(0);
                    echo 'Wrong Login Credential';
                } else {
                    if ($pass) {
                        if ($user_type == 'admin') {

                            header('Location:admin_page.php');
                        } else {
                            header('Location:homepage.php');
                        }
                        $_SESSION['FullName'] = $fname . " " . $lname;
                        $_SESSION['Username'] = $username;
                    }
                }
            }
        }
    }
}