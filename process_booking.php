<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "oceanwave_db";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$guests = $_POST['guests'];
$checkin = $_POST['checkin'];
$checkout = $_POST['checkout'];
$room = $_POST['room'];
$message = $_POST['message'];

$stmt = $conn->prepare("INSERT INTO bookings (name, email, phone, guests, checkin, checkout, room, message) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssssssss", $name, $email, $phone, $guests, $checkin, $checkout, $room, $message);

if ($stmt->execute()) {
    echo "Booking successful!";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>