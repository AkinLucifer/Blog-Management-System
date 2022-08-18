<?php
include 'profile.php';
$username = $_SESSION['UserName'];
if(!empty($connection)) {
    if (isset($_POST['change'])) {
        $confirm = $_POST['confirm'];
        $new = $_POST['new'];
        if ($new == $confirm) {
            $new_hash = md5($new);
            $check_user_query = "select *from project.registration where username='$username'";
            $check_user = mysqli_query($connection,$check_user_query);
            if($check_user){
                $change_password_query = "update project.registration 
                                            set password='$new_hash'
                                            where username='$username'";
                $change_password = mysqli_query($connection,$change_password_query);
                if($change_password){
                    header('Location:profile.php');
                }
                else{
                    echo "<p class='text-danger text-center'>Password doesn't change</p>";
                }
            }
            else
            {
                echo "<p class='text-danger text-center'>User is not defined.</p>";
            }
        }
    }
}