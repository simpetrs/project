<?php
if (isset($_FILES['file']['name'])) {
    $file_name = $_FILES['file']['name'];
    $tmp_file = $_FILES['file']['tmp_name'];
    $extension = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
    $new_file_name = md5(time()) . "." . $extension;
    $size = filesize($tmp_file);
    $accepted_files = array("jpg", "jpeg", "png", "gif");
    if (in_array($extension, $accepted_files)) {
        if (move_uploaded_file($tmp_file, "assets/img/" . $new_file_name)) {
            mysqli_query($conn, "update user set photo = '$new_file_name' where user_Id = '" . $_SESSION['user_Id'] . "'") or die(mysqli_error($conn));
            $_SESSION['photo'] = $new_file_name;
        }
    }
}

if (isset($_GET['delete_pic'])) {
    session_start();
    if ($_SESSION['role'] == 1)
        $f = "admin";
    if ($_SESSION['role'] == 2)
        $f = 'admin';
    if ($_SESSION['role'] == 3)
        $f = 'farmer';
    include_once "config.php";
    $file_name = $_GET['delete_pic'];
    if ($file_name != 'profile.jpg'){
        $q = mysqli_query($conn, "select photo from user where user_Id = '" . $_SESSION['user_Id'] ."'") or die(mysqli_error($conn));
        if ($q) {
            unlink("$f/assets/img/" . $file_name);
            mysqli_query($conn, "update user set photo = 'profile.jpg' where user_Id = '" . $_SESSION['user_Id'] . "'") or die(mysqli_error($conn));
        }
    }
    $_SESSION['photo'] = "profile.jpg";
    header("location:" . $_SERVER['HTTP_REFERER']);
}