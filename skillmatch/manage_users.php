<?php
session_start();
if(!isset($_SESSION['admin'])) header("Location: admin_login.php");
include "db.php";

$users = mysqli_query($conn,"SELECT * FROM students");
?>
<!DOCTYPE html>
<html>
<head>
<title>Manage Users</title>
<style>
body{font-family:Poppins;background:#f8fafc;}
table{width:90%;margin:40px auto;border-collapse:collapse;}
th,td{padding:10px;border:1px solid #ddd;}
th{background:#2563eb;color:white;}
</style>
</head>
<body>

<h2 align="center">Registered Students</h2>
<table>
<tr>
<th>ID</th><th>Name</th><th>Email</th>
</tr>

<?php while($u=mysqli_fetch_assoc($users)){ ?>
<tr>
<td><?php echo $u['student_id']; ?></td>
<td><?php echo $u['name']; ?></td>
<td><?php echo $u['email']; ?></td>

</tr>
<?php } ?>

</table>
</body>
</html>
