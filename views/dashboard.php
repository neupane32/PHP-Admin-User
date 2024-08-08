<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: /views/login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users</title>
    <link rel="stylesheet" href="../css/dashboardStyle.css">
</head>
<body>
    <div class="container">
        <h1>Users</h1>
        <a href="/PHP-ADMIN-USER/?action=create" class="create-user">Create User</a>
        <table>
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
                                <a href="/PHP-ADMIN-USER/?action=delete&id=<?php echo $user['id']; ?>" class="delete">Delete</a>
                                <a href="#">Add Product</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="3" class="no-users">No users found</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
