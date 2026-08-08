<?php
session_start();
include "db.php";

/* ---------------------------
   DOMAIN-WISE STATISTICS
---------------------------- */
$domainStats = mysqli_query($conn, "
SELECT best_domain, COUNT(*) as total
FROM results
GROUP BY best_domain
ORDER BY total DESC
");

/* ---------------------------
   STUDENT TEST RESULTS
---------------------------- */
$results = mysqli_query($conn, "
SELECT students.name AS student_name, results.best_domain AS domain,
       results.best_career AS recommendation, results.taken_at
FROM results
JOIN students ON results.student_id = students.student_id
ORDER BY results.taken_at DESC
");
?>

<!DOCTYPE html>
<html>
<head>
<title>Admin Report - SkillMatch</title>
<style>
body{
    font-family: Arial, sans-serif;
    background: #0f172a;
    color: white;
    padding: 30px;
}
.container{
    max-width: 1200px;
    margin:auto;
}
h1, h2{
    text-align:center;
    margin-bottom:20px;
    color:#38bdf8;
}
.stats{
    display:flex;
    gap:20px;
    justify-content:center;
    margin-bottom:30px;
}
.stat-box{
    background:#2563eb;
    padding:20px;
    border-radius:10px;
    text-align:center;
    min-width:180px;
}
.stat-box h3{
    margin:0;
    color:white;
    font-size:20px;
}
.stat-box p{
    margin:5px 0 0 0;
    font-size:24px;
    font-weight:bold;
}
table{
    width:100%;
    border-collapse: collapse;
    margin-top:20px;
    background:white;
    color:#0f172a;
    border-radius:8px;
    overflow:hidden;
}
th, td{
    padding:12px 15px;
    text-align:left;
}
th{
    background:#2563eb;
    color:white;
}
tr:nth-child(even){
    background:#f1f5f9;
}
tr:hover{
    background:#e0e7ff;
    cursor:pointer;
}
</style>
</head>
<body>

<div class="container">

<h1>📊 SkillMatch Report</h1>

<!-- DOMAIN-WISE STATISTICS -->
<h2>🎯 Career Assesment Best Domain </h2>
<div class="stats">
<?php while($row = mysqli_fetch_assoc($domainStats)) { ?>
<div class="stat-box">
<h3><?php echo $row['best_domain']; ?></h3>
<p><?php echo $row['total']; ?> Students</p>
</div>
<?php } ?>
</div>

<!-- STUDENT RESULTS TABLE -->
<h2>📋 Student Test Results</h2>
<table>
<tr>
<th>ID</th>
<th>Student Name</th>
<th>Domain</th>
<th>Test Date</th>
</tr>

<?php 
$rowNumber = 1;
while($row = mysqli_fetch_assoc($results)) { ?>
<tr>
<td><?php echo $rowNumber++; ?></td>
<td><?php echo $row['student_name']; ?></td>
<td><?php echo $row['domain']; ?></td>
<td><?php echo $row['taken_at']; ?></td>
</tr>
<?php } ?>
</table>

</div>

</body>
</html>