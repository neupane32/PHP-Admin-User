<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create User</title>
    <link rel="stylesheet" href="../css/createStyle.css">
</head>
<body>
    <div class="container">
        <h1>Create a User</h1>
        <form action="/PHP-ADMIN-USER/?action=store" method="post">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <button type="submit">Create</button>
        </form>
    </div>
</body>
</html>
