<?php
include 'database.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">


    <title>BMS </title>


    <link href="./css/bootstrap.min.css" rel="stylesheet" type="text/css">
</head>
<body>
<div class="container-sm w-75">
    <h1 class="text-center my-5">Blog</h1>
    <form method="POST" action="post.php">
        <div class="form-floating mt-5 mb-5">
            <input type="text" name="title" class="form-control" id="floatingInput" placeholder="title">
            <label for="floatingInput">Title</label>
        </div>

        <div class="form-floating mb-5 mt-5">
            <textarea class="form-control" name="short_desc" id="exampleFormControlTextarea1" maxlength="30"
                      placeholder="short"></textarea>
            <label for="exampleFormControlTextarea1">Short Description</label>
        </div>
        <div class="form-floating mt-5 mb-5">
            <textarea class="form-control" name="full_post" id="exampleFormControlTextarea2" placeholder="post"
                      style="height: 150px;"></textarea>
            <label for="exampleFormControlTextarea2">Full Post</label>
        </div>
        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
</body>
</html>

