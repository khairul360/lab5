<?php
$conn = new mysqli('localhost', 'root', '', 'lab_5b'); // Connect to database
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

// Fetch all users from the database
$sql = "SELECT * FROM users";
$result = $conn->query($sql);

if ($result->num_rows > 0): ?>
    <table border="1">
        <thead>
            <tr>
                <th>Matric</th>
                <th>Name</th>
                <th>Level</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($user = $result->fetch_assoc()): ?>
                <tr>
                    <td><?= htmlspecialchars($user['matric']) ?></td>
                    <td><?= htmlspecialchars($user['name']) ?></td>
                    <td><?= htmlspecialchars($user['role']) ?></td>
                    <td>
                        <!-- Update button linking to update_user.php with matric as a parameter -->
                        <a href="update_user.php?matric=<?= urlencode($user['matric']) ?>" style="color: purple; text-decoration: underline;">update</a> |
                        <!-- Delete button (assuming it has a function or link for deletion) -->
                        <a href="delete_user.php?matric=<?= urlencode($user['matric']) ?>" style="color: red; text-decoration: underline;">Delete</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
<?php else: ?>
    <p>No users found.</p>
<?php endif; ?>

<?php $conn->close(); ?>
