<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <title>Admin Dashboard</title>
</head>
<body>
    <?php
session_start();
if (!isset($_SESSION['admin'])) { header("Location: index.php"); exit; }
require '../connection/connection.php';
$res = $conn->query("SELECT * FROM complaints ORDER BY created_at DESC");
?>
    <div class="bg-warning mb-5 p-4 d-flex justify-content-around">
        <h2 class="pl-5">Admin Dashboard</h2>
        <a href="index.php" class="btn btn-danger">Logout</a>
    </div>
    <div class="container">
        <h4>All User Information</h4>
    <table border="1" class="table table-hover">
        <tr class="bg-dark text-light">
            <th>ID</th>
            <th>Name</th>
            <th>Category</th>
            <th>Description</th>
            <th>Location</th>
            <th>Status</th>
            <th>Time</th>
            <th>Action</th>
        </tr>
        <?php while($row = $res->fetch_assoc()): ?>
            <tr>
                <td><?= $row['id'] ?></td>
                <td><?= $row['name'] ?></td>
                <td><?= $row['category'] ?></td>
                <td><?= $row['description'] ?></td>
                <td><?= $row['location'] ?></td>
    <td><?= $row['status'] ?></td>
    <td><?= $row['created_at'] ?></td>
    <td><a href="update.php?id=<?= $row['id'] ?>" class="btn btn-primary">Answer</a></td>
</tr>
<?php endwhile; ?>
</table>
</div>
</body>
</html>

