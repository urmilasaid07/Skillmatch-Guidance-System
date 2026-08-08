<?php
session_start();
require_once "db.php";

$error = "";

if (isset($_POST['login'])) {

    $email = trim($_POST['email']);
    $pass  = trim($_POST['password']);

    if (empty($email) || empty($pass)) {
        $error = "❌ Please fill all fields";
    } else {

        $stmt = $conn->prepare(
            "SELECT student_id, name, password FROM students WHERE email = ?"
        );

        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 1) {

            $row = $result->fetch_assoc();

            if (password_verify($pass, $row['password'])) {

                session_regenerate_id(true);

                $_SESSION['student_id']   = $row['student_id'];
                $_SESSION['student_name'] = $row['name'];

                header("Location: dashboard.php");
                exit();

            } else {
                $error = "❌ Invalid Email or Password";
            }

        } else {
            $error = "❌ Invalid Email or Password";
        }

        $stmt->close();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Login | SkillMatch</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">

<style>
body{
    margin:0;
    font-family:'Poppins',sans-serif;
    background:linear-gradient(135deg,#020617,#0f172a);
    min-height:100vh;
    display:flex;
    justify-content:center;
    align-items:center;
}
.login-box{
    background:#fff;
    padding:40px;
    width:100%;
    max-width:400px;
    border-radius:16px;
    box-shadow:0 25px 50px rgba(0,0,0,0.25);
}
.login-box h2{
    text-align:center;
    margin-bottom:10px;
}
input,button{
    width:100%;
    padding:12px;
    margin-top:12px;
    border-radius:8px;
    border:1px solid #cbd5e1;
}
button{
    background:#38bdf8;
    border:none;
    font-weight:600;
    cursor:pointer;
}
.error{
    background:#fee2e2;
    color:#b91c1c;
    padding:10px;
    border-radius:6px;
    margin-bottom:10px;
    text-align:center;
}
</style>
</head>

<body>

<div class="login-box">
    <h2>SkillMatch Login</h2>

    <?php if ($error) echo "<div class='error'>$error</div>"; ?>

    <form method="POST">
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit" name="login">Login</button>
    </form>
</div>

</body>
</html>
