<?php

require_once __DIR__ . "/error.php";
require_once __DIR__ . "/database.php";
require_once __DIR__ . "/Departments.php";

$conn = new mysqli(DB_SERVERNAME, DB_USERNAME, DB_PASSWORD, DB_NAME, DB_PORT);

if ($conn && $conn->connect_error) {
    echo "Connection failed: " . $conn->connect_error;
}

$sql = "SELECT * FROM `departments`";
$result = $conn->query($sql);

$departments = [];

if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $departments[] = new Departments($row["id"], $row["name"]);
    }
} elseif ($result) {
    echo "result empty";
} else {
    echo "query error";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php foreach ($departments as $department) { ?>
        <h2><?php echo $department->name ?></h2>
        <a href=<?php echo "detail.php?id=" . $department->id ?>>Show Details</a>
    <?php } ?>
</body>

</html>