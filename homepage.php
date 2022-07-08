<<<<<<< HEAD
<?php
error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>BMS</title>
</head>
<body>
<?php require 'nav.php';
$user=$row['user_type'];
?>
<?php
if ($user=='user'){
echo '<div class="input-group w-50 " style="margin-left:400px;">';
  echo'<input type="text" class="form-control text-center" placeholder="What is on your mind?" aria-label="What is on your mind?" aria-describedby="button-addon2" style="width: 50px; height:50px;">';
    echo'<button class="btn btn-outline-secondary" type="button" id="button-addon2">Post</button>';
echo'</div>';}
?>
<div class="container-fluid  w-100 m-1">
</div>
</body>
<?php
require 'footer.php';
?>
</html>

=======
<?php
error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>BMS</title>
</head>
<body>
<?php require 'nav.php';
$user=$row['user_type'];
?>
<?php
if ($user=='user'){
echo '<div class="input-group w-50 " style="margin-left:400px;">';
  echo'<input type="text" class="form-control text-center" placeholder="What is on your mind?" aria-label="What is on your mind?" aria-describedby="button-addon2" style="width: 50px; height:50px;">';
    echo'<button class="btn btn-outline-secondary" type="button" id="button-addon2">Post</button>';
echo'</div>';}
?>
<div class="container-fluid  w-100 m-1">
</div>
</body>
<?php
require 'footer.php';
?>
</html>

>>>>>>> 84e9b46788ecc4199ca7a8b3600eee9b925f9a7a
