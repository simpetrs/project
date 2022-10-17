<?php

@include 'config.php';

if(isset($_POST['submit'])){
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $password = hash("sha256", $_POST['password']);
    $cpassword = hash("sha256", $_POST['cpassword']);
    $select = " SELECT * FROM user WHERE email='$email'  ";
    $result = mysqli_query($conn, $select); 


    if(mysqli_num_rows($result) > 0){
        $error[] = 'User already exist!';
    }else{
        if($password != $cpassword){
            $error[] = 'Password not matched!';
        }else{
            $insert = mysqli_query($conn,"INSERT INTO user(`name`, `email`, `phone`, `password`, `user_type`) VALUES('$name', '$email', '$phone', '$password', 'farmer')");
            
            if(!$insert){
            $error[]= "ddddddddddd".mysqli_error($conn);
            }else{
            header('location:./index.php?s=success');
            }
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>VERMS</title>
     <!-- Favicons -->
     <link href="../logo.png" rel="icon">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css" />
    <!-- Google Fonts Roboto -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" />
    <!-- MDB -->
    <link rel="stylesheet" href="style.css" />
</head>
<body>
 <div class="container">
       <div class="header">
         <h3 >Create Your Account</h3>
       </div>
                
  <form id="form" class="form" method="POST" onsubmit="return passwordValidation()">
               
               <?php
                if(isset($error)){
                   foreach($error as $error){
                       echo '<span class="error-msg">'.$error.'</span>';
                   };
                };
               ?>

                <!-- name input -->
                <div class="form-control">
                    <input type="text" name="name" id="contact-name" placeholder="Full Name" onkeyup="validateName()"/>
                    <span id="name-error"></span>
                  </div>

                  <!-- Email input -->
                <div class="form-control">
                    <input type="email" name="email" id="contact-email" placeholder="Email" onkeyup="validateEmail()" />
                    <span id="email-error"></span>
                  </div>
  
                <!-- Phone input -->
                <div class="form-control">
                  <input type="text" name="phone" id="contact-phone" placeholder="Phone: 07********" onkeyup="validatePhone()"/>
                  <span id="phone-error"></span>
                </div>

                 <!-- Password input -->
                 <div class="form-control">
                    <input type="password" name="password" id="contact-password" placeholder="Password" onkeyup="validatePassword()"/>
                    <span id="password-error"></span>
                  </div>
  
                <!-- Password input -->
                <div class="form-control">
                  <input type="password" name="cpassword" id="contact-cpassword" placeholder="Confirm password" onkeyup="validateCpassword()"/>
                  <span id="cpassword-error"></span>
                </div>
                <!-- Submit button -->
                <button type="submit" name="submit" onclick="return validateForm()">Sign Up</button>
                <span id="submit-error"></span>
<br>
                <div class="row mb-4">
                  <p>Already have an Account? <a href="index.php">Login In</a></p>
                </div>
              
  </form>
 </div>
    <!-- <script type="text/javascript" src="js/mdb.min.js"></script> -->
    <!-- Custom scripts -->
    <!-- <script type="text/javascript" src="js/script.js"></script> -->
    <script src="script.js"></script>
</body>
</html>