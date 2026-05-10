<?php

  $name = $_POST['name'];
  $email = $_POST['email'];
  $message = $_POST['message'];

?>

<!DOCTYPE html>
<html>
<head>
    <title>Contact Result</title>
</head>
<body>

<h2>Submitted Information</h2>

<table border="1">
<tr><th>Name</th><td><?php echo $name; ?></td></tr>
<tr><th>Email</th><td><?php echo $email; ?></td></tr>
<tr><th>Message</th><td><?php echo $message; ?></td></tr>
</table>

</body>
</html>