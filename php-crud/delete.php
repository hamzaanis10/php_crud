<?php
    include 'connection.php';
    $id = $_GET['deleteid'];

    $delete_query = "delete from add_user where id = $id";
    $result = mysqli_query($connection, $delete_query);

    if($result){
        header('location: display.php');
    }else{
        echo 'there is an error while deleting';
    }
?>