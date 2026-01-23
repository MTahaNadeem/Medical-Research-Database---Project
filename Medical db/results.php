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
    <title>Result</title>
</head>
<body>
<?php 
    include('connection.php'); 
   
    $update_result = false;
    if (isset($_GET['edit_result'])) {
        $result_id = $_GET['edit_result'];
        $update_result = true;
        $result_record = mysqli_query($conn, "SELECT * FROM Results WHERE Result_ID='$result_id'"); 
        if ($result_record) {
            $r = mysqli_fetch_array($result_record);
            $Result_ID = $r['Result_ID'];
            $Study_ID = $r['Study_ID'];
            $Patient_ID = $r['Patient_ID'];
            $Result_Observation = $r['Result_Observation']; 
            $Result_Measurement = $r['Result_Measurement']; 
            $Result_Timestamp = $r['Result_Timestamp']; 
        } 
    }


?>

    <section id="results">
    <h2>Results</h2>
    <form method="post" action="process.php">
        <?php if ($update_result == true): ?>
            <div class="input-group">
                <label>Result ID</label>
                <input type="text" name="Result_ID" value="<?php echo $Result_ID; ?>">
            </div>
            <div class="input-group">
                <label>Trial ID</label>
                <input type="text" name="Trial_ID" value="<?php echo $Trial_ID; ?>">
            </div>
            <div class="input-group">
                <label>Study ID</label>
                <input type="text" name="Study_ID" value="<?php echo $Study_ID; ?>">
            </div>
            <div class="input-group">
                <label>Outcome</label>
                <input type="text" name="Outcome" value="<?php echo $Outcome; ?>">
            </div>
            <div class="input-group">
                <label>Summary</label>
                <input type="text" name="Summary" value="<?php echo $Summary; ?>">
            </div>
            <div class="input-group">
                <label>Date_Recorded</label>
                <input type="datetime-local" name="Date_Recorded" value="<?php echo $Date_Recorded; ?>">
            </div>
            <div class="input-group">
                <button class="btn" type="submit" name="update_result" style="background: #55682F;">Update</button>
            </div>
        <?php else: ?>
            <div class="input-group">
                <label>Trial ID</label>
                <input type="text" name="Trial_ID" value="">
            </div>
            <div class="input-group">
                <label>Study ID</label>
                <input type="text" name="Study_ID" value="">
            </div>
            <div class="input-group">
                <label>Outcome</label>
                <input type="text" name="Outcome" value="">
            </div>
            <div class="input-group">
                <label>Summary</label>
                <input type="text" name="Summary" value="">
            </div>
            <div class="input-group">
                <label>Date_Recorded</label>
                <input type="datetime-local" name="Date_Recorded" value="">
            </div>
            <div class="input-group">
                <button class="btn" type="submit" name="save_result">Save</button>
            </div>
        <?php endif; ?>
    </form>
    </section>

    <table border='2'>
        <thead>
            <tr>
                <th>Result ID</th>
                <th>Trial ID</th>
                <th>Study ID</th>
                <th>Outcome</th>
                <th>Summary</th>
                <th>Date Recorded</th>
                <th>Action</th>
                <th></th>
            </tr>
        </thead>
        <?php 
        $results = mysqli_query($conn, "SELECT * FROM Results");
        while ($result = mysqli_fetch_array($results)) { ?>
        <tr>
            <td><?php echo $result['Result_ID']; ?></td>
            <td><?php echo $result['Trial_ID']; ?></td>
            <td><?php echo $result['Study_ID']; ?></td>
            <td><?php echo $result['Outcome']; ?></td>
            <td><?php echo $result['Summary']; ?></td>
            <td><?php echo $result['Date_Recorded']; ?></td>
            <td><a href="?edit_result=<?php echo $result['Result_ID']; ?>" class="edit_btn">Edit</a></td>
            <td><a href="process.php?del_result=<?php echo $result['Result_ID']; ?>" class="del_btn">Delete</a></td>
        </tr>
        <?php } ?>
    </table>


</body>
</html>
