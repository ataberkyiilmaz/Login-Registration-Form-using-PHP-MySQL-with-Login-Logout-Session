<?php
require 'config.php';
if(!empty($_SESSION["id"])){
  $id = $_SESSION["id"];
  $result = mysqli_query($conn,"SELECT *FROM tb_user WHERE id ='$id'");
  $row = mysqli_fetch_assoc($result);
}
else{
  header("Location: login.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css_files/layout_styles.css">
    <script src="/scripts/scripts.js"></script>
    <title>Home</title>
</head>

<body>
    <a href="login.php">Login</a>
    <a href="register.php">Register</a>
    <h1>Welcome <?php echo $row["username"]; ?></h1>
    <a href="logout.php">Logout</a>
    

</body>

</html>