<?php
session_start();
include "db.php";

/* Fetch questions with domain */
$sql = "SELECT q.*, d.domain_name 
        FROM questions q
        INNER JOIN domains d ON q.domain_id = d.domain_id
        ORDER BY d.domain_name";

$result = mysqli_query($conn, $sql);

if(!$result){
    die("Error: " . mysqli_error($conn));
}
?>

<!DOCTYPE html>
<html>
<head>
<title>SkillMatch Career Test</title>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">

<style>
body{font-family:Poppins;background:#020617;margin:0}
.container{max-width:1000px;margin:30px auto;background:#fff;padding:40px;border-radius:18px}
.domain h3{background:#38bdf8;padding:12px;border-radius:10px}
.question{background:#f1f5f9;padding:20px;margin-top:15px;border-radius:12px}
button{margin:40px auto;display:block;padding:14px 40px;background:#38bdf8;border:none;border-radius:14px;font-size:16px}
</style>
</head>

<body>

<div class="container">
<h2 style="text-align:center">🎯 SkillMatch Career Assessment</h2>

<form method="POST" action="result.php">

<?php
$current_domain = "";
$qno = 1;

while($row = mysqli_fetch_assoc($result)){

    // Show domain heading once
    if($current_domain != $row['domain_name']){
        $current_domain = $row['domain_name'];
        echo "<div class='domain'><h3>$current_domain</h3>";
    }

    echo "<div class='question'>";
    echo "<b>$qno. ".htmlspecialchars($row['question'])."</b><br>";

    echo "<label><input type='radio' name='ans[$qno]' value='1' required> ".htmlspecialchars($row['option1'])."</label><br>";
    echo "<label><input type='radio' name='ans[$qno]' value='2'> ".htmlspecialchars($row['option2'])."</label><br>";
    echo "<label><input type='radio' name='ans[$qno]' value='3'> ".htmlspecialchars($row['option3'])."</label><br>";
    echo "<label><input type='radio' name='ans[$qno]' value='4'> ".htmlspecialchars($row['option4'])."</label><br>";

    echo "<input type='hidden' name='question_id[$qno]' value='{$row['question_id']}'>";
    echo "<input type='hidden' name='domain[$qno]' value='{$row['domain_name']}'>";
    echo "<input type='hidden' name='correct[$qno]' value='{$row['correct_option']}'>";

    echo "</div>";

    $qno++;
}
?>

<button type="submit">Submit Test</button>
</form>

</div>
</body>
</html>