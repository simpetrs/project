<?php
session_start();
include "config.php";

function getPaymentsNotifications() {

}

function getPaymentNotification($conn) {
    $i = 1;
    $m = "";
    $data = mysqli_query($conn ,"select amount,receipt, appointment,date_added, status, (select name from user where user_Id = (select doctor from appointment where id = payments.appointment)) as doctor from  payments where user = '" . $_SESSION['role'] == 1 ? '' : $_SESSION['user_Id'] ."'") or die(mysqli_error($conn));
    $session = isset($_SESSION['payments']) ? $_SESSION['payments'] : 0;
    if ($session < mysqli_num_rows($data))
        $_SESSION['payments'] = mysqli_num_rows($data);
    else return 1;
    while ($row = mysqli_fetch_array($data)) {
        $m .= "<tr>
            <td>" . $i++ . "</td>
            <td>" . $row['appointment'] . "</td>
            <td>" . $row['doctor'] . "</td>
            <td class=\"text-truncate\"> . ". row['receipt'] . "</td>
            <td>" . number_format($row['amount']) . "</td>
            <td>" . $row['date_added'] . "</td>
            <td>" . ($row['status'] == 0 ? '<span class="badge bg-warning">Pending</span>' : ($row['status'] == 1 ? '<span class="badge bg-success">Completed</span>' : '<span class="badge bg-danger">Failed</span>')) . "</td>
        </tr>";
    }
    return $m;
}

function getMessages($conn) {
    $no =1;
    $session = isset($_SESSION['messages']) ? $_SESSION['messages'] : 0;
    $data = mysqli_query($conn, "select message, name, date_added, (select description from appointment where id = messages.appointment) as appointment from messages left join user on user.user_Id = messages.sender where receiver = '" .$_SESSION['user_Id']. "' order by id desc") or die(mysqli_error($conn));
    $message = "";
    if ($session < mysqli_num_rows($data))
        $_SESSION['messages'] = mysqli_num_rows($data);
    else return 1;

    while ($rows = mysqli_fetch_array($data)) {
        $message .= "
      
        <tr>n
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

//if (isset($_GET['payments']))
//    echo json_encode(getMessages($conn));
//
if (isset($GET['appointment']))
    echo json_encode(appointment($conn));

function appointment($conn) {
    $i = 1;
    $data = "";
    $session = isset($_SESSION['appointment']) ? $_SESSION['appointment'] : 0;
    $query = mysqli_query($conn, "select id, doctor, _date, _time,(select status from payments where payments.appointment = appointment.id order by status desc limit 1) as payment, appointment, description, date_added, (select name from user where user_Id = doctor) as doctor_names from appointment where user = '" . $_SESSION['user_Id'] ."' order by id desc") or die(mysqli_error($conn));
    if ($session < mysqli_num_rows($query))
        $_SESSION['appointment'] = mysqli_num_rows($query);
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
