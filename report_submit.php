<?php

include 'database.php';
if (!empty($connection)) {
    if (isset($_POST['report'])) {
        $username = $_POST['username'];
        echo $username;
        $id = $_POST['id'];
        echo $id;
        $reason = $_POST['reason'];
        echo $reason;

        /*Search user's details*/
        $search_user_query = "select *from project.registration where username='$username'";
        $search_user = mysqli_query($connection, $search_user_query);
        $search_user_record = mysqli_fetch_array($search_user);
        $user_id = $search_user_record['id'];


        $report_query = "insert into project.report(post_id, report_users, report_users_id, reason)
                            values($id,'$username',$user_id,'$reason')";
        $report = mysqli_query($connection, $report_query);
        if ($report) {
            header('Location:homepage.php');
        }
    }
}