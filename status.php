<?php require 'connection/connection.php'; ?>
<!DOCTYPE html>
<html>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
<head><title>Track Complaint</title></head>
<body>
    <div class="container d-flex justify-content-center mt-5">
        <form method="get" class="col-sm-6 border rounded p-5">
            <a href="index.php" class="btn btn-primary"><i class="fa fa-arrow-left"></i>Back To Home</a>
            <h1 class="py-5">Track Complaint</h1>
            <div class="row">
                <div class="col-sm-8">
                    <input type="number" name="id" class="form-control required" placeholder="Type your Et ID">
                </div>
                <div class="col-sm-4 mb-5">
                    <button class="btn btn-primary w-75">Track</button>
                </div>
            </div>
            
            <?php
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $res = $conn->query("SELECT * FROM complaints WHERE id = $id");
    if ($res->num_rows > 0) {
        $row = $res->fetch_assoc();
        echo "<h3>Status: " . $row['status'] . "</h3>";
        echo "<p><strong>Description:</strong> " . $row['name'] . "</p>";
        echo "<p><strong>Description:</strong> " . $row['description'] . "</p>";
        echo "<p><strong>Admin Response:</strong> " . $row['admin_response'] . "</p>";
        echo "<p class='text-center'><strong>Thank you for your Message!</strong></p>";
    } else {
        echo "<p>No complaint found with that ID:<strong>  ".$id."</strong></p>";
    }
}
?>
</form>
</div>
</body>
</html>
