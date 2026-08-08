<?php
session_start();
require "db.php";

if (!isset($_SESSION['student_id'])) {
    die("Login required");
}

if (!isset($_POST['ans'])) {
    die("Invalid submission");
}

$student_id = $_SESSION['student_id'];

$scores = [
    "Software Developer" => 0,
    "Web Developer" => 0,
    "Data Scientist" => 0,
    "AI / ML Engineer" => 0,
    "Cybersecurity Analyst" => 0
];

foreach ($_POST['ans'] as $i => $ans) {
    if ($ans == $_POST['correct'][$i]) {
        $scores[$_POST['domain'][$i]]++;
    }
}

arsort($scores);
$bestCareer = array_key_first($scores);

$stmt = $conn->prepare("
INSERT INTO results
(student_id, software_dev, web_dev, data_science, ai_ml, cyber_security, best_domain)
VALUES (?,?,?,?,?,?,?)
");

$stmt->bind_param(
    "iiiiiss",
    $student_id,
    $scores["Software Developer"],
    $scores["Web Developer"],
    $scores["Data Scientist"],
    $scores["AI / ML Engineer"],
    $scores["Cybersecurity Analyst"],
    $bestCareer
);
$stmt->execute();
$stmt->close();

header("Location: view_result.php");
exit;
