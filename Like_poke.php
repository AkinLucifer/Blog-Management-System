<?php
include "database.php";
include 'homepage.php';
$username = $_SESSION['UserName'];

if (isset($_GET['like_id'])) {
    if (!empty($connection)) {
        $id = $_GET['like_id'];



        $like_poke_sql = "update project.blog_action set `like`='0' where actor='$username'and post_id=$id";
        $like_poke_query = mysqli_query($connection, $like_poke_sql);
    }
    if ($like_poke_query) {
        echo '
            <script>
            window.location=homepage.php;
</script>
            ';
    }
}
