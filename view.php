<?php

    $conn = new mysqli("localhost", "root", "", "glowup");


    class User {
        public $name;
        public $email;
        public $goal;

        function __construct($name, $email, $goal) {
            $this->name = $name;
            $this->email = $email;
            $this->goal = $goal;
        }
    }


    $sql = "SELECT * FROM questionnaire";
    $result = $conn->query($sql);


    $users = array();

    while($row = $result->fetch_assoc()) {
        $user = new User($row['name'], $row['email'], $row['goal']);
        array_push($users, $user);
    }


    function displayTable($users) {

        echo "<h2>All Users</h2>";

        echo "<table border='1'>
        <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Goal</th>
        </tr>";

        foreach($users as $u) {
            echo "<tr>
            <td>$u->name</td>
            <td>$u->email</td>
            <td>$u->goal</td>
            </tr>";
        }

        echo "</table>";
    }


    displayTable($users);

    $conn->close();

?>