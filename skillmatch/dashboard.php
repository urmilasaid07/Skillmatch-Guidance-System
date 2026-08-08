<?php
session_start();
include "db.php";

if(!isset($_SESSION['student_id'])){
    header("Location: login.php");
    exit();
}

$student_id = $_SESSION['student_id'];
$student_name = $_SESSION['student_name'];

// Fetch latest result
$res = $conn->query("SELECT * FROM results WHERE student_id='$student_id' ORDER BY taken_at DESC LIMIT 1");
$latest = $res ? $res->fetch_assoc() : null;
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Dashboard | SkillMatch </title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">

<style>
:root{
    --primary:#0f172a;
    --secondary:#38bdf8;
    --light:#f8fafc;
    --text:#334155;
}

*{margin:0;padding:0;box-sizing:border-box;font-family:'Poppins',sans-serif;}

body{
    background:linear-gradient(135deg,#020617,#0f172a);
    min-height:100vh;
    color:var(--text);
}

header{
    background:rgba(15,23,42,0.95);
    padding:18px 60px;
    display:flex;
    justify-content:space-between;
    align-items:center;
}
header h1{color:var(--secondary);}
nav a{color:#e5e7eb;margin-left:25px;text-decoration:none;font-weight:500;}
nav a:hover{color:var(--secondary);}

.container{
    padding:50px 60px;
}

.welcome{
    color:white;
    font-size:28px;
    font-weight:700;
}
.subtitle{color:#cbd5e1;margin-bottom:35px;}

.cards{
    display:grid;
    grid-template-columns:repeat(auto-fit,minmax(260px,1fr));
    gap:30px;
}

.card{
    background:white;
    padding:30px;
    border-radius:22px;
    box-shadow:0 25px 60px rgba(0,0,0,0.25);
    transition:0.3s;
}
.card:hover{transform:translateY(-8px);}
.card h3{margin-bottom:10px;color:var(--primary);} 
.card p{font-size:14px;color:#475569;}

.btn{
    display:inline-block;
    margin-top:18px;
    padding:12px 22px;
    background:var(--secondary);
    color:var(--primary);
    border-radius:14px;
    font-weight:600;
    text-decoration:none;
}

.result-box{
    margin-top:45px;
    background:linear-gradient(135deg,#0f172a,#020617);
    padding:35px;
    border-radius:25px;
    color:white;
}
.result-box h2{color:var(--secondary);margin-bottom:12px;}

.badge{
    display:inline-block;
    padding:8px 16px;
    background:#38bdf8;
    color:#0f172a;
    border-radius:20px;
    font-weight:700;
}

footer{
    margin-top:60px;
    text-align:center;
    color:#94a3b8;
}
</style>
</head>

<body>
<header>
    <h1>SkillMatch </h1>
    <nav>
        <a href="dashboard.php">Dashboard</a>
        <a href="career_test.php">Career Test</a>
        <a href="logout.php">Logout</a>
    </nav>
</header>

<div class="container">
    <div class="welcome">Welcome, <?php echo htmlspecialchars($student_name); ?> 👋</div>
    <div class="subtitle">Your personalized B.Sc Computer Science career dashboard</div>

    <div class="cards">
        <div class="card">
            <h3>🎯 Take Career Test</h3>
            <p>Answer 50 MCQs based on B.Sc CS syllabus and discover your best-fit career.</p>
            <a href="career_test.php" class="btn">Start Test</a>
        </div>

        <div class="card">
            <h3>📊 Test Results</h3>
            <p>View your domain-wise performance and previous attempts.</p>
            <a href="view_result.php" class="btn">View Results</a>
        </div>

        <div class="card">
            <h3>🤖 Skill Path</h3>
            <p>Get intelligent recommendations based on your skills.</p>
            <a href="career_recommendation.php" class="btn">Explore path</a>
        </div>
    </div>

    <?php if($latest){ ?>
    <div class="result-box">
        <h2>🌟 Latest Career Recommendation</h2>
        <p>Your strongest career domain is:</p>
        <div class="badge"><?php echo $latest['best_domain']; ?></div>
        <p style="margin-top:12px;font-size:14px;color:#cbd5e1;">Test Date: <?php echo $latest['taken_at']; ?></p>
    </div>
    <?php } ?>
</div>

<footer>
    <br> <br> <br> <br> <br> <br> <br>


    © <?php echo date('Y'); ?> SkillMatch | B.Sc Computer Science 
</footer>
</body>
</html>
