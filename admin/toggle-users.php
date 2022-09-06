<?php
session_start();
if ($_SESSION['role'] != 1){
    header("location:../logout.php");
    exit;
}
include_once "../config.php";
if (isset($_GET['toggle']) and isset($_GET['user']) and isset($_SESSION['user_Id'])) {
    $role = $_GET['toggle'] == 1 ? 'doctor' : 'farmer';
    $user = $_GET['user'];
    mysqli_query($conn, "update user set user_Type = '$role' where user_Id = '$user'") or die(mysqli_error($conn));
    header("location:" . $_SERVER['HTTP_REFERER']); exit;
}

if (isset($_GET['delete'])) {
    $user = $_GET['user'];
    if ($user != $_SESSION['user_Id']) {
        $x = $_GET['delete'] == 'xx' ? 1 : 0;
        mysqli_query($conn, "update user set deleted = '$x' where user_Id = '$user'") or die(mysqli_error($conn));
    }
    header("location:" . $_SERVER['HTTP_REFERER']); exit;
}
