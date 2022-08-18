

<?php
include 'database.php';
include_once 'nav.php';

if(!empty($connection)||!empty($row)){
$fname = $row['fname'];
$lname = $row['lname'];
$dob = $row['dob'];
$contact = $row['contact'];
$gender = $row['gender'];
$username = $row['username'];
$FullName = $fname . ' '.$lname;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo $_SESSION['FullName'];?></title>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
</head>
<body>
<div class="container">
 <div class="row" style="margin-left: 10px; margin-top: 10px;">
     <div class="col-4">
         <form action="change_password.php" method="post">
         <div class="card">
             <!--<img src="./images/writer.png" class="card-img-top" alt="<?php echo'$username';?>">-->
             <div class="card-body">
                 <h5 class="card-title text-center" style=""><?php echo $FullName;?></h5>
                 <p class="card-text text-center" style="font-size:14px;">Change your password from here!</p>
                 <div class="row">
                     <div class="col">
                         <input type="password" class="form-control" name="new" id="" placeholder="New Password" autocomplete="off" required>
                     </div>
                     <div class="col">
                         <input type="password" class="form-control" name="confirm" id="" placeholder="Confirm Password" autocomplete="off" required>
                     </div>
                 </div>
             </div>
                 <input type="submit" class="btn btn-primary w-75" name="change" value="Change Password" required style="margin-bottom: 10px; margin-left: 45px;">
         </div>
             </form>
     </div>
     <div class="col-7">
         <div class="row mb-3">
             <div class="col">
                 <label for="first_name">First Name</label>
                 <input type="text" class="form-control text-center" name="first_name" value="<?php echo $fname;?>" disabled style="font-family:'Bell MT';font-size: 20px;">
             </div>
             <div class="col">
                 <label for="last_name">Last Name</label>
                 <input type="text" name="last_name" class="form-control text-center" value="<?php echo $lname;?>" disabled style="font-family:'Bell MT';font-size: 20px;">
             </div>
         </div>
         <div class="row mb-3">
             <div class="col">
                 <label for="contact">Contact</label>
                 <input type="text" name="contact" class="form-control text-center" value="<?php echo $contact;?>" disabled style="font-family:'Bell MT';font-size: 20px;">
             </div>
             <div class="col">
                 <label for="date_of_birth">Date of Birth</label>
                 <input type="text" name="date_of_birth" class="form-control text-center" value="<?php echo $dob;?>" disabled style="font-family:'Bell MT';font-size: 20px;">
             </div>
         </div>
         <div class="row mb-3">
             <div class="col">
                 <label for="Gender">Gender</label>
                 <input type="text" name="Gender" class="form-control text-center" value="<?php echo $gender;?>" disabled style="font-family:'Bell MT';font-size: 20px;">
             </div>
             <div class="col">
                 <label for="Username">Username</label>
                 <input type="text" name="Username" class="form-control text-center" value="<?php echo $username;?>" disabled style="font-family:'Bell MT';font-size: 20px;">
             </div>
         </div>
     </div>
 </div>
</div>
</body>
</html>