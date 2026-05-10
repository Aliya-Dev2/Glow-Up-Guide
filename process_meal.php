<?php
$conn = mysqli_connect("localhost", "root", "", "glow_up_db");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$name = $_POST['meal_name'];
$cal = $_POST['calories'];
$pro = $_POST['protein'];

$sql = "INSERT INTO Diet (meal_name, calories, protein)
        VALUES ('$name', $cal, $pro)";

mysqli_query($conn, $sql);

$result = mysqli_query($conn, "SELECT * FROM Diet");

$totalCal = 0;
$totalPro = 0;
?>

<!DOCTYPE html>
<html>
<head>
    <title>Meal Progress</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
<div class="container my-5">

<h2 class="text-center mb-4">Meal Progress</h2>

<table class="table table-bordered table-striped bg-white">
<tr>
    <th>ID</th>
    <th>Meal Name</th>
    <th>Calories</th>
    <th>Protein</th>
</tr>

<?php
while ($row = mysqli_fetch_assoc($result)) {
    $totalCal += $row['calories'];
    $totalPro += $row['protein'];

    echo "<tr>";
    echo "<td>".$row['id']."</td>";
    echo "<td>".$row['meal_name']."</td>";
    echo "<td>".$row['calories']."</td>";
    echo "<td>".$row['protein']."</td>";
    echo "</tr>";
}
?>

</table>

<h4>Total Calories: <?php echo $totalCal; ?> / 2000 kcal</h4>
<div class="progress mb-3">
    <div class="progress-bar bg-warning text-dark" style="width: <?php echo ($totalCal/2000)*100; ?>%">
        <?php echo round(($totalCal/2000)*100); ?>%
    </div>
</div>

<h4>Total Protein: <?php echo $totalPro; ?> / 100g</h4>
<div class="progress mb-3">
    <div class="progress-bar bg-warning text-dark" style="width: <?php echo ($totalPro/100)*100; ?>%">
        <?php echo round(($totalPro/100)*100); ?>%
    </div>
</div>

<a href="calorieCounter.html" class="btn btn-warning">Add Another Meal</a>
<a href="Diet.html" class="btn btn-outline-warning">Back to Diet</a>

</div>
</body>
</html>

<?php
mysqli_close($conn);
?>
