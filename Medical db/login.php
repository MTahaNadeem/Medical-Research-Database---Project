<?php
session_start();
if (isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}
?>

<html>
<head>
    <title>Login</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f4f4f4; margin: 0; padding: 0; display: flex; justify-content: center; align-items: center; height: 100vh;">
    <div style="background-color: #ffffff; padding: 20px; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); width: 300px; text-align: center;">
        <h2 style="font-size: 24px; margin-bottom: 20px; color: #333;">Login</h2>
        <form action="process.php" method="POST">
            <div style="margin-bottom: 15px;">
                <label for="username" style="font-size: 14px; color: #555;">Username:</label><br>
                <input type="text" name="username" required style="width: 100%; padding: 8px; font-size: 14px; border: 1px solid #ccc; border-radius: 4px; margin-top: 5px;">
            </div>
            <div style="margin-bottom: 20px;">
                <label for="password" style="font-size: 14px; color: #555;">Password:</label><br>
                <input type="password" name="password" required style="width: 100%; padding: 8px; font-size: 14px; border: 1px solid #ccc; border-radius: 4px; margin-top: 5px;">
            </div>
            <button type="submit" name="login" style="width: 100%; padding: 10px; background-color: #a06024; color: white; font-size: 16px; border: none; border-radius: 4px; cursor: pointer;">Login</button>
        </form>
    </div>
</body>
</html>
