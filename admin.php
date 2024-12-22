<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dtr_system";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT users.id, users.name, users.email, users.unique_id, time_records.clock_in, time_records.clock_out 
        FROM users 
        LEFT JOIN time_records ON users.id = time_records.user_id";

$result = $conn->query($sql);

$records = array();

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $records[] = $row;
    }
}

echo json_encode($records);

$conn->close();
?>

