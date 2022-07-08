<?php
include 'sign_in.php';
session_unset();
session_destroy();

header('Location:sign_in.html');