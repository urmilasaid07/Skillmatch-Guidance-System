<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: admin_login.php");
    exit();
}

include "db.php";

/* Correct query */
$query = "
SELECT 
    r.roadmap_id,
    d.domain_name,
    r.level,
    r.skills,
    r.tools,
    r.projects,
    r.careers
FROM roadmaps r
JOIN domains d ON r.domain_id = d.domain_id
ORDER BY r.domain_id, r.level
";

/* Store result in $result */
$result = mysqli_query($conn, $query);

/* Safety check */
if (!$result) {
    die("Query Error: " . mysqli_error($conn));
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Manage Roadmaps | SkillMatch</title>
<style>
body{font-family:Poppins;background:#f8fafc;}
table{width:95%;margin:30px auto;border-collapse:collapse;background:white;}
th,td{padding:12px;border:1px solid #e5e7eb;vertical-align:top;}
th{background:#2563eb;color:white;}
h2{text-align:center;}
</style>
</head>

<body>

<h2>Roadmap Management</h2>

<table>
<tr>
    <th>ID</th>
    <th>Domain</th>
    <th>Level</th>
    <th>Skills</th>
    <th>Tools</th>
    <th>Projects</th>
    <th>Careers</th>
</tr>

<?php
/* ✅ USE THE SAME VARIABLE NAME: $result */
while ($row = mysqli_fetch_assoc($result)) {
?>
<tr>
    <td><?php echo $row['roadmap_id']; ?></td>
    <td><?php echo $row['domain_name']; ?></td>
    <td><?php echo $row['level']; ?></td>
    <td><?php echo $row['skills']; ?></td>
    <td><?php echo $row['tools']; ?></td>
    <td><?php echo $row['projects']; ?></td>
    <td><?php echo $row['careers']; ?></td>
</tr>
<?php } ?>

</table>

</body>
</html>
