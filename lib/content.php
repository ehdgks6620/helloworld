<?php 
    $a = "localhost";
    $b = "root";
    $c = "000325";
    $d = "namu";
    $connect = mysqli_connect($a,$b,$c,$d);
    session_start();
    $user_id="";
    $user_nick ="";
    if(isset($_SESSION['id'])&&isset($_SESSION['nick'])){
        $user_id = $_SESSION['id'];
        $user_nick = $_SESSION['nick'];
    }
    
    
?>