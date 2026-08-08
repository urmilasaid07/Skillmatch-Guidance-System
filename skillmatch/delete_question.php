<?php
include "db.php";

$id = $_GET['id'];

mysqli_query($conn, "DELETE FROM questions WHERE question_id=$id");

header("Location: manage_questions.php");
?>