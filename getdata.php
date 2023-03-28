<?php
    header('Content-Type:application/json');
    $con = new mysqli('localhost','u241698649_rao_enie','Independencia121','u241698649_posts');
    if($con->connect_error){
        die('Connection Failed: ' . $con->connect_error);
        echo 'fail';
    }
    $sql = "SELECT * FROM victima";
    $query = mysqli_query($con,$sql);
    $response = mysqli_fetch_all($query,MYSQLI_ASSOC);
    echo json_encode($response);
?>