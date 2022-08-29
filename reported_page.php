<?php
include 'database.php';
include 'nav.php';

if (!empty($connection)) {

    $check_report_query = "select *from project.report";
    $check_report = mysqli_query($connection, $check_report_query);
    $check_report_num = mysqli_num_rows($check_report);


    if ($check_report_num) {
        if ($user === 'admin') {
            $check_report_record = mysqli_fetch_assoc($check_report);

            /*check the reported post with the user post*/
            $post_id = $check_report_record['post_id'];
            $post_search_query = "select *from project.blog where post_id = $post_id";
            $post_search = mysqli_query($connection, $post_search_query);
            $post_search_record = mysqli_fetch_array($post_search);

            echo '<div class="container">
            <div class="card">
              <div class="card-header">
                ' . $post_search_record['creator'] . '
              </div>
              <div class="card-body">
                <blockquote class="blockquote mb-0">
                  <p>' . $post_search_record['post'] . '</p>
                  <footer class="blockquote-footer">' . $check_report_record['reason'] . '<cite title="Source Title"> (' . $check_report_record['report_users'] . ')</cite></footer>
                </blockquote>
                <a href=delete_post.php?deleteid=' . $check_report_record['post_id'] . ' class="btn btn-danger mt-2">Delete</a>
              </div>
            </div>
            </div>
            ';

            while ($post_search_record = mysqli_fetch_array($post_search)) {
                echo '
            <div class="card mt-3">
              <div class="card-header">
                ' . $post_search_record['creator'] . '
              </div>
              <div class="card-body">
                <blockquote class="blockquote mb-0">
                  <p>' . $post_search_record['post'] . '</p>
                  <footer class="blockquote-footer">' . $check_report_record['reason'] . '<cite title="Source Title"> (' . $check_report_record['report_users'] . ')</cite></footer>
                </blockquote>
                 <a href=delete_post.php?deleteid=' . $check_report_record['post_id'] . ' class="btn btn-danger mt-2">Delete</a>
              </div>
            </div>
            ';
            }
        }
    } else {
        echo "<div class='container'>
            <h4 class='text-center' style='color: #0fd1e1;'>No Data Were Found</h4>
        </div>";
    }
}