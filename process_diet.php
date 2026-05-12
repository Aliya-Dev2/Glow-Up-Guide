<?php

$conn = mysqli_connect("localhost", "root", "");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

mysqli_query($conn, "CREATE DATABASE IF NOT EXISTS glow_up_db");
mysqli_select_db($conn, "glow_up_db");

mysqli_query($conn, "CREATE TABLE IF NOT EXISTS UserDetails (
    id INT AUTO_INCREMENT PRIMARY KEY,
    age INT,
    height INT,
    weight INT
)");

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $age = $_POST['age'];
    $height = $_POST['height'];
    $weight = $_POST['weight'];

    if ($age != "" && $height != "" && $weight != "") {
        $sql = "INSERT INTO UserDetails (age, height, weight)
                VALUES ($age, $height, $weight)";
        mysqli_query($conn, $sql);

        $message = "Details added successfully!";
    } else {
        $message = "Please fill in all fields.";
    }
}

$result = mysqli_query($conn, "SELECT * FROM UserDetails");
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Diet Information</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container my-5">

<h2 class="text-center mb-4">Diet User Details</h2>

<?php
if ($message != "") {
    echo "<div class='alert alert-info'>$message</div>";
}
?>

<table class="table table-bordered table-striped bg-white">
<tr>
    <th>ID</th>
    <th>Age</th>
    <th>Height</th>
    <th>Weight</th>
</tr>

<?php
while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>";
    echo "<td>".$row['id']."</td>";
    echo "<td>".$row['age']."</td>";
    echo "<td>".$row['height']." cm</td>";
    echo "<td>".$row['weight']." kg</td>";
    echo "</tr>";
}
?>
</table>

<a href="Diet.html" class="btn btn-warning">Back to Diet</a>

</div>

</body>
</html>

<?php
mysqli_close($conn);
?>
