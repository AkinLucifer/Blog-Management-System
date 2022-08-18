<?php
include 'database.php';


if(isset($_POST['submit'])){
if(!empty($connection)){

    $reason = $_POST['reason'];
    $id = $_POST['id'];
    $username =$_POST['username'];



        /*Check user's detail*/
        $check_user_query = "select *from project.registration where username='$username'";
        $check_user = mysqli_query($connection, $check_user_query);
        $check_user_record = mysqli_fetch_array($check_user);
        $user_id = $check_user_record['id'];

        /*Insert into report table*/
        $report_query = "insert into project.report(post_id, report_users, report_users_id, reason)
                            values($id,'$username',$user_id,'$reason') ";
        $report = mysqli_query($connection,$report_query);

}
}