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
    <title>Study</title>
</head>
<body>
<?php 
    include('connection.php'); 

    $update_study = false;
        if (isset($_GET['edit_study'])) {
            $study_id = $_GET['edit_study'];
            $update_study = true;
            $study_record = mysqli_query($conn, "SELECT * FROM Studies WHERE Study_ID='$study_id'"); 
            if ($study_record) {
                $s = mysqli_fetch_array($study_record);
                $Study_ID = $s['Study_ID'];
                $Study_Name = $s['Study_Name'];
                $Study_Purpose = $s['Study_Purpose'];
                $Study_Protocol = $s['Study_Protocol']; 
                $Study_StartDate = $s['Study_StartDate'];
                $Study_EndDate = $s['Study_EndDate'];
            } 
        }
    
?>

    <section id="studies">
    <h2>Studies</h2>
    <form method="post" action="process.php">
        <?php if ($update_study == true): ?>
            <div class="input-group">
                <label>Study ID</label>
                <input type="text" name="Study_ID" value="<?php echo $Study_ID; ?>">
            </div>
            <div class="input-group">
                <label>Study Name</label>
                <input type="text" name="Study_Name" value="<?php echo $Study_Name; ?>">
            </div>
            <div class="input-group">
                <label>Study Purpose</label>
                <input type="text" name="Study_Purpose" value="<?php echo $Study_Purpose; ?>">
            </div>
            <div class="input-group">
                <label>Study Protocol</label>
                <input type="text" name="Study_Protocol" value="<?php echo $Study_Protocol; ?>">
            </div>
            <div class="input-group">
                <label>Study Start Date</label>
                <input type="date" name="Study_StartDate" value="<?php echo $Study_StartDate; ?>">
            </div>
            <div class="input-group">
                <label>Study End Date</label>
                <input type="date" name="Study_EndDate" value="<?php echo $Study_EndDate; ?>">
            </div>
            <div class="input-group">
                <button class="btn" type="submit" name="update_study" style="background: #55682F;">Update</button>
            </div>
        <?php else: ?>
            <div class="input-group">
                <label>Study Name</label>
                <input type="text" name="Study_Name" value="">
            </div>
            <div class="input-group">
                <label>Study Purpose</label>
                <input type="text" name="Study_Purpose" value="">
            </div>
            <div class="input-group">
                <label>Study Protocol</label>
                <input type="text" name="Study_Protocol" value="">
            </div>
            <div class="input-group">
                <label>Study Start Date</label>
                <input type="date" name="Study_StartDate" value="">
            </div>
            <div class="input-group">
                <label>Study End Date</label>
                <input type="date" name="Study_EndDate" value="">
            </div>
            <div class="input-group">
                <button class="btn" type="submit" name="save_study">Save</button>
            </div>
        <?php endif; ?>
    </form>
    </section>


    <table border='2'>
        <thead>
            <tr>
                <th>Study ID</th>
                <th>Study Name</th>
                <th>Purpose</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Action</th>
                <th></th>
            </tr>
        </thead>
        <?php 
        $studies = mysqli_query($conn, "SELECT * FROM Studies");
        while ($study = mysqli_fetch_array($studies)) { ?>
        <tr>
            <td><?php echo $study['Study_ID']; ?></td>
            <td><?php echo $study['Study_Name']; ?></td>
            <td><?php echo $study['Study_Purpose']; ?></td>
            <td><?php echo $study['Study_StartDate']; ?></td>
            <td><?php echo $study['Study_EndDate']; ?></td>
            <td><a href="?edit_study=<?php echo $study['Study_ID']; ?>" class="edit_btn">Edit</a></td>
            <td><a href="process.php?del_study=<?php echo $study['Study_ID']; ?>" class="del_btn">Delete</a></td>
        </tr>
        <?php } ?>
    </table>


</body>
</html>
