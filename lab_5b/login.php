<?php
session_start(); // Start a session
$error = ""; // To store error messages

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $matric = $_POST['matric'];
    $password = $_POST['password'];

    $conn = new mysqli('localhost', 'root', '', 'lab_5b'); // Connect to database
    if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

    // Fetch user record from the database
    $sql = "SELECT * FROM users WHERE matric = '$matric'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) { // Verify hashed password
            $_SESSION['user'] = $user;
            header("Location: manage_users.php"); // Redirect to manage users page
            exit;
        } else {
            $error = "Invalid username or password.";
        }
    } else {
        $error = "Invalid username or password.";
    }
    $conn->close();
}
?>

<form method="POST" action="">
    <label for="matric">Matric:</label>
    <input type="text" id="matric" name="matric" required><br><br>

    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required><br><br>

    <button type="submit">Login</button>
</form>

<?php if (!empty($error)): ?>
    <div style="color: red; margin-top: 10px;">
        <?= $error ?> Try <a href="login.php" style="color: blue; text-decoration: underline;">login</a> again.
    </div>
<?php endif; ?>

<p style="margin-top: 10px;">
    <a href="register.php" style="color: blue; text-decoration: underline;">Register here if you have not.</a>
</p>
