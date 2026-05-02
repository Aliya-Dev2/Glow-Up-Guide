<?php

$conn = new mysqli("localhost", "root", "", "glowup");

$goal = $_GET['goal'];

$sql = "SELECT * FROM questionnaire WHERE goal='$goal'";
$result = $conn->query($sql);

echo "<h2>Search Results</h2>";
echo "<table border='1'>
<tr>
<th>Name</th><th>Email</th><th>Goal</th>
<th>Improve</th><th>Habit</th><th>Feedback</th>
</tr>";

while($row = $result->fetch_assoc()) {
    echo "<tr>
    <td>".$row['name']."</td>
    <td>".$row['email']."</td>
    <td>".$row['goal']."</td>
    <td>".$row['improve']."</td>
    <td>".$row['habit']."</td>
    <td>".$row['feedback']."</td>
    </tr>";
}

echo "</table>";

$conn->close();
?>