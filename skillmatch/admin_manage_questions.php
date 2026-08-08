<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: admin_login.php");
    exit();
}

include "db.php";

/* Fetch domains */
$domains = mysqli_query($conn, "SELECT domain_id, domain_name FROM domains");
if (!$domains) {
    die("Domain Query Failed: " . mysqli_error($conn));
}

/* Fetch questions */
$sql = "SELECT 
            q.question_id,
            q.question,
            q.correct_option,
            d.domain_name
        FROM questions q
        INNER JOIN domains d ON q.domain_id = d.domain_id
        ORDER BY q.question_id DESC";

$result = mysqli_query($conn, $sql);
if (!$result) {
    die("Question Query Failed: " . mysqli_error($conn));
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Manage Questions | SkillMatch</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<style>
body{
    font-family:Poppins, Arial;
    background:#f1f5f9;
    margin:0;
}
.container{
    max-width:1100px;
    margin:30px auto;
    background:#fff;
    padding:25px;
    border-radius:14px;
    box-shadow:0 15px 30px rgba(0,0,0,0.08);
}
h2{margin-bottom:15px;}
input, textarea, select{
    width:100%;
    padding:11px;
    margin-bottom:12px;
    border-radius:8px;
    border:1px solid #cbd5e1;
}
button{
    background:#2563eb;
    color:white;
    border:none;
    padding:10px 20px;
    border-radius:8px;
    cursor:pointer;
}
button:hover{background:#1e40af;}

table{
    width:100%;
    border-collapse:collapse;
    margin-top:25px;
}
th, td{
    padding:12px;
    text-align:left;
}
th{
    background:#2563eb;
    color:white;
}
tr:nth-child(even){
    background:#f8fafc;
}
.badge{
    background:#22c55e;
    color:white;
    padding:4px 10px;
    border-radius:20px;
    font-size:12px;
}
.actions a{
    padding:6px 10px;
    border-radius:6px;
    color:white;
    text-decoration:none;
    font-size:13px;
}
.edit{background:#f59e0b;}
.delete{background:#ef4444;}
</style>
</head>

<body>

<div class="container">

<h2>➕ Add Question</h2>

<form method="post" action="add_question.php">

<select name="domain_id" required>
    <option value="">Select Domain</option>
    <?php while($d = mysqli_fetch_assoc($domains)){ ?>
        <option value="<?= $d['domain_id'] ?>">
            <?= htmlspecialchars($d['domain_name']) ?>
        </option>
    <?php } ?>
</select>

<textarea name="question" placeholder="Enter Question" required></textarea>

<input type="text" name="option1" placeholder="Option 1" required>
<input type="text" name="option2" placeholder="Option 2" required>
<input type="text" name="option3" placeholder="Option 3" required>
<input type="text" name="option4" placeholder="Option 4" required>

<select name="correct_option" required>
    <option value="">Correct Option</option>
    <option value="1">Option 1</option>
    <option value="2">Option 2</option>
    <option value="3">Option 3</option>
    <option value="4">Option 4</option>
</select>

<button type="submit">Add Question</button>
</form>

<hr>

<h2>📋 All Questions</h2>

<table>
<tr>
    <th>ID</th>
    <th>Domain</th>
    <th>Question</th>
    <th>Correct</th>
    <th>Action</th>
</tr>

<?php if(mysqli_num_rows($result) > 0){ ?>
<?php while($row = mysqli_fetch_assoc($result)){ ?>
<tr>
    <td><?= $row['question_id'] ?></td>
    <td><?= htmlspecialchars($row['domain_name']) ?></td>
    <td><?= htmlspecialchars($row['question']) ?></td>
    <td><span class="badge">Option <?= $row['correct_option'] ?></span></td>
    <td class="actions">
        
        <a class="delete"
           href="delete_question.php?id=<?= $row['question_id'] ?>"
           onclick="return confirm('Delete this question?')">
           Delete
        </a>
    </td>
</tr>
<?php } ?>
<?php } else { ?>
<tr>
    <td colspan="5" style="text-align:center;">No questions found</td>
</tr>
<?php } ?>

</table>

</div>
</body>
</html>
