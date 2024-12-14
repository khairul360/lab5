<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $matric = $_POST['matric'];
    $name = $_POST['name'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT); // Hash the password
    $role = $_POST['role'];

    $conn = new mysqli('localhost', 'root', '', 'lab_5b'); // Connect to database
    if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

    // Insert user data into the database
    $sql = "INSERT INTO users (matric, name, password, role) VALUES ('$matric', '$name', '$password', '$role')";
    if ($conn->query($sql)) {
        echo "Registration successful!";
    } else {
        echo "Error: " . $conn->error;
    }
    $conn->close();
}
?>

<form method="POST" action="">
    <label>Matric:</label>
    <input type="text" name="matric" required><br>
    <label>Name:</label>
    <input type="text" name="name" required><br>
    <label>Password:</label>
    <input type="password" name="password" required><br>
    <label>Role:</label>
    <select name="role" required>
        <option value="student">Student</option>
        <option value="lecturer">Lecturer</option>
    </select><br>
    <button type="submit">Register</button>
</form>
