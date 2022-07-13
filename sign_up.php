<?php
session_start();
include 'database.php';

if (isset($_POST['submit'])) {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $contact = (int)$_POST['contact'];
    $gender = $_POST['gender'];
    $dob = $_POST['date_of_birth'];
    $username = $_POST['username'];
    $pass = $_POST['password'];
    $user_type = 'user';
    $confirm_password = $_POST['confirm_password'];
    $pass_hash = password_hash($pass,PASSWORD_BCRYPT);
    if(password_verify($confirm_password,$pass_hash)) {
        $sql = "insert into project.registration(fname, lname, dob, contact, gender, username, password, user_type)
            VALUES('$fname', '$lname', '$dob', $contact, '$gender', '$username', '$pass_hash', '$user_type') ";
        $insert = mysqli_query($connection,$sql);
        if($insert){
            header('Location:sign_in.html');
        }
    }
}