<?php
include "config.php";

function get_pending_txs($con) {
    $query = mysqli_query($con, "select id, receipt from payments where status = 0") or die(mysqli_error($con));
    while($row = mysqli_fetch_array($query)) {
        $data = send_payload($row['receipt']);
        if (! $data->message->code)
            continue;
        $status = $data->message->code;
        if ($status == 200) {
            $s = 0;
            if (! isset($data->message->status))
                continue;
            if ($data->message->status == "FAILED")
                $s = 2;
            if ($data->message->status == "SUCCESSFUL")
                $s = 1;
            mysqli_query($con, "update payments set status = '$s' where id = '" . $row['id'] ."'") or die(mysqli_error($con));
        }
    }
}

get_pending_txs($conn);


function send_payload($tx) {
    $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://boosteds.xyz/tx/get_transaction',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS =>'{"tx" : "' . $tx . '"}',
        CURLOPT_HTTPHEADER => array(
            'User-Access-Key: e9ac6bc84d2c30cc8b73d7299faf47af0503df6ac56cb024b71034fe1f38a95a',
            'Project-Sid: 9b43ba9acaf9228b15a1ac6fe11e4f39812454eae1854610571ec756b35b7d69',
            'Accept-Charset: utf-8',
            'Content-Type: application/json',
            'Cookie: PHPSESSID=7vgqgkqugc2ft4nbkb25amm4gf'
        ),
    ));

    $response = curl_exec($curl);

    curl_close($curl);
    return json_decode($response);

}
