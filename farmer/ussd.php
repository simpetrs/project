<?php
// Read the variables sent via POST from our API
$sessionId   = $_POST["sessionId"];
$serviceCode = $_POST["serviceCode"];
$phoneNumber = $_POST["phoneNumber"];
$text        = $_POST["text"];

if ($text == "") {
    // This is the first request. Note how we start the response with CON
    $response  = "CON VERMS Services \n";
    $response .= "1. Report Case \n";
    $response .= "2. Make Appointment";

} else if ($text == "1") {
    // Business logic for first level response
    $response = "CON Choose animal you want to report on \n";
    $response .= "1. Goat \n";
    $response .= "2. Cow \n";
    $response .= "3. Sheep \n";
    $response .= "4. Pig ";

} else if ($text == "2") {
    // Business logic for first level response
    // This is a terminal request. Note how we start the response with END
    $response  = "CON Appointment Type \n";
    $response .= "1. Emergency \n";
    $response .= "2. Not Emergency";

    // $app1  = "Emergency";
    // $app2  = "Not Emergency";

   // This is a terminal request. Note how we start the response with END
//    $response = "END You have successfully made an appointment";


} else if($text == "1*1"){
    $response  = "CON Case \n";
    $response .= "1. General Weakness \n";
    $response .= "2. Vaccination";

} else if($text == "1*2"){
    $response  = "CON Case \n";
    $response .= "1. General Weakness \n";
    $response .= "2. Vaccination";

} else if($text == "1*3"){
    $response  = "CON Case \n";
    $response .= "1. General Weakness \n";
    $response .= "2. Vaccination";

} else if($text == "1*4"){
    $response  = "CON Case \n";
    $response .= "1. General Weakness \n";
    $response .= "2. Vaccination";
 
    
}

// Echo the response back to the API
header('Content-type: text/plain');
echo $response;



