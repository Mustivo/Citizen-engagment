<?php
session_start();
require '../connection/connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = hash("sha256", $_POST['password']);
    $res = $conn->query("SELECT * FROM admins WHERE username='$username' AND password='$password'");
    if ($res->num_rows == 1) {
        $_SESSION['admin'] = $username;
        header("Location: dashboard.php");
    } else {
        echo "Invalid credentials!";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <div class="container d-flex justify-content-center mt-5">
        <form method="post" class="col-sm-6 border rounded p-4 mt-5">
            <h4 class="text-primary text-center pb-4">User Admin</h4>
            Username: <input name="username" class="form-control" required>
            Password: <input name="password" type="password" class="form-control" required><br>
            <button type="submit" class="btn btn-primary w-50">Login</button>
        </form>
    </div>
    
</body>
</html>
