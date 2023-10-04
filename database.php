<?php
    session_start();
    
    $connection = new mysqli("localhost", "root", "", "project");
    if (mysqli_errno($connection))
    {
        die(mysqli_error($connection));
    }
?>