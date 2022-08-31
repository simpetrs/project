<?php

@include 'config.php';

if(isset($_POST['submit'])){

    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];  
    $user_type = $_POST['user_type'];

    $select = " SELECT * FROM user WHERE email='$email' && password='$password' ";

    $result = mysqli_query($conn, $select);

    if(mysqli_num_rows($result) > 0){

        $error[] = 'User already exist!';

    }else{

        if($password != $cpassword){
            $error[] = 'Password not matched!';
        }else{
            $insert = "INSERT INTO user(name, email, phone, password, user_type) VALUES('$name', '$email', '$phone', '$password', '$user_type')";    
            mysqli_query($conn, $insert);
            header('location:index.php');
        }
    
    }
};

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
    <div class="form-container">

        <form action="" method="POST">
        <h3>CREATE YOUR ACCOUNT</h3>
            <hr>

            <?php
            
             if(isset($error)){
                foreach($error as $error){
                    echo '<span class="error-msg">'.$error.'</span>';
                };
             };
            
            ?>

            <input type="text" name="name" placeholder="Enter your name" required>
            <input type="email" name="email" placeholder="Enter your email" required>
            <input type="phone" name="phone" placeholder="Enter your phone number" required>
            <input type="password" name="password" placeholder="Enter your password" required>
            <input type="cpassword" name="cpassword" placeholder="Comfirm your password" required>
            <select name="user_type">
                <option value="type">Select UserType</option>
                <option value="admin">Admin</option>
                <option value="doctor">Doctor</option>
                <option value="farmer">Farmer</option>
            </select>
            <input type="submit" name="submit" value="register now" class="form-btn">
            <p>Already have an Account? <a href="index.php">Login Now</a></p>
        </form>

    </div>
</body>
</html>