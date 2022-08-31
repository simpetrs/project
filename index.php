<?php

@include 'config.php';

session_start();

if(isset($_POST['submit'])){

    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = $_POST['password'];

    $select = " SELECT * FROM user WHERE email='$email' AND password='$password' ";

    $result = mysqli_query($conn, $select);

    if(mysqli_num_rows($result) > 0)
    {

        $row = mysqli_fetch_array($result);

        if($row['user_type'] == 'admin'){
              
            $_SESSION['admin_name'] = $row['name'];
            header('location:admin/admin_page.php');

        }elseif($row['user_type'] == 'doctor'){

            $_SESSION['doctor_name'] = $row['name'];
            header('location:doctor/doctor_page.php');

        }elseif($row['user_type'] == 'farmer'){
            
            $_SESSION['farmer_name'] = $row['name'];
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
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
    <div class="form-container">

        <form action="" method="POST">
            <h3>LOGIN TO YOUR ACCOUNT</h3>
            <hr>

            <?php
            
            if(isset($error)){
               foreach($error as $error){
                   echo '<span class="error-msg">'.$error.'</span>';
               };
            };
           
           ?>

            <input type="email" name="email" placeholder="Enter your email" required>
            <input type="password" name="password" placeholder="Enter your password" required>
            <input type="submit" name="submit" value="login" class="form-btn">
            <p>Don't have an Account? <a href="register.php">Register Now</a></p>
        </form>

    </div>
</body>
</html> 