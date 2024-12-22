<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dtr_system";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$uniqueId = $_POST['uniqueId'];

$sql = "SELECT * FROM users WHERE unique_id = '$uniqueId'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $userId = $row['id'];
    
    $sql = "SELECT * FROM time_records WHERE user_id = '$userId' AND clock_out IS NULL";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        $sql = "UPDATE time_records SET clock_out = NOW() WHERE user_id = '$userId' AND clock_out IS NULL";
        if ($conn->query($sql) === TRUE) {
            echo "Clocked out successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        $sql = "INSERT INTO time_records (user_id, clock_in) VALUES ('$userId', NOW())";
        if ($conn->query($sql) === TRUE) {
            echo "Clocked in successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
} else {
    echo "Invalid unique ID";
}

$conn->close();
?>

