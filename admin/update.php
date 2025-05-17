<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <title>Answer Applicant</title>
</head>
<body>
    
    <?php
session_start();
if (!isset($_SESSION['admin'])) { header("Location: login.php"); exit; }
require '../connection/connection.php';

$id = intval($_GET['id']);
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $status = $_POST['status'];
    $response = $_POST['response'];
    $stmt = $conn->prepare("UPDATE complaints SET status=?, admin_response=? WHERE id=?");
    $stmt->bind_param("ssi", $status, $response, $id);
    $stmt->execute();
    echo "<div class='d-flex justify-content-center mt-5'><div class='border rounded p-4 mt-5 col-sm-5'><p class='text-center pb-4 text-secondary'>Updated successfully.</p> <a href='dashboard.php' class='btn btn-primary w-25 float-right'>Okay</a></div></div>";
    exit;
}

$res = $conn->query("SELECT * FROM complaints WHERE id=$id");
$row = $res->fetch_assoc();
?>
<div class="container d-flex justify-content-center mt-5">
    <form method="post" class="col-sm-5 border rounded p-4 mt-5">
            <a href="dashboard.php" class="btn btn-primary"><i class="fa fa-arrow-left"></i>Back To Home</a>
        <h2 class="text-warning">Update Complaint #<?= $id ?></h2>
        Status:
        <select name="status" class="form-control">
            <option>-Select status-</option>
            <option>Received</option>
            <option>In Progress</option>
            <option>Resolved</option>
        </select><br>
        Response:<br>
        <textarea name="response" rows="5" cols="40" class="form-control"><?= $row['admin_response'] ?></textarea><br>
        <button type="submit" class="btn btn-primary w-50">Send</button>
    </form>
</div>
</body>
</html>
