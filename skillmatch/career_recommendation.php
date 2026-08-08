<?php
session_start();
include "db.php";

$selected_domain = $_POST['domain_id'] ?? "";

/* DETAILED LEARNING GUIDE */

$roadmapGuide = [

"Beginner" => [

"duration" => "4 – 6 Weeks",

"topics" => [
"Understand fundamental concepts",
"Learn basic programming or domain concepts",
"Practice syntax and problem solving",
"Understand development environment"
],

"projects" => [
"Basic calculator / simple program",
"Small portfolio website",
"Command line based tool"
],

"resources" => [
"YouTube tutorials",
"Official documentation",
"Beginner online courses"
]

],

"Intermediate" => [

"duration" => "6 – 8 Weeks",

"topics" => [
"Learn frameworks and libraries",
"Understand APIs and integration",
"Work with databases",
"Practice debugging and optimization"
],

"projects" => [
"CRUD application",
"Dynamic website",
"API based project"
],

"resources" => [
"Udemy courses",
"Project based learning",
"GitHub open source practice"
]

],

"Advanced" => [

"duration" => "8 – 10 Weeks",

"topics" => [
"Build scalable applications",
"Learn system design",
"Optimize performance",
"Prepare for interviews"
],

"projects" => [
"Full stack application",
"Real world product clone",
"Deploy application online"
],

"resources" => [
"LeetCode practice",
"Interview preparation platforms",
"Advanced documentation"
]

]

];

?>

<!DOCTYPE html>
<html>
<head>

<title>SkillMatch Career Roadmap</title>

<style>

body{
font-family:Arial;
background:linear-gradient(135deg,#020617,#1e40af);
color:white;
margin:0;
padding:40px;
}

.container{
max-width:1000px;
margin:auto;
background:white;
color:black;
padding:30px;
border-radius:15px;
}

.domain{
border:1px solid #ddd;
padding:12px;
margin:8px 0;
border-radius:8px;
}

button{
width:100%;
padding:14px;
background:#2563eb;
color:white;
border:none;
border-radius:8px;
cursor:pointer;
}

.roadmap{
margin-top:25px;
padding:20px;
background:#f1f5f9;
border-left:6px solid #2563eb;
border-radius:10px;
}

.section{
margin-top:15px;
}

li{
margin:6px 0;
}

</style>

</head>

<body>

<div class="container">

<h1 align="center">SkillMatch Career Roadmap</h1>

<form method="POST">

<?php
$domains = mysqli_query($conn,"SELECT * FROM domains");

while($d=mysqli_fetch_assoc($domains)){
?>

<div class="domain">
<input type="radio" name="domain_id" value="<?= $d['domain_id'] ?>" required>
<b><?= $d['domain_name'] ?></b>
</div>

<?php } ?>

<button type="submit">Generate Roadmap</button>

</form>


<?php
if($selected_domain){

$domain = mysqli_fetch_assoc(
mysqli_query($conn,"SELECT domain_name FROM domains WHERE domain_id=$selected_domain")
);

$result = mysqli_query($conn,"SELECT * FROM roadmaps WHERE domain_id=$selected_domain");
?>

<hr>

<h2><?= $domain['domain_name'] ?> Career Roadmap</h2>

<?php while($r=mysqli_fetch_assoc($result)){

$guide = $roadmapGuide[$r['level']] ?? null;

?>

<div class="roadmap">

<h3><?= $r['level'] ?> Level</h3>

<?php if($guide){ ?>

<p><b>Duration:</b> <?= $guide['duration'] ?></p>

<div class="section">
<b>Topics to Learn</b>
<ul>
<?php foreach($guide['topics'] as $t){ ?>
<li><?= $t ?></li>
<?php } ?>
</ul>
</div>

<div class="section">
<b>Practice Projects</b>
<ul>
<?php foreach($guide['projects'] as $p){ ?>
<li><?= $p ?></li>
<?php } ?>
</ul>
</div>

<div class="section">
<b>Recommended Learning Resources</b>
<ul>
<?php foreach($guide['resources'] as $res){ ?>
<li><?= $res ?></li>
<?php } ?>
</ul>
</div>

<?php } ?>

<hr>

<div class="section">
<b>Skills Required</b><br>
<?= nl2br($r['skills']) ?>
</div>

<div class="section">
<b>Tools & Technologies</b><br>
<?= nl2br($r['tools']) ?>
</div>

<div class="section">
<b>Suggested Projects</b><br>
<?= nl2br($r['projects']) ?>
</div>

<div class="section">
<b>Career Opportunities</b><br>
<?= nl2br($r['careers']) ?>
</div>

</div>

<?php } } ?>

</div>

</body>
</html>