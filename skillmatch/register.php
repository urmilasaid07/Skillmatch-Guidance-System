<?php
include "db.php";

if (isset($_POST['register'])) {

    $name  = trim($_POST['name']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    // NAME VALIDATION
    if (!preg_match("/^[a-zA-Z ]+$/", $name)) {
        $error = "❌ Name should contain only letters and spaces!";
    }

    // EMAIL VALIDATION
    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "❌ Invalid email format!";
    }

    // PASSWORD VALIDATION
    elseif (strlen($password) < 6) {
        $error = "❌ Password must be at least 6 characters!";
    }

    // ADVANCED PASSWORD (optional - strong password)
    elseif (!preg_match("/[A-Z]/", $password) || 
            !preg_match("/[0-9]/", $password)) {
        $error = "❌ Password must contain at least 1 uppercase letter and 1 number!";
    }

    else {

        $name  = mysqli_real_escape_string($conn, $name);
        $email = mysqli_real_escape_string($conn, $email);
        $pass  = password_hash($password, PASSWORD_DEFAULT);

        // CHECK EMAIL EXISTS
        $check = mysqli_query($conn, "SELECT student_id FROM students WHERE email='$email'");

        if (mysqli_num_rows($check) > 0) {
            $error = "❌ Email already registered!";
        } else {

            $insert = mysqli_query(
                $conn,
                "INSERT INTO students (name, email, password)
                 VALUES ('$name', '$email', '$pass')"
            );

            if ($insert) {
                header("Location: login.php");
                exit();
            } else {
                $error = "❌ Registration failed!";
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Register | SkillMatch</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">

<style>
:root{
    --primary:#0f172a;
    --secondary:#38bdf8;
    --bg:#f1f5f9;
}

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:'Poppins',sans-serif;
}

body{
    background:linear-gradient(135deg,#020617,#0f172a);
    min-height:100vh;
}

/* NAVBAR */
header{
    background:var(--primary);
    padding:16px 70px;
    display:flex;
    justify-content:space-between;
    align-items:center;
}

header h1{
    color:var(--secondary);
    font-size:28px;
    font-weight:700;
}

nav a{
    color:#e5e7eb;
    text-decoration:none;
    margin-left:30px;
    font-weight:500;
    transition:0.3s;
}

nav a:hover{
    color:var(--secondary);
}

/* REGISTER BOX */
.container{
    display:flex;
    justify-content:center;
    align-items:center;
    min-height:calc(100vh - 80px);
}

.register-box{
    background:white;
    width:100%;
    max-width:420px;
    padding:40px;
    border-radius:18px;
    box-shadow:0 25px 60px rgba(0,0,0,0.25);
    animation:fadeUp 0.6s ease;
}

@keyframes fadeUp{
    from{opacity:0; transform:translateY(40px);}
    to{opacity:1; transform:translateY(0);}
}

.register-box h2{
    text-align:center;
    color:var(--primary);
    margin-bottom:8px;
}

.subtitle{
    text-align:center;
    color:#64748b;
    margin-bottom:25px;
    font-size:14px;
}

input{
    width:100%;
    padding:14px 16px;
    margin-bottom:15px;
    border-radius:10px;
    border:1px solid #cbd5e1;
    outline:none;
    font-size:14px;
}

input:focus{
    border-color:var(--secondary);
    box-shadow:0 0 8px rgba(56,189,248,0.4);
}

button{
    width:100%;
    padding:14px;
    background:var(--secondary);
    border:none;
    border-radius:12px;
    font-weight:600;
    font-size:16px;
    cursor:pointer;
    transition:0.3s;
}

button:hover{
    transform:translateY(-3px);
    box-shadow:0 12px 25px rgba(56,189,248,0.4);
}

.error{
    background:#fee2e2;
    color:#b91c1c;
    padding:10px;
    border-radius:8px;
    margin-bottom:15px;
    text-align:center;
    font-size:14px;
}

.login-link{
    text-align:center;
    margin-top:15px;
    font-size:14px;
}

.login-link a{
    color:var(--secondary);
    text-decoration:none;
    font-weight:600;
}
</style>
</head>

<body>

<header>
    <h1>SkillMatch</h1>
    <nav>
        <a href="index.php">Home</a>
        <a href="login.php">Login</a>
        <a href="register.php">Register</a>
        <a href="about.php">About</a>
    </nav>
</header>

<div class="container">
    <div class="register-box">
        <h2>SkillMatch</h2>
        <p class="subtitle">Create your student account</p>

        <?php if (isset($error)) echo "<div class='error'>$error</div>"; ?>

        <form method="POST">
            <input type="text" name="name" placeholder="Full Name" required>
            <input type="email" name="email" placeholder="Email Address" required>
            <input type="password" name="password" placeholder="Password" required>

            <button type="submit" name="register">Register</button>
        </form>

        <div class="login-link">
            Already registered? <a href="login.php">Login</a>
        </div>
    </div>
</div>

</body>
</html>
