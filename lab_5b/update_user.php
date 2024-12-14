<?php
$conn = new mysqli('localhost', 'root', '', 'lab_5b'); // Connect to database
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

// Get the matric number from the URL
$matric = isset($_GET['matric']) ? $_GET['matric'] : null;

if ($matric) {
    // Fetch the user details based on the matric
    $sql = "SELECT * FROM users WHERE matric = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $matric);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows == 1) {
        $user = $result->fetch_assoc();
    } else {
        echo "User not found!";
        exit;
    }
} else {
    echo "No matric number provided!";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Handle the form submission to update user details
    $name = $_POST['name'];
    $role = $_POST['role'];

    // Update query
    $update_sql = "UPDATE users SET name = ?, role = ? WHERE matric = ?";
    $update_stmt = $conn->prepare($update_sql);
    $update_stmt->bind_param('sss', $name, $role, $matric);
    $update_stmt->execute();

    echo "User updated successfully! <a href='manage_users.php'>Go back to Manage Users</a>";
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update User</title>
</head>
<body>
    <h1>Update User</h1>

    <form action="update_user.php?matric=<?= urlencode($matric) ?>" method="POST">
        <label for="matric">Matric:</label>
        <input type="text" id="matric" name="matric" value="<?= htmlspecialchars($user['matric']) ?>" readonly><br><br>

        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="<?= htmlspecialchars($user['name']) ?>"><br><br>

        <label for="role">Access Level:</label>
        <select id="role" name="role">
            <option value="student" <?= $user['role'] == 'student' ? 'selected' : '' ?>>Student</option>
            <option value="lecturer" <?= $user['role'] == 'lecturer' ? 'selected' : '' ?>>Lecturer</option>
        </select><br><br>

        <button type="submit">Update</button>
        <a href="manage_users.php">Cancel</a>
    </form>
</body>
</html>

<?php
$conn->close();
?>
