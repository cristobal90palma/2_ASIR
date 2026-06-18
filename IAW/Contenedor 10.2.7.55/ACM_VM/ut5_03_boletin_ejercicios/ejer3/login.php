<?php

    include_once "bbdd.php";
    session_start();

    $user = $_POST['username'];
    $pass = $_POST['pass'];

    $conn = mysqli_connect($servidor, $user, $password, $bd);
    $sql = "select * from usuario where username='".$user."'";
    $resultado = mysqli_query($conn, $sql);
    

    try {

    } catch (Exception $e) {
        echo "ERROR: ".$e->getMessage();
    }

?>