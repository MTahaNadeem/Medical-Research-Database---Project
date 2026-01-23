<?php
session_start();
include 'connection.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: first.php");
    exit();
}

$user_id = $_SESSION['user_id'];
$result = $conn->query("SELECT * FROM user_data WHERE user_id = $user_id");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>User Dashboard</title>
</head>
<body>
    <h2>Welcome, User <?php echo $user_id; ?></h2>

    <form action="process.php" method="POST">
        <textarea name="data" required></textarea><br>
        <button type="submit" name="submit_data">Add Data</button>
    </form>

    <h3>Your Data:</h3>
    <ul>
        <?php while ($row = $result->fetch_assoc()) {
            echo "<li>" . htmlspecialchars($row['data']) . "</li>";
        } ?>
    </ul>

    <a href="logout.php">Logout</a>
</body>
</html>
