<?php
include 'database.php';
if(!empty($connection)) {
    if (isset($_POST['submit'])) {
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $contact = (int)$_POST['contact'];
        $gender = $_POST['gender'];
        $dob = $_POST['date_of_birth'];
        $username = $_POST['username'];
        $password = sha1($_POST['password']);
        $user_type = 'user';

        /*check if the user contact is already registered or not*/
        $check_number_query = "select *from project.registration where contact=$contact";
        $check_number = mysqli_query($connection,$check_number_query);
        $check_number_count = mysqli_num_rows($check_number);

        if($check_number_count!=0){
            echo'<script>alert("Number is already registered");</script>';
            header('Location:sign_up.html');
        }
        else{
            /*Register entries inside the table*/
            $register_query = "insert into project.registration(fname, lname, dob, contact, gender, username, password, user_type)
values ('$fname','$lname','$dob','$contact','$gender','$username','$password','$user_type')";
            $register = mysqli_query($connection, $register_query);
            header('Location:index.html');
        }
    }
}