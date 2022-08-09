<?php
session_start();
include 'database.php';
if(!empty($connection)) {
    if (isset($_POST['submit'])) {
        $username = $_POST['username'];
        $password = sha1($_POST['password']);

        /*Check if there is presence of same account or not*/
        $check_query = "select *from project.registration where username = '$username';";
        $verify_query = mysqli_query($connection, $check_query);
        $num = mysqli_num_rows($verify_query);

        if($num>0){
            $check_data = mysqli_fetch_array($verify_query);
            $pass_hash = $check_data['password'];
            $first_name = $check_data['fname'];
            $last_name = $check_data['lname'];
            $full_name = $first_name . " " . $last_name;
            $user_type = $check_data['user_type'];
            $user_id = $check_data['id'];


            /*Verification of password*/
            if($password==$pass_hash){
                if($user_type=='admin'){
                    header('Location:admin_page.php');
                }
                else{
                    header('Location:homepage.php');
                }
            }
            else{
                echo "<p class='text-center text-danger'>Password Doesn't Match.</p>";
                include 'index.html';
            }
        }
        else {
            echo '<p class="text-center text-danger">User not registered. Please go through sign up page or check the login .</p>';
            include 'index.html';
        }
        $_SESSION['FullName']= $full_name;
        $_SESSION['username'] = $username;

    }
}