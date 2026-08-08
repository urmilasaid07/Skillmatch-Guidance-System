<?php
session_start();
require "db.php";

if (!isset($_SESSION['student_id'])) {
    header("Location: login.php");
    exit;
}

$student_id = $_SESSION['student_id'];

$q = $conn->prepare("
SELECT * FROM results
WHERE student_id = ?
ORDER BY created_at DESC
LIMIT 1
");
$q->bind_param("i",$student_id);
$q->execute();
$res = $q->get_result();

if ($res->num_rows == 0) {
    die("❌ No result found. Please take the test.");
}

$r = $res->fetch_assoc();
?>
<!DOCTYPE html>
<html>
<head>
<title>SkillMatch | Result</title>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
<style>
body{
    margin:0;
    font-family:Poppins,sans-serif;
    background:linear-gradient(135deg,#0f172a,#020617);
    color:white;
}
.container{
    max-width:900px;
    margin:60px auto;
    background:#020617;
    padding:40px;
    border-radius:20px;
}
.best{
    background:#38bdf8;
    color:#020617;
    padding:25px;
    border-radius:15px;
    text-align:center;
}
.bar{
    background:#1e293b;
    border-radius:10px;
    overflow:hidden;
}
.fill{
    height:14px;
    background:#38bdf8;
}
.score{margin:18px 0}
.btn{
    display:inline-block;
    padding:12px 25px;
    margin:10px;
    background:#38bdf8;
    color:#020617;
    text-decoration:none;
    border-radius:30px;
    font-weight:600;
}
</style>
</head>

<body>
<div class="container">
<h1 align="center">📊 Career Assessment Result</h1>

<div class="best">
    <h2>Best Career Match</h2>
    <h1><?= $r['best_domain'] ?></h1>
</div>

<?php
$domains = [
"software_dev"=>"Software Developer",
"web_dev"=>"Web Developer",
"data_science"=>"Data Scientist",
"ai_ml"=>"AI / ML Engineer",
"cyber_security"=>"Cybersecurity Analyst"
];

foreach ($domains as $key=>$name):
$percent = $r[$key]*10;
?>
<div class="score">
<p><?= $name ?> – <?= $percent ?>%</p>
<div class="bar"><div class="fill" style="width:<?= $percent ?>%"></div></div>
</div>
<?php endforeach; ?>

<div align="center">
<a href="career_test.php" class="btn">🔁 Retake Test</a>
<a href="career_recommendation.php" class="btn">View your Roadmap</a>

<a href="dashboard.php" class="btn">🏠 Dashboard</a>
<a href="roadmap.php" class="btn">🏠 Path</a>

</div>

</div>
</body>
</html>
