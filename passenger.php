<?php
$fullname = $_POST['fullname'];
$email = $_POST['email'];
$no = $_POST['no'];
$d = $_POST['datee'];
$t = $_POST['timee'];
$pickup = $_POST['ploc'];
$drop = $_POST['dloc'];
$sr = $_POST['special'];
$preferred_massage_type = $_POST['pref'];

// Database connection
$conn = new mysqli('localhost', 'root', 'your_password', 'relaxitaxi');
if ($conn->connect_error) {
    echo "$conn->connect_error";
    die("Connection Failed : " . $conn->connect_error);
} else {
    $stmt = $conn->prepare("INSERT INTO passengers (fullname, email, phone, datee, timee, pickup_location, dropoff_location, special_requests, preferred_massage_type) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssssss", $fullname, $email, $no, $d, $t, $pickup, $drop, $sr, $preferred_massage_type);
    
    // Execute the statement
    $execval = $stmt->execute();
    
    // Check if the execution was successful
    if ($execval) {
        echo "Registration successfully...";
    } else {
        echo "Error: " . $conn->error;
    }
    
    // Close the statement and connection
    $stmt->close();
    $conn->close();
}

