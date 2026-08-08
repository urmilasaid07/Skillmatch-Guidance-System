
<?php
include "db.php";

$error = "";
$success = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $domain_id = $_POST['domain_id'];
    $level = $_POST['level'];
    $skills = $_POST['skills'];
    $tools = $_POST['tools'];
    $projects = $_POST['projects'];
    $careers = $_POST['careers'];

    $sql = "INSERT INTO roadmaps (domain_id, level, skills, tools, projects, careers) 
            VALUES ('$domain_id', '$level', '$skills', '$tools', '$projects', '$careers')";

    if (mysqli_query($conn, $sql)) {
        $success = "Roadmap added successfully!";
    } else {
        $error = "Error: " . mysqli_error($conn);
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SkillMatch Admin | Add Roadmap</title>
    <style>
        :root {
            --sidebar-bg: #1e293b;
            --main-bg: #f1f5f9;
            --primary-blue: #2563eb;
            --border-color: #e2e8f0;
            --white: #ffffff;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: var(--main-bg);
            display: flex;
            height: 100vh;
            overflow: hidden; /* Keeps the laptop look tight */
        }

        /* Sidebar Mockup */
        .sidebar {
            width: 260px;
            background: var(--sidebar-bg);
            color: white;
            padding: 2rem 1rem;
            display: flex;
            flex-direction: column;
            gap: 1.5rem;
        }

        .sidebar h1 {
            font-size: 1.5rem;
            padding-bottom: 1rem;
            border-bottom: 1px solid #334155;
            text-align: center;
        }

        /* Main Content Area */
        .main-content {
            flex: 1;
            overflow-y: auto;
            padding: 2rem 4rem;
        }

        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
        }

        .user-profile {
            background: var(--white);
            padding: 8px 16px;
            border-radius: 20px;
            font-size: 0.9rem;
            border: 1px solid var(--border-color);
        }

        /* The Form Card - Laptop Centered Layout */
        .form-card {
            background: var(--white);
            border-radius: 12px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
            max-width: 900px; /* Wider for laptop screens */
            margin: 0 auto;
            padding: 3rem;
        }

        h2 {
            color: #0f172a;
            font-size: 1.8rem;
            margin-bottom: 0.5rem;
        }

        p.subtitle {
            color: #64748b;
            margin-bottom: 2.5rem;
        }

        /* 2-Column Grid Layout for the Form */
        .form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 2rem;
        }

        .full-width {
            grid-column: span 2;
        }

        .form-group {
            margin-bottom: 1rem;
        }

        label {
            display: block;
            font-weight: 600;
            font-size: 0.85rem;
            color: #475569;
            margin-bottom: 0.6rem;
            text-transform: uppercase;
            letter-spacing: 0.025em;
        }

        select, textarea, input {
            width: 100%;
            padding: 12px 16px;
            border: 1px solid var(--border-color);
            border-radius: 8px;
            background-color: #f8fafc;
            font-size: 1rem;
            transition: all 0.2s;
        }

        select:focus, textarea:focus {
            outline: none;
            background-color: #fff;
            border-color: var(--primary-blue);
            box-shadow: 0 0 0 4px rgba(37, 99, 235, 0.1);
        }

        textarea {
            height: 120px;
            resize: none;
        }

        .btn-submit {
            background: var(--primary-blue);
            color: white;
            padding: 16px 32px;
            border: none;
            border-radius: 8px;
            font-weight: 700;
            font-size: 1rem;
            cursor: pointer;
            width: 100%;
            margin-top: 1rem;
            transition: transform 0.1s;
        }

        .btn-submit:hover {
            background: #1d4ed8;
            transform: translateY(-1px);
        }

        .alert {
            padding: 1rem;
            border-radius: 8px;
            margin-bottom: 2rem;
            text-align: center;
        }
        .success { background: #dcfce7; color: #15803d; }
        .error { background: #fee2e2; color: #b91c1c; }

    </style>
</head>
<body>

    <div class="main-content">
        

        <div class="form-card">
            <h2>Add Career Roadmap</h2>
            <p class="subtitle">Fill in the details to create a structured path for students.</p>

           
            <form method="POST">
                <div class="form-grid">
                    <div class="form-group">
                        <label>Domain</label>
                        <select name="domain_id" required>
                            <option value="">--Select Domain--</option>
                            <option value="1">Web Development</option>
                            <option value="2">Data Science</option>
                            </select>
                    </div>

                    <div class="form-group">
                        <label>Difficulty Level</label>
                        <select name="level" required>
                            <option value="">--Select Level--</option>
                            <option value="Beginner">Beginner</option>
                            <option value="Intermediate">Intermediate</option>
                            <option value="Advanced">Advanced</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Required Skills</label>
                        <textarea name="skills" placeholder="e.g. React, Node.js, PHP" required></textarea>
                    </div>

                    <div class="form-group">
                        <label>Tools & Software</label>
                        <textarea name="tools" placeholder="e.g. VS Code, Figma, XAMPP" required></textarea>
                    </div>

                    <div class="form-group">
                        <label>Suggested Projects</label>
                        <textarea name="projects" placeholder="e.g. Build a Todo App" required></textarea>
                    </div>

                    <div class="form-group">
                        <label>Career Opportunities</label>
                        <textarea name="careers" placeholder="e.g. Full Stack Developer" required></textarea>
                    </div>

                    <div class="form-group full-width">
                        <button type="submit" class="btn-submit">Save Roadmap to Database</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

</body>
</html>