<?php
$conn = mysqli_connect("localhost", "root", "", "glow_up_db");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$message = "";

if (isset($_POST['add'])) {
    $exercise = $_POST['exercise'];
    $category = $_POST['category'];
    $mins = $_POST['mins'];
    $intensity = $_POST['intensity'];

    if ($exercise != "" && $category != "" && $mins != "" && $intensity != "") {
        $sql = "INSERT INTO Fitness (exercise, category, mins, intensity)
                VALUES ('$exercise', '$category', $mins, '$intensity')";
        mysqli_query($conn, $sql);
        
        $message = "Exercise added successfully!";
    } else {
        $message = "Please fill in all fields.";

    }
}

if (isset($_POST['delete'])) {
    $id = $_POST['id'];

    if ($id != "") {

        $sql = "DELETE FROM Fitness WHERE id = $id";
        mysqli_query($conn, $sql);
        $message = "Exercise deleted successfully!";
    }
}

if (isset($_GET['search'])) {

    $search = $_GET['search'];

    $sql = "SELECT * FROM Fitness 
            WHERE exercise LIKE '%$search%' 
            OR category LIKE '%$search%'";
} else {
    $sql = "SELECT * FROM Fitness";
}

$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Fitness Database</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
<div class="container my-5">

    <h1 class="text-center mb-4">Fitness Database</h1>

    <?php
    if ($message != "") {
        echo "<div class='alert alert-info'>$message</div>";
    }
    ?>

    <div class="card p-4 mb-4">
        <h3>Search Exercise</h3>
        <form method="GET">
            <input type="text" name="search" class="form-control mb-2" placeholder="Search exercise or category">
            <button type="submit" class="btn btn-warning">Search</button>
        </form>
    </div>

    <div class="card p-4 mb-4">
        <h3>Add Exercise</h3>
        <form method="POST">
            <input type="text" name="exercise" class="form-control mb-2" placeholder="Exercise name">
            <input type="text" name="category" class="form-control mb-2" placeholder="Category">
            <input type="number" name="mins" class="form-control mb-2" placeholder="Minutes">
            <input type="text" name="intensity" class="form-control mb-2" placeholder="Intensity">

            <button type="submit" name="add" class="btn btn-success">Add Exercise</button>
        </form>
    </div>

    <div class="card p-4 mb-4">
        <h3>Delete Exercise</h3>
        <form method="POST">
            <input type="number" name="id" class="form-control mb-2" placeholder="Enter ID to delete">
            <button type="submit" name="delete" class="btn btn-danger">Delete</button>
        </form>
    </div>

    <h3>Fitness Records</h3>

    <table class="table table-bordered table-striped bg-white">
        <tr>
            <th>ID</th>
            <th>Exercise</th>
            <th>Category</th>
            <th>Minutes</th>
            <th>Intensity</th>

        </tr>

        <?php
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>".$row['id']."</td>";
            echo "<td>".$row['exercise']."</td>";
            echo "<td>".$row['category']."</td>";
            echo "<td>".$row['mins']."</td>";
            echo "<td>".$row['intensity']."</td>";
            echo "</tr>";

        }
        ?>
    </table>

    <a href="Fitness.html" class="btn btn-warning">Back to Fitness</a>

</div>
</body>
</html>

<?php
mysqli_close($conn);
?>
