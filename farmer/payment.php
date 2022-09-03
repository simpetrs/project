<?php
session_start();
include_once "config.php";
if (! isset($_SESSION['user_Id']))
    die("Session expired");
if (! isset($_POST['phone']))
    die("Something went wrong");
if (! isset($_POST['appointment']))
    die("Something went wrong");
$user = mysqli_query($conn, "select email, name from user where user_Id = '" . $_SESSION['user_Id'] ."'") or die(mysqli_error($conn));
$user = mysqli_fetch_array($user);
$email = $user['email'];
$_names = explode(" ", $user['name']);
$user = $_SESSION['user_Id'];
$amount = (int)$_POST['amount'];
$id = $_POST['appointment'];
$phone_number = str_replace(" ", "", str_replace("+", "", $_POST['phone']));
$payment_ref = hash("sha256", $email.$amount.time().rand(400,444) . $id . $user);

mysqli_query($conn, "insert into payments (user, amount, appointment, date_added, date_paid, receipt)
values('$user', '$amount', '$id', '" .date("Y-m-d") . "', '" . date("Y-m-d") . "', '$payment_ref')") or die(mysqli_error($conn));
$payment = json_decode(send_payment($amount, $email, $phone_number, $payment_ref, $_names));

header("location:pages-payment.php?status=" . ($payment->code) . "&message=" . urlencode($payment->message));
exit;

function send_payment($amount, $email, $phone_number, $reference, $names){
    $curl = curl_init();
    curl_setopt_array($curl, [
        CURLOPT_URL => 'https://boosteds.xyz/mm/collections',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS =>'{
        "first_name" : "' . $names[0] . '", "last_name" : "' . (isset($names[1])? $names[1]: '') . '",
        "request" : "mobile_money", "currency" : "UGX",
        "phone_number" : "' . $phone_number . '",
        "email_address" : "' . $email . '",
        "tx_ref" : "' . $reference . '",
        "call_back_url" :"verma.com",
        "amount": "' . $amount . '"}',
        CURLOPT_HTTPHEADER => [
            'Accept-Charset: utf-8',
            'Content-Type: application/json',
            'User-Access-Key:e9ac6bc84d2c30cc8b73d7299faf47af0503df6ac56cb024b71034fe1f38a95a',
            'Project-Sid:9b43ba9acaf9228b15a1ac6fe11e4f39812454eae1854610571ec756b35b7d69',
        ],

    ]);
    $response = curl_exec($curl);
    curl_close($curl);
    return $response;
}
