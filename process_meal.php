<?php
$conn = mysqli_connect("localhost", "root", "", "glow_up_db");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$name = $_POST['meal_name'];
$cal = $_POST['calories'];
$pro = $_POST['protein'];

mysqli_query($conn, "INSERT INTO Diet (meal_name, calories, protein)
VALUES ('$name', $cal, $pro)");

echo "Meal saved!";

?>
