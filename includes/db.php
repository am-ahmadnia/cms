<?php
    $dbhost = 'localhost';
    $dbuser = 'root';
    $dbpass = '';
    $dbname = 'cms';
    $connection = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
    if(!$connection){
        die("Connection failed!".mysqli_error($connection));
    }
    
?>