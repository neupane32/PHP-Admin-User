<!-- views/users/edit.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Edit User</title>
</head>
<body>
    <h1>Edit User</h1>
    <form action="/mvc_pattern_crud/?action=update&id=<?php echo $user['id']; ?>" method="post">
        <label>Name:</label>
        <input type="text" name="name" value="<?php echo $user['name']; ?>" required> <br> <br>
        <label>Email:</label>
        <input type="email" name="email" value="<?php echo $user['email']; ?>" required><br> <br>
        <button type="submit">Update</button>
    </form>
</body>
</html>
