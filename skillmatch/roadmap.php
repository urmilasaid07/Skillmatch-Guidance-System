<?php
session_start();

$domain = $_GET['domain'] ?? "";
?>

<!DOCTYPE html>
<html>
<head>
<title>Career Roadmap</title>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">

<style>
body{font-family:Poppins;background:#0f172a;margin:0;color:white}
.container{max-width:900px;margin:40px auto;background:#1e293b;padding:30px;border-radius:15px}
h2{text-align:center;color:#38bdf8}
.step{background:#334155;padding:15px;margin-top:12px;border-radius:10px}
</style>
</head>

<body>

<div class="container">

<h2>🚀 Career Roadmap</h2>

<?php

if($domain == "Software Developer"){
    echo "<h3>💻 Software Developer Roadmap</h3>";
    echo "<div class='step'>1. Learn Programming (C, Java, Python)</div>";
    echo "<div class='step'>2. Data Structures & Algorithms</div>";
    echo "<div class='step'>3. OOP Concepts</div>";
    echo "<div class='step'>4. Build Projects</div>";
    echo "<div class='step'>5. Learn Git & GitHub</div>";
    echo "<div class='step'>6. Apply for Jobs / Internships</div>";
}

elseif($domain == "Web Developer"){
    echo "<h3>🌐 Web Developer Roadmap</h3>";
    echo "<div class='step'>1. Learn HTML, CSS</div>";
    echo "<div class='step'>2. Learn JavaScript</div>";
    echo "<div class='step'>3. Learn Backend (PHP / Node)</div>";
    echo "<div class='step'>4. Database (MySQL)</div>";
    echo "<div class='step'>5. Build Websites</div>";
}

elseif($domain == "Data Scientist"){
    echo "<h3>📊 Data Scientist Roadmap</h3>";
    echo "<div class='step'>1. Learn Python</div>";
    echo "<div class='step'>2. Learn Statistics</div>";
    echo "<div class='step'>3. Learn Pandas & NumPy</div>";
    echo "<div class='step'>4. Data Visualization</div>";
    echo "<div class='step'>5. Machine Learning Basics</div>";
}

elseif($domain == "AI / ML Engineer"){
    echo "<h3>🤖 AI / ML Engineer Roadmap</h3>";
    echo "<div class='step'>1. Python Programming</div>";
    echo "<div class='step'>2. Mathematics (Linear Algebra)</div>";
    echo "<div class='step'>3. Machine Learning</div>";
    echo "<div class='step'>4. Deep Learning</div>";
    echo "<div class='step'>5. Build AI Projects</div>";
}

elseif($domain == "Cybersecurity Analyst"){
    echo "<h3>🔐 Cybersecurity Roadmap</h3>";
    echo "<div class='step'>1. Networking Basics</div>";
    echo "<div class='step'>2. Linux Fundamentals</div>";
    echo "<div class='step'>3. Security Concepts</div>";
    echo "<div class='step'>4. Ethical Hacking</div>";
    echo "<div class='step'>5. Tools (Wireshark, Kali Linux)</div>";
}

else{
    echo "<h3>No roadmap available</h3>";
}
?>

</div>

</body>
</html>