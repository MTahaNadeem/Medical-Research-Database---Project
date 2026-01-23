<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
?>

<html>
<head>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<header>
    <h1>Medical Research Database</h1>
    <nav>
    <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="patients.php">Patients</a></li>
        <li><a href="trials.php">Trials</a></li>
        <li><a href="studies.php">Studies</a></li>
        <li><a href="results.php">Results</a></li>
        <li><a href="drugs.php">Drugs</a></li>
        <li><a href="metadata.php">Metadata</a></li>
        <li><a href="logout.php">Logout</a></li>
      </ul>
    </nav>
  </header>

<html>
<head>
    <title>Metadata</title>
</head>
<body>
<?php 
    include('connection.php'); 

$update_metadata = false;
if (isset($_GET['edit_metadata'])) {
    $metadata_id = $_GET['edit_metadata'];
    $update_metadata = true;
    $metadata_record = mysqli_query($conn, "SELECT * FROM Metadata WHERE Metadata_ID='$metadata_id'"); 
    if ($metadata_record) {
        $m = mysqli_fetch_array($metadata_record);
        $Metadata_ID = $m['Metadata_ID'];
        $Trial_ID = $m['Trial_ID'];
    } 
}

?>

    <section id="metadata">
      <h2>Metadata</h2>
    <form method="post" action="process.php">
       <?php if ($update_metadata == true): ?>
            <div class="input-group">
                <label>Metadata ID</label>
                <input type="text" name="Metadata_ID" value="<?php echo $Metadata_ID; ?>">
            </div>
            <div class="input-group">
                <label>Trial ID</label>
                <input type="text" name="Trial_ID" value="<?php echo $Trial_ID; ?>">
            </div>
            <div class="input-group">
                <button class="btn" type="submit" name="update_metadata" style="background: #55682F;">Update</button>
            </div>
        <?php else: ?>
            <div class="input-group">
                <label>Trial ID</label>
                <input type="text" name="Trial_ID" value="">
            </div>
            <div class="input-group">
                <button class="btn" type="submit" name="save_metadata">Save</button>
            </div>
        <?php endif; ?>
    </form>
    </section>

    <table border='2'>
    <thead>
        <tr>
            <th>Metadata ID</th>
            <th>Trial ID</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        $result = mysqli_query($conn, "SELECT * FROM metadata");

        if ($result) {
            while ($row = mysqli_fetch_array($result)) { ?>
                <tr>
                    <td><?php echo $row['Metadata_ID']; ?></td>
                    <td><?php echo $row['Trial_ID']; ?></td>
                    <td><a href="?edit_metadata=<?php echo $row['Metadata_ID']; ?>" class="edit_btn">Edit</a></td>
                    <td><a href="process.php?del_metadata=<?php echo $row['Metadata_ID']; ?>" class="del_btn">Delete</a></td>
                </tr>
            <?php }
        } else {
            echo "<tr><td colspan='4'>No records found.</td></tr>";
        }
        ?>
    </tbody>
</table>


</body>
</html>
