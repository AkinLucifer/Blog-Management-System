<?php

$connection = mysqli_connect('localhost','root','','project');

if(!$connection)
{
    echo 'Error'.mysqli_connect_error($connection);
}
