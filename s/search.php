<?php
session_start();
if ($_SESSION['role'] == 1)
    include_once("../admin_header.php");
elseif ($_SESSION['role'] == 2)
    include_once("../header_doctor.php");
elseif ($_SESSION['role'] == 3)
    include_once "../header_doctor.php";
