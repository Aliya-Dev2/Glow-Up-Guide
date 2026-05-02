<?php
$conn = mysqli_connect("localhost", "root", "", "glow_up_db");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$age = $_POST['age'];
$height = $_POST['height'];
$weight = $_POST['weight'];


$sql = "INSERT INTO UserDetails (age, height, weight)
        VALUES ($age, $height, $weight)";

mysqli_query($conn, $sql);


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
