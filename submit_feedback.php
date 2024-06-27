<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "campaign_feedback";

// connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Checking connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $conn->real_escape_string($_POST['name']);
    $email = $conn->real_escape_string($_POST['email']);
    $feedback = $conn->real_escape_string($_POST['feedback']);
    $rating = (int)$_POST['rating'];

    $sql = "INSERT INTO feedback (name, email, feedback, rating, submission_date) VALUES ('$name', '$email', '$feedback', $rating, NOW())";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
