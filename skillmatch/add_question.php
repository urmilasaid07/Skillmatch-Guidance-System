<?php
include "db.php";

if(isset($_POST['domain_id'])){

$domain_id = $_POST['domain_id'];
$question = $_POST['question'];
$opt1 = $_POST['option1'];
$opt2 = $_POST['option2'];
$opt3 = $_POST['option3'];
$opt4 = $_POST['option4'];
$correct = $_POST['correct_option'];

$sql = "INSERT INTO questions 
(domain_id, question, option1, option2, option3, option4, correct_option)
VALUES 
('$domain_id', '$question', '$opt1', '$opt2', '$opt3', '$opt4', '$correct')";

if(mysqli_query($conn, $sql)){
    header("Location: manage_questions.php");
} else {
    echo "Error: " . mysqli_error($conn);
}

}
?>