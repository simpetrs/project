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
            $insert = "INSERT INTO user(name, email, phone, password, user_type) VALUES('$name', '$email', '$phone', '$password', 'farmer')";
            mysqli_query($conn, $insert);
            header('location:./index.php?s=success');
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
            <input type="text" name="phone" placeholder="Enter your phone number" required>
            <input type="password" name="password" placeholder="Enter your password" required>
            <input type="password" name="cpassword" placeholder="Comfirm your password" required>
            <input type="submit" name="submit" value="register now" class="form-btn">
            <p>Already have an Account? <a href="index.php">Login Now</a></p>
        </form>

    </div>
</body>
</html>