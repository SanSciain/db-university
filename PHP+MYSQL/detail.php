<?php

require_once __DIR__ . "/error.php";
require_once __DIR__ . "/database.php";
require_once __DIR__ . "/Departments.php";

$conn = new mysqli(DB_SERVERNAME, DB_USERNAME, DB_PASSWORD, DB_NAME, DB_PORT);


$stmt = $conn->prepare("SELECT * FROM `departments` WHERE `id` = ?");
$stmt->bind_param("d", $id);
$id = $_GET["id"];
$stmt->execute();
$result = $stmt->get_result();

if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $department = new Departments($row["id"], $row["name"]);
        $department->setContacts($row["address"], $row["phone"], $row["email"], $row["website"]);
        $department->head_of_department = $row["head_of_department"];
        $departments[] = $department;
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
    <h1><?php echo $department->name ?></h1>
    <h4><?php echo $department->head_of_department ?></h4>
    <h3>Contacts</h3>
    <ul>
        <li><?php echo $department->address ?></li>
        <li><?php echo $department->phone ?></li>
        <li><?php echo $department->website ?></li>
        <li><?php echo $department->email ?></li>
    </ul>
</body>

</html>