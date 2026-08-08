<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: admin_login.php");
    exit();
}

include "db.php";

// Fetch counts
$userCount   = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS total FROM students"))['total'];
$roadmapCount= mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS total FROM roadmaps"))['total'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Admin Dashboard | SkillMatch</title>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">

<style>
body{margin:0;font-family:Poppins;background:#f1f5f9;}
.dashboard{display:flex;min-height:100vh;}
.sidebar{width:250px;background:#0f172a;color:white;padding:25px;}
.sidebar h2{text-align:center;margin-bottom:30px;}
.sidebar a{display:block;color:white;text-decoration:none;padding:12px;border-radius:8px;margin-bottom:10px;}
.sidebar a:hover{background:#2563eb;}

.main{flex:1;padding:30px;}
.topbar{background:white;padding:20px;border-radius:12px;display:flex;justify-content:space-between;}
.logout{background:#ef4444;color:white;padding:8px 15px;border-radius:8px;text-decoration:none;}

.cards{margin-top:25px;display:grid;grid-template-columns:repeat(auto-fit,minmax(220px,1fr));gap:20px;}
.card{background:white;padding:25px;border-radius:15px;box-shadow:0 10px 25px rgba(0,0,0,0.08);}
.card h3{margin:0;font-size:26px;color:#2563eb;}
.card p{margin:5px 0;color:#64748b;}
</style>
</head>

<body>
<div class="dashboard">

    <div class="sidebar">
        <h2>SkillMatch Admin</h2>
        <a href="#">Dashboard</a>
        <a href="manage_users.php">Manage Users</a>
         <a href="admin_manage_questions.php">Manage Assesment Questions</a>
        <a href="add_roadmap.php">Add Roadmaps</a>
         <a href="manage_roadmaps.php">view Roadmaps</a>
        <a href=add_domain.php>Domains</a>
         <a href="Reports.php">Reports & Analytics</a>
       
        <a href="logout.php">Logout</a>
    </div>

    <div class="main">
        <div class="topbar">
            <h3>Welcome Admin 👋</h3>
            <span>SkillMatch System</span>
        </div>

        <div class="cards">
            <div class="card">
                <h3><?php echo $userCount; ?></h3>
                <p>Total Registered Users</p>
            </div>

            <div class="card">
                <h3>5</h3>
                <p>Total Domains</p>
            </div>

            <div class="card">
                <h3><?php echo $roadmapCount; ?></h3>
                <p>Roadmaps Available</p>
            </div>

            <div class="card">
                <h3>Active</h3>
                <p>System Status</p>
            </div>
        </div>
    </div>
</div>
</body>
</html>
