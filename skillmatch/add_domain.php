<?php
include "db.php";

$msg = "";

if (isset($_POST['add'])) {
    $name    = $_POST['domain'];
    $desc    = $_POST['desc'];
    $skills  = $_POST['skills'];
    $careers = $_POST['careers'];
    $level   = $_POST['level'];

    $query = "INSERT INTO domains 
              (domain_name, description, skills, careers, level)
              VALUES ('$name','$desc','$skills','$careers','$level')";

    if (mysqli_query($conn, $query)) {
        $msg = "✅ Domain added successfully!";
    } else {
        $msg = "❌ Error adding domain";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Add Domain | SkillMatch</title>
<style>
    body {
        font-family: 'Poppins', sans-serif;
        background: #f4f6f9;
    }

    .container {
        max-width: 600px;
        margin: 40px auto;
        background: #ffffff;
        padding: 30px;
        border-radius: 12px;
        box-shadow: 0 10px 25px rgba(0,0,0,0.08);
    }

    h2 {
        text-align: center;
        color: #1e293b;
        margin-bottom: 25px;
    }

    label {
        font-weight: 500;
        display: block;
        margin-bottom: 6px;
        color: #334155;
    }

    input, textarea, select {
        width: 100%;
        padding: 3px;
        border-radius: 8px;
        border: 1px solid #cbd5e1;
        margin-bottom: 18px;
        font-size: 14px;
    }

    textarea {
        resize: none;
        height: 90px;
    }

    button {
        width: 100%;
        background: #2563eb;
        color: white;
        padding: 12px;
        border: none;
        border-radius: 8px;
        font-size: 16px;
        cursor: pointer;
        transition: 0.3s;
    }

    button:hover {
        background: #1e40af;
    }

    .msg {
        text-align: center;
        margin-bottom: 15px;
        font-weight: 500;
        color: green;
    }
</style>
</head>

<body>

<div class="container">
    <h2>Add Career Domain</h2>

    <?php if($msg != "") { ?>
        <div class="msg"><?= $msg ?></div>
    <?php } ?>

    <form method="post">
        <label>Domain Name</label>
        <input type="text" name="domain" placeholder="e.g. Web Developer" required>

        <label>Description</label>
        <textarea name="desc" placeholder="Brief description of the domain"></textarea>

        <label>Required Skills</label>
        <textarea name="skills" placeholder="HTML, CSS, JavaScript, PHP"></textarea>

        <label>Career Opportunities</label>
        <textarea name="careers" placeholder="Frontend Developer, Backend Developer"></textarea>

       

        <button type="submit" name="add">Add Domain</button>
    </form>
</div>

</body>
</html>
