<?php
include 'database.php';

    if(isset($_POST['reset'])) {
        if(!empty($connection)) {
            $username =$_POST['username'];
            $contact = $_POST['contact'];
            $check_user_in_database_query= "select *from project.registration where username='$username'";
            $check_user_in_database=mysqli_query($connection,$check_user_in_database_query);
            $check_user_in_database_count = mysqli_num_rows($check_user_in_database);
            if($check_user_in_database_count!=0){
                $check_user_in_database_details = mysqli_fetch_array($check_user_in_database);


                $contact_in_database = $check_user_in_database_details['contact'];
                $username = $check_user_in_database_details['username'];
                $firstname =$check_user_in_database_details['fname'];
                $lastname =$check_user_in_database_details['lname'];
                $full_name = $firstname . " " . $lastname;
                $firstname_array = str_split($firstname);
                $lastname_array = str_split($lastname);
                $name_letter = $firstname_array[0].$lastname_array[0];

                if($contact=$contact_in_database){
                    header('Location:profile.php');
                }
                else{
                    include "forgot_password.html";
                    echo"<p class='text-center text-danger'>Contact couldn't be found on the specified user.</p>";
                }
            }
            else{
                include "forgot_password.html";
                echo'<p class="text-center text-danger">User has not been registered</p>';
            }
        }
    }