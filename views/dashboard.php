<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: /views/login.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Users</title>
</head>
<body>
    <h1>Users</h1>
    <a href="/PHP-ADMIN-USER/?action=create">Create User</a>
    <hr>
    <table border="1" cellpadding="10" cellspacing="0">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($users)): ?>
                <?php foreach ($users as $user): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($user['name']); ?></td>
                        <td><?php echo htmlspecialchars($user['email']); ?></td>
                        <td>
                            <a href="/PHP-ADMIN-USER/?action=edit&id=<?php echo $user['id']; ?>">Edit</a>
                            <a href="/PHP-ADMIN-USER/?action=delete&id=<?php echo $user['id']; ?>">Delete</a>
                            <a href="">Add Product</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="3">No users found</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</body>
</html>

