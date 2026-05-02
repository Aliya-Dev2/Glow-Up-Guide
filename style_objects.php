<?php
class StyleInfo {
    public $undertone;
    public $best_colors;
    public $jewelry;
    public $avoid_colors;

    function __construct($undertone, $best_colors, $jewelry, $avoid_colors) {
        $this->undertone = $undertone;
        $this->best_colors = $best_colors;
        $this->jewelry = $jewelry;
        $this->avoid_colors = $avoid_colors;
    }

    function getUndertone() {
        return $this->undertone;
    }

    function getBestColors() {
        return $this->best_colors;
    }

    function getJewelry() {
        return $this->jewelry;
    }

    function getAvoidColors() {
        return $this->avoid_colors;
    }
}

$styles = array(
    new StyleInfo("Cool", "Emerald, Lavender, Royal Blue", "Silver", "Orange, Mustard Yellow"),
    new StyleInfo("Warm", "Olive, Peach, Terracotta", "Gold", "Icy Blue, Neon Pink"),
    new StyleInfo("Neutral", "Dusty Rose, Navy, Jade", "Gold and Silver", "Bright Neon Colors")
);

function displayStyles($styles) {

    echo "<table class='table table-bordered table-striped bg-white'>";
    echo "<tr>";
    echo "<th>Undertone</th>";
    echo "<th>Best Colors</th>";
    echo "<th>Jewelry</th>";
    echo "<th>Avoid Colors</th>";
    echo "</tr>";

    foreach ($styles as $style) {

        echo "<tr>";
        echo "<td>".$style->getUndertone()."</td>";
        echo "<td>".$style->getBestColors()."</td>";
        echo "<td>".$style->getJewelry()."</td>";
        echo "<td>".$style->getAvoidColors()."</td>";
        echo "</tr>";
    }


    echo "</table>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Style Objects</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
<div class="container my-5">
    <h2 class="text-center mb-4">Style Information Using PHP Objects</h2>

    <?php
    displayStyles($styles);
    ?>

    <a href="Style.html" class="btn btn-warning">Back to Style Page</a>
</div>
</body>
</html>
