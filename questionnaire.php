<?php

$conn = new mysqli("localhost", "root", "", "glowup");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$name = $_POST['name'];
$email = $_POST['email'];
$goal = $_POST['goal'];
$habit = $_POST['habit'];
$feedback = $_POST['feedback'];


$improve = "";
if(isset($_POST['improve'])) {
    $improve = implode(", ", $_POST['improve']);
}


$sql = "INSERT INTO questionnaire (name, email, goal, improve, habit, feedback) VALUES ('$name', '$email', '$goal', '$improve', '$habit', '$feedback')";

if ($conn->query($sql) === TRUE) {
    echo "<h2>Data Saved Successfully!</h2>";
} else {
    echo "Error: " . $conn->error;
}

$conn->close();

?>
