<?php
$conn = new mysqli('localhost', 'root', '', 'lab_5b'); // Connect to database
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

// Get the matric number from the URL
$matric = isset($_GET['matric']) ? $_GET['matric'] : null;

if ($matric) {
    // Delete the user with a prepared statement
    $stmt = $conn->prepare("DELETE FROM users WHERE matric = ?");
    $stmt->bind_param('s', $matric);
    $stmt->execute();
    $message = $stmt->affected_rows > 0 ? "User deleted successfully!" : "User not found!";
    $stmt->close();
} else {
    $message = "No user specified.";
}
$conn->close();
?>

<p><?= htmlspecialchars($message) ?></p>
<a href="manage_user.php">Go back to Manage Users</a>
