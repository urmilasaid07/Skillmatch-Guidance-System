<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>SkillMatch Career Guidance for B.Sc CS</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">

<style>
/* BASIC COLORS */
:root{
    --primary:#0f172a;
    --secondary:#38bdf8;
    --light:#f8fafc;
    --text:#334155;
}

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:'Poppins', sans-serif;
}

body{
    background:var(--light);
    color:var(--text);
}

/* NAVBAR */
header{
    background:var(--primary);
    padding:15px 60px;
    display:flex;
    justify-content:space-between;
    align-items:center;
}

header h1{
    color:var(--secondary);
    font-size:24px;
}

nav a{
    color:#e5e7eb;
    text-decoration:none;
    margin-left:20px;
}

nav a:hover{
    color:var(--secondary);
}

/* HERO */
.hero{
    height:90vh;
    display:flex;
    justify-content:center;
    align-items:center;
    text-align:center;
    background:#020617;
    color:white;
    padding:20px;
}

.hero-text{
    max-width:700px;
}

.hero-text h2{
    font-size:40px;
    margin-bottom:15px;
}

.hero-text p{
    font-size:16px;
    margin-bottom:30px;
    color:#cbd5e1;
}

.hero-buttons a{
    display:inline-block;
    padding:12px 30px;
    margin:0 10px;
    border-radius:25px;
    text-decoration:none;
    font-weight:500;
}

.hero-buttons .primary{
    background:var(--secondary);
    color:#020617;
}

.hero-buttons .secondary{
    border:2px solid var(--secondary);
    color:var(--secondary);
}

/* SECTION */
section{
    padding:80px 60px;
}

section h3{
    text-align:center;
    font-size:30px;
    margin-bottom:10px;
    color:var(--primary);
}

.section-subtitle{
    text-align:center;
    margin-bottom:40px;
}

/* CAREERS */
.careers{
    display:flex;
    gap:20px;
    overflow-x:auto;
    padding-bottom:10px;
}

.career-card{
    min-width:240px;
    background:white;
    padding:30px;
    border-radius:15px;
    text-align:center;
    box-shadow:0 8px 20px rgba(0,0,0,0.08);
}

.career-card span{
    font-size:28px;
    display:block;
    margin-bottom:10px;
}

.career-card h4{
    margin-bottom:8px;
    color:var(--primary);
}

/* FOOTER */
footer{
    background:#020617;
    color:#cbd5e1;
    text-align:center;
    padding:20px;
    font-size:14px;
}

/* RESPONSIVE */
@media(max-width:768px){
    header{
        padding:15px 25px;
    }

    section{
        padding:60px 25px;
    }

    .hero-text h2{
        font-size:32px;
    }
}
</style>
</head>

<body>

<!-- NAVBAR -->
<header>
    <h1>SkillMatch</h1>
    <nav>
        <a href="index.php">Home</a>
        <a href="login.php">Login</a>
        <a href="register.php">Register</a>
        <a href="about.php">About</a>
    </nav>
</header>

<!-- HERO -->
<div class="hero">
    <div class="hero-text">
        <h2>From 📘 Syllabus to 💡 Skill to 🚀 Career</h2>
        <p>
            SkillMatch helps B.Sc. Computer Science students discover
            suitable career paths using syllabus-based assessment.
        </p>
        <div class="hero-buttons">
            <a href="register.php" class="primary">Start Skill Assessment</a>
            <a href="about.php" class="secondary">Learn More</a>
        </div>
    </div>
</div>

<!-- CAREERS -->
<section>
    <h3>Career Domains Covered</h3>
    <p class="section-subtitle">
        Explore industry-ready technology career paths.
    </p>

    <div class="careers">
        <div class="career-card">
            <span>💻</span>
            <h4>Software Developer</h4>
            <p>Programming & system design</p>
        </div>

        <div class="career-card">
            <span>🌐</span>
            <h4>Web Developer</h4>
            <p>Frontend & backend</p>
        </div>

        <div class="career-card">
            <span>📊</span>
            <h4>Data Scientist</h4>
            <p>Data analytics</p>
        </div>

        <div class="career-card">
            <span>🤖</span>
            <h4>AI / ML Engineer</h4>
            <p>Intelligent systems</p>
        </div>

        <div class="career-card">
            <span>🔐</span>
            <h4>Cybersecurity Analyst</h4>
            <p>System security</p>
        </div>
    </div>
</section>

<footer>
    © 2026 SkillMatch | B.Sc Computer Science
</footer>

</body>
</html>
