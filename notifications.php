<?php
session_start();
include "config.php";

function getPaymentsNotifications() {

}

function getPaymentNotification($conn) {
    $i = 1;
    $m = "";

    if ($_SESSION['role'] == 3)
        $data = mysqli_query($conn ,"select amount,receipt, appointment,date_added, status, (select name from user where user_Id = (select doctor from appointment where id = payments.appointment)) as doctor from  payments where user = '" . $_SESSION['user_Id'] ."' and status = 1") or die(mysqli_error($conn));
    elseif ($_SESSION['role'] == 1)
        $data = mysqli_query($conn ,"select amount,receipt, appointment,date_added, status, (select name from user where user_Id = (select doctor from appointment where id = payments.appointment)) as doctor from  payments where  status = 1") or die(mysqli_error($conn));

    if (! isset($data))
        return 1;
    $session = isset($_COOKIE['payments']) ? $_COOKIE['payments'] : 0;
    if ($session < mysqli_num_rows($data))
        setcookie("payments", mysqli_num_rows($data), time() + (86400 * 30));
    else return 1;
    while ($row = mysqli_fetch_array($data)) {
        $m .= "<tr>
            <td>" . $i++ . "</td>
            <td>" . $row['appointment'] . "</td>
            <td>" . $row['doctor'] . "</td>
            <td class=\"text-truncate\"> . ". $row['receipt'] . "</td>
            <td>" . number_format($row['amount']) . "</td>
            <td>" . $row['date_added'] . "</td>
            <td>" . ($row['status'] == 0 ? '<span class="badge bg-warning">Pending</span>' : ($row['status'] == 1 ? '<span class="badge bg-success">Completed</span>' : '<span class="badge bg-danger">Failed</span>')) . "</td>
        </tr>";
    }
    return $m;
}

function getMessages($conn) {
    $no =1;
    $session = isset($_COOKIE['messages']) ? $_COOKIE['messages'] : 0;
    $data = mysqli_query($conn, "select message, name, date_added, (select description from appointment where id = messages.appointment) as appointment from messages left join user on user.user_Id = messages.sender where receiver = '" .$_SESSION['user_Id']. "' order by id desc") or die(mysqli_error($conn));
    $message = "";
    if ($session < mysqli_num_rows($data))
        setcookie("messages", mysqli_num_rows($data), time() + (86400 * 30));
    else return 1;

    while ($rows = mysqli_fetch_array($data)) {
        $message .= "
      
        <tr>
            <td>" . $no++ ."</td>
            <td>" .$rows['name'] . "</td>
            <td>" . $rows['appointment'] ."</td>
            <td>" . $rows['message'] . "</td>
            <td>" . $rows['date_added'] . "</td>
        </tr>
        ";

    }
    return $message;
}

if (isset($_GET['messages']))
    echo json_encode(getMessages($conn));

if (isset($_GET['appointment']))
    echo json_encode(appointment($conn));

if (isset($_GET['payments']))
    echo json_encode(getPaymentNotification($conn));


if (isset($_GET['cases']))
    echo json_encode(diseases($conn));

function appointment($conn) {
    $i = 1;
    $data = "";
    $session = isset($_COOKIE['appointment']) ? $_COOKIE['appointment'] : 0;
    if ($_SESSION['role'] == 2)
        $query = mysqli_query($conn, "select id, doctor, _date, _time,(select status from payments where payments.appointment = appointment.id order by status desc limit 1) as payment, appointment, description, date_added, (select name from user where user_Id = user) as doctor_names from appointment where doctor = '" . $_SESSION['user_Id'] ."' order by id desc") or die(mysqli_error($conn));
    elseif ($_SESSION['role'] == 1)
        $query = mysqli_query($conn, "select id, doctor, _date, _time,(select status from payments where payments.appointment = appointment.id order by status desc limit 1) as payment, appointment, description, date_added, (select name from user where user_Id = user) as doctor_names from appointment where 1 order by id desc") or die(mysqli_error($conn));

    //return mysqli_num_rows($query);
    if ($session < mysqli_num_rows($query))
        setcookie("appointment", mysqli_num_rows($query), time() + (86400 * 30));
    else return 1;
    while ($row = mysqli_fetch_array($query)) {
        $data .= "
        <tr>
            <td>" . $i++ . "</td>
            <td>" . $row['doctor_names'] . "</td>
            <td>" . $row['_date'] . "</td>
            <td>" . $row['_time'] . "</td>
            <td>" . ($row['appointment'] == 1 ? '<b>Critical <i class="fa fa-exclamation-triangle text-danger"></i></b>' : 'Normal') . "</td>
            <td>" . $row['description'] . "</td>
            <td>" . $row['date_added'] . "</td>
            <td>" . ($row['payment'] == null ?'Pending<br/><button class="btn btn-outline-primary" onclick="makePayment(\'' . $row['id'] . '\', \'' . $row['doctor_names'] . '\')"><small>Complete Payment</small></button>' : ($row['payment'] == 1 ?'PAID' : "FAILED")) . "</td>
        </tr>";

    }
    return $data;
}

function diseases($conn) {
    $no = 1;
    $m = "";
    $user = $_SESSION['user_Id'];
    $session = isset($_COOKIE['diseases']) ? $_COOKIE['diseases'] : 0;
    $data = mysqli_query($conn, "select user, disease_case, animal_disease_cases.date_added, animal_disease_cases.location,animal_disease_cases.date_added, (select animal from animals where id = animal_disease_cases.animal) as animal, (select name from user where user_Id = animal_disease_cases.user) as farmer from animal_disease_cases order by id desc") or die(mysqli_error($conn));
    if ($session < mysqli_num_rows($data))
        //$_SESSION['diseases'] = mysqli_num_rows($data);
    setcookie("diseases", mysqli_num_rows($data), time() + (86400 * 30));
    else return 1;
    while ($row = mysqli_fetch_array($data)) {
        $m .= "
        <tr>
            <td>$no++</td>
            <td>" .$user == $row['user'] ?'Mine' : $row['farmer'] ."</td>
            <td>" . $row['location'] ."</td>
            <td>" . $row['animal'] ."</td>
            <td>" . $row['disease_case'] ."</td>
            <td>" . $row['date_added'] ."</td>
        </tr>";
    }
    return $m;
}
