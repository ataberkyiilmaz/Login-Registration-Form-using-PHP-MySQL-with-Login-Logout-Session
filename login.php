<?php
require 'config.php';
if(!empty($_SESSION["id"])){
  header("Location: index.php");
}
if(isset($_POST["btn"])){
  $email = $_POST["email"];
  $password = $_POST["password"];
  $result = mysqli_query($conn, "SELECT * FROM tb_user WHERE email = '$email'");
  $row = mysqli_fetch_assoc($result);
  if(mysqli_num_rows($result) > 0){
    if($password == $row['password']){
      $_SESSION["login"] = true;
      $_SESSION["id"] = $row["id"];
      header("Location: index.php");
    }
    else{
      echo
      "<script> alert('Wrong Password'); </script>";
    }
  }
  else{
    echo
    "<script> alert('User Not Registered'); </script>";
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
    <title>Sign In</title>
</head>

<body>
    <div class="main">
        <div class="box1"><br><br>
            <div class="headers1">
                <h2>Sign In</h2><br><br>
            </div>

            <form action="" method="POST">
                <div class="headers1"><label for="email">Email</label></div>
                <input type="text" id="email" name="email" value="" required value =""><br>
                <div class="headers1"><label for="pwd">Password</label></div>
                <input type="password" id="password" name="password" value="" required value=""><br><br>
                <div class="checkbox">
                    <label><input type="checkbox"> Remember my password</label>
                </div><br>
                <button type="submit" class="btn" name="btn">Sign In</button>
                <p>Don't you have an account? <a href="register.php">Register</a></p>
            </form>
            
        </div>
    </div>
</body>

</html>