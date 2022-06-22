<?php
require_once __DIR__ . "/database.php";

$conn = new mysqli(DB_SERVERNAME, DB_USERNAME, DB_PASSWORD, DB_NAME, DB_PORT);

if ($conn && $conn->connect_error) {
    echo "Connection failed: " . $conn->connect_error;
}

$sql = "SELECT * FROM `departments`";
$result = $conn->query($sql);



if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
    }
} elseif ($result) {
    echo "result empty";
} else {
    echo "query error";
}
