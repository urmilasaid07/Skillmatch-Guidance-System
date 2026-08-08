<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>About SkillMatch | Career Guidance System</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<!-- Google Font -->
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

<style>
:root{
    --primary:#0f172a;
    --secondary:#38bdf8;
    --light:#f8fafc;
    --dark:#020617;
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
    line-height:1.7;
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

/* PAGE HEADER */
.page-header{
    background:linear-gradient(120deg,#020617,#0f172a);
    color:white;
    padding:80px 30px;
    text-align:center;
}

.page-header h2{
    font-size:40px;
    margin-bottom:15px;
}

.page-header p{
    max-width:700px;
    margin:0 auto;
    color:#cbd5e1;
    font-size:18px;
}

/* ABOUT SECTION */
.about-section{
    padding:90px 80px;
    background:white;
}

.about-section h3{
    text-align:center;
    font-size:32px;
    color:var(--primary);
    margin-bottom:20px;
}

.about-subtitle{
    max-width:750px;
    margin:0 auto 70px;
    text-align:center;
    font-size:16px;
    color:#475569;
}

/* STEPS */
.steps{
    display:grid;
    grid-template-columns:repeat(auto-fit,minmax(240px,1fr));
    gap:35px;
}

.step-box{
    background:#ffffff;
    padding:40px 30px;
    border-radius:22px;
    text-align:center;
    box-shadow:0 12px 30px rgba(0,0,0,0.08);
    transition:0.35s;
}

.step-box:hover{
    background:#f0f9ff;
    transform:translateY(-10px);
}

.step-icon{
    width:70px;
    height:70px;
    margin:0 auto 20px;
    background:#e0f2fe;
    color:#0284c7;
    font-size:30px;
    display:flex;
    align-items:center;
    justify-content:center;
    border-radius:50%;
}

.step-box h4{
    font-size:20px;
    font-weight:600;
    margin-bottom:12px;
    color:var(--primary);
}

.step-box p{
    font-size:15px;
    color:#475569;
}

/* WHY SKILLMATCH */
.why-section{
    padding:90px 80px;
}

.why-box{
    max-width:900px;
    margin:0 auto;
    background:white;
    padding:50px;
    border-radius:25px;
    box-shadow:0 12px 30px rgba(0,0,0,0.08);
}

.why-box h3{
    text-align:center;
    font-size:30px;
    margin-bottom:25px;
    color:var(--primary);
}

.why-box p{
    font-size:16px;
    color:#475569;
    margin-bottom:15px;
}

/* FOOTER */
footer{
    background:var(--dark);
    color:#cbd5e1;
    text-align:center;
    padding:22px;
    font-size:14px;
}

/* RESPONSIVE */
@media(max-width:900px){
    header{
        padding:15px 30px;
    }

    .about-section,
    .why-section{
        padding:70px 30px;
    }

    .page-header h2{
        font-size:32px;
    }
}
</style>
</head>

<body>

<!-- NAVBAR -->
<header>
    <h1>SkillMatch </h1>
    <nav>
        <a href="index.php">Home</a>
        <a href="login.php">Login</a>
        <a href="register.php">Register</a>
        <a href="about.php">About</a>
    </nav>
</header>

<!-- PAGE HEADER -->
<div class="page-header">
    <h2>About SkillMatch </h2>
    <p>
        An intelligent career guidance system designed specifically
        for B.Sc. Computer Science students.
    </p>
</div>

<!-- ABOUT / HOW IT WORKS -->
<section class="about-section">
    <h3>How SkillMatch Works</h3>
    <p class="about-subtitle">
        SkillMatch analyzes students’ academic strengths based on
        syllabus-oriented assessment and maps them to the most suitable
        technology career path.
    </p>

    <div class="steps">
        <div class="step-box">
            <div class="step-icon">📝</div>
            <h4>Skill Assessment</h4>
            <p>
                Students appear for an MCQ-based test designed
                from the B.Sc Computer Science syllabus.
            </p>
        </div>

        <div class="step-box">
            <div class="step-icon">📊</div>
            <h4>Smart Analysis</h4>
            <p>
                Responses are evaluated using predefined
                career-specific weight algorithms.
            </p>
        </div>

        <div class="step-box">
            <div class="step-icon">🎯</div>
            <h4>Career Mapping</h4>
            <p>
                SkillMatch identifies the most suitable
                career domain based on performance trends.
            </p>
        </div>

        <div class="step-box">
            <div class="step-icon">🚀</div>
            <h4>Growth Roadmap</h4>
            <p>
                Students receive guidance on skills
                required to grow in their chosen career.
            </p>
        </div>
    </div>
</section>

<!-- WHY SKILLMATCH -->
<section class="why-section">
    <div class="why-box">
        <h3>Why SkillMatch ?</h3>
        <p>
            Many Computer Science students face confusion while choosing
            a career path due to the wide range of technology domains.
            SkillMatch bridges this gap by providing data-driven
            career recommendations.
        </p>
        <p>
            The system ensures unbiased guidance by analyzing
            syllabus-based knowledge instead of random interest,
            helping students make informed career decisions.
        </p>
    </div>
</section>

<!-- FOOTER -->
<footer>
    © 2026 SkillMatch  |  – B.Sc Computer Science
</footer>

</body>
</html>
