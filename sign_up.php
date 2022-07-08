<?php
session_start();
include 'database.php';

if (isset($_POST['submit'])) {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $contact = $_POST['contact'];
    $gender = $_POST['gender'];
    $dob = $_POST['date_of_birth'];
    $username = $_POST['username'];
    $pass = $_POST['password'];
    $user_type = 'user';
    $confirm_password = $_POST['confirm_password'];
    $password = password_hash($pass, PASSWORD_BCRYPT);
        $sql = "INSERT INTO project.registration (fname, lname, dob, contact, gender, username, password, user_type)
    VALUES ('$fname','$lname','$dob','$contact','$gender','$username','$password','$user_type')";
        if (!empty($connection)) {
            $insert = mysqli_query($connection, $sql);
            if ($password !== $confirm_password) {
                echo "Confirm Password Doesn't Match";
            }
            if (!$insert) {
                echo 'Data not entered' . mysqli_error($connection);
            } else {
                header('Location:sign_up.html');
            }
        }
    }