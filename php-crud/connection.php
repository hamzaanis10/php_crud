<?php
    $server = 'localhost';
    $username = 'root';
    $password = '';
    $dbname = 'crudoperation';

    $connection = mysqli_connect($server, $username, $password, $dbname);


    if(!$connection){
        echo 'Does not connect to database';
    }
?>