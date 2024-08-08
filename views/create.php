
<!DOCTYPE html>
<html>
<head>
    <title>Create User</title>
</head>
<body>
    <h1>Create a User</h1>
    <form action="/PHP-ADMIN-USER/?action=store" method="post">
        <label>Name:</label>
        <input type="text" name="name" required><br><br>
        <label>Email:</label>
        <input type="email" name="email" required><br><br>
        <button type="submit">Create</button>
    </form>
</body>
</html>
