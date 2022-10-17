<?php
session_start();
@include 'config.php';

if(isset($_POST['submit'])){

    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = hash("sha256", $_POST['password']);

    $select = " SELECT * FROM user WHERE email='$email' AND password='$password' and deleted = 0 ";

    $result = mysqli_query($conn, $select) or die(mysqli_error($conn));

    if(mysqli_num_rows($result) > 0)
    {

        $row = mysqli_fetch_array($result);

        if($row['user_type'] == 'admin'){
              
            $_SESSION['names'] = $row['name'];
            $_SESSION['user_Id'] = $row['user_Id'];
            $_SESSION['role'] = 1;
            $_SESSION['photo'] = $row['photo'];
            header('location:admin/admin_page.php');

        }elseif($row['user_type'] == 'doctor'){
            $_SESSION['user_Id'] = $row['user_Id'];
            $_SESSION['names'] = $row['name'];
            $_SESSION['role'] = 2;
            $_SESSION['photo'] = $row['photo'];
            header('location:doctor/doctor_page.php');

        }elseif($row['user_type'] == 'farmer'){
            $_SESSION['user_Id'] = $row['user_Id'];
            $_SESSION['names'] = $row['name'];
            $_SESSION['role'] = 3;
            $_SESSION['photo'] = $row['photo'];
            header('location:farmer/farmer_page.php');
        } 

    }else{
        $error[] = 'Incorrect email or password';  
    }
    
};

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
    <!-- <link rel="stylesheet" href="css/mdb.min.css" /> -->
    <!-- Custom styles -->
    <!-- <link rel="stylesheet" href="css/style.css" /> -->
    <link rel="stylesheet" href="style.css" />
    <!-- <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css"> -->
</head>
<body>
 <div class="container">
       <div class="header">
         <h3 >Login </h3>
       </div>
                
  <form id="form" class="form" method="POST" onsubmit="return passwordValidation()">
               
  <?php
            if (isset($_GET['s'])) {
                ?>
                <div class="alert alert-success text-success">
                    Success fully created account. Kindly login
                </div>
            <?php
            }
            if(isset($error)){
               foreach($error as $error){
                   echo '<span class="error-msg">'.$error.'</span>';
               };
            };
           
           ?>

                  <!-- Email input -->
                <div class="form-control">
                    <input type="email" name="email" id="contact-email" placeholder="Email" onkeyup="validateEmail()" />
                    <span id="email-error"></span>
                  </div>
  
                 <!-- Password input -->
                 <div class="form-control">
                    <input type="password" name="password" id="contact-password" placeholder="Password" onkeyup="validatePassword()"/>
                    <span id="password-error"></span>
                  </div>
  
                <!-- Submit button -->
                <button type="submit" name="submit" onclick="return validateForm()">Login</button>
                <span id="submit-error"></span>
<br>
<div class="row mb-4">
                  <p>Don't have an Account? <a href="register.php">Register Now</a></p>
                </div>
                
              
  </form>
 </div>
    <!-- <script type="text/javascript" src="js/mdb.min.js"></script> -->
    <!-- Custom scripts -->
    <!-- <script type="text/javascript" src="js/script.js"></script> -->
    <script src="script.js"></script>
</body>
</html>