<?php
require 'config.php';

if(!$conn){
    die("connection failed".mysqli_connect_error());
}

if(!empty($_SESSION["id"])){
    header("Location: index.php");
  }
if(isset($_POST["btn"])){
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $cpassword = $_POST["cpassword"];
    $duplicate = mysqli_query($conn, "SELECT * FROM tb_user WHERE username = '$username' OR email= '$email'");
    if(mysqli_num_rows($duplicate)> 0){
        echo "<script> alert('Username or email has already taken.');</script>";
    }
    else{
        if($password == $cpassword){
            $query = "INSERT INTO tb_user VALUES('','$username','$email','$password')";
            mysqli_query($conn,$query);
            echo "<script> alert('Registration Successful.');</script>";
        }else{
            echo "<script> alert('Password Does Not Match');</script>";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css_files/login_register_styles.css">
    <title>Register</title>
</head>

<body>
    <div class="main">
        <div class="logos">
            <a href="index.php">
                <img src="logo.PNG" alt="Home">
            </a>
        </div>
        <div class="box2"><br><br>
            <div class="headers1">
                <h2>Register</h2><br><br>
            </div>

            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
                <div class="headers1"><label for="username">Username</label></div>
                <input type="text" id="username" name="username" required><br>
                <div class="headers1"><label for="email" >Email</label></div>
                <input type="text" id="email" name="email" style="" required><br>
                <div class="headers1"><label for="password">Password</label></div>
                <input type="password" id="password" name="password" required><br>
                <div class="headers1"><label for="pwd">Re-enter Password</label></div>
                <input type="password" id="cpassword" name="cpassword" required><br><br>
                <button type="submit" name="btn" class="btn">Create Your Account</button>
                <p>Already have an account? <a href="login.php">Sign-In</a></p>
            </form>
            
        </div>
    </div>
</body>

</html>