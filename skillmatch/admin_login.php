<?php
session_start();
include "db.php";

if(isset($_POST['login'])){
    $u = $_POST['username'];
    $p = $_POST['password'];

    $q = mysqli_query($conn,"SELECT * FROM admin WHERE username='$u' AND password='$p'");
    if(mysqli_num_rows($q)==1){
        $_SESSION['admin']=$u;
        header("Location: admin_dashboard.php");
    } else {
        $error="Invalid Login";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Admin Login | SkillMatch</title>
<style>
body{background:#020617;font-family:Poppins;color:white;display:flex;justify-content:center;align-items:center;height:100vh;}
.box{background:#0f172a;padding:30px;border-radius:15px;width:300px;}
input,button{width:100%;padding:12px;margin-top:10px;border-radius:8px;border:none;}
button{background:#38bdf8;font-weight:bold;}
</style>
</head>
<body>
<div class="box">
<h2 align="center">Admin Login</h2>
<form method="post">
<input type="text" name="username" placeholder="Username" required>
<input type="password" name="password" placeholder="Password" required>
<button name="login">Login</button>
<p style="color:red"><?= $error ?? '' ?></p>
</form>
</div>
</body>
</html>
