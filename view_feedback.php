<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "campaign_feedback";

//  connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Checking connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id, name, email, feedback, rating, submission_date FROM feedback";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Feedback</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h2>Feedback Submissions</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Feedback</th>
            <th>Rating</th>
            <th>Submission Date</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["id"] . "</td>";
                echo "<td>" . $row["name"] . "</td>";
                echo "<td>" . $row["email"] . "</td>";
                echo "<td>" . $row["feedback"] . "</td>";
                echo "<td>" . $row["rating"] . "</td>";
                echo "<td>" . $row["submission_date"] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='6'>No feedback found</td></tr>";
        }
        ?>
    </table>
</body>
</html>

<?php
$conn->close();
?>
