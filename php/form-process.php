<?php

$errorMSG = "";

// NAME
if (empty($_POST["name"])) {
    $errorMSG = "Name is required ";
} else {
    $name = $_POST["name"];
}

// EMAIL
if (empty($_POST["email"])) {
    $errorMSG .= "Email is required ";
} else {
    $email = $_POST["email"];
}

// MSG Guest
if (empty($_POST["guest"])) {
    $errorMSG .= "Guest is required ";
} else {
    $guest = $_POST["guest"];
}

// MSG Event
if (empty($_POST["event"])) {
    $errorMSG .= "Event is required ";
} else {
    $event = $_POST["event"];
}

// MESSAGE
if (empty($_POST["message"])) {
    $errorMSG .= "Message is required ";
} else {
    $message = $_POST["message"];
}

// Database connection
$servername = "localhost";
$username = "root"; // default XAMPP username
$password = ""; // default XAMPP password
$dbname = "form_data"; // your database name

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($errorMSG == "") {
    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO messages (name, email, guest, event, message) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $name, $email, $guest, $event, $message);
    
    if ($stmt->execute()) {
        echo "Success! Data has been inserted.";
    } else {
        echo "Error: " . $stmt->error;
    }
    
    $stmt->close();
} else {
    echo $errorMSG;
}

$conn->close();

?>
