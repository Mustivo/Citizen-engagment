<?php require 'connection/connection.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Submit Complaint</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
</head>
<body>
    <div class="jumbotron">
        <h2 class="text-center text-primary">Submit Your Complaint / Feedback</h2>
        <a href="status.php" class="btn btn-primary float-right">Track Your Response</a>
    </div>
<div class="container mb-4">
    <div class="row">
        <div class="col-sm-5">
            <h2 class="text-center">Welcome to Customer Complains Website submitt your problem that you saw in my Business</h2>
        </div>
        <div class="col-sm-7">
<form method="POST" class="col-sm-8">
    Name: <input type="text" name="name" class="form-control" required><br>
    Email: <input type="email" name="email" class="form-control" required><br>
    Category:
    <select name="category" class="form-control">
        <option>-select Category-</option>
        <option>Electricity</option>
        <option>Roads</option>
        <option>Sanitation</option>
    </select><br>
    Location: <input type="text" name="location" class="form-control" required><br>
    Description:<br>
    <textarea name="description" rows="5" cols="30" class="form-control" required></textarea><br>
    <button type="submit" name="submit" class="btn btn-primary col-sm-6">Submit</button>
</form>

<?php
if (isset($_POST['submit'])) {
    $stmt = $conn->prepare("INSERT INTO complaints (name, email, category, description, location) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $_POST['name'], $_POST['email'], $_POST['category'], $_POST['description'], $_POST['location']);
    $stmt->execute();
    echo "Complaint submitted successfully. Your Ticket ID is: " . $stmt->insert_id;
}
?>
            
        </div>
    </div>
</div>
</body>
</html>
