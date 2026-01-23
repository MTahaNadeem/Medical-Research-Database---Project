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
    <title>Trial</title>
</head>
<body>
<?php 
    include('connection.php'); 

     $update_trial = false;
     if (isset($_GET['edit_trial'])) {
         $trial_id = $_GET['edit_trial'];
         $update_trial = true;
         $trial_record = mysqli_query($conn, "SELECT * FROM Trials WHERE Trial_ID='$trial_id'"); 
         if ($trial_record) {
             $t = mysqli_fetch_array($trial_record);
             $Trial_ID = $t['Trial_ID'];
             $Trial_Title = $t['Trial_Title'];
             $Trial_StartDate = $t['Trial_StartDate'];
             $Trial_EndDate = $t['Trial_EndDate'];
             $Trial_Status = $t['Trial_Status']; 
             $Trial_Result = $t['Trial_Result']; 
         } 
     }
?>

    <section id="trials">
    <h2>Clinic Trials</h2>
    <form method="post" action="process.php">
        <?php if ($update_trial == true): ?>
            <div class="input-group">
                <label>Trial ID</label>
                <input type="text" name="Trial_ID" value="<?php echo $Trial_ID; ?>">
            </div>
            <div class="input-group">
                <label>Trial Title</label>
                <input type="text" name="Trial_Title" value="<?php echo $Trial_Title; ?>">
            </div>
            <div class="input-group">
                <label>Trial Start Date</label>
                <input type="date" name="Trial_StartDate" value="<?php echo $Trial_StartDate; ?>">
            </div>
            <div class="input-group">
                <label>Trial End Date</label>
                <input type="date" name="Trial_EndDate" value="<?php echo $Trial_EndDate; ?>">
            </div>
            <div class="input-group">
                <label>Status</label>
                <input type="text" name="Trial_Status" value="<?php echo $Trial_Status; ?>">
            </div>
            <div class="input-group">
                <label>Trial Result</label>
                <input type="text" name="Trial_Result" value="<?php echo $Trial_Result; ?>">
            </div>
            <div class="input-group">
                <button class="btn" type="submit" name="update_trial" style="background: #55682F;">Update</button>
            </div>
        <?php else: ?>
            <div class="input-group">
                <label>Trial Title</label>
                <input type="text" name="Trial_Title" value="">
            </div>
            <div class="input-group">
                <label>Trial Start Date</label>
                <input type="date" name="Trial_StartDate" value="">
            </div>
            <div class="input-group">
                <label>Trial End Date</label>
                <input type="date" name="Trial_EndDate" value="">
            </div>
            <div class="input-group">
                <label>Status</label>
                <input type="text" name="Trial_Status" value="">
            </div>
            <div class="input-group">
                <label>Trial Result</label>
                <input type="text" name="Trial_Result" value="">
            </div>
            <div class="input-group">
                <button class="btn" type="submit" name="save_trial">Save</button>
            </div>
        <?php endif; ?>
    </form>
    </section>

    <table border='2'>
        <thead>
            <tr>
                <th>Trial ID</th>
                <th>Trial Title</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Action</th>
                <th></th>
            </tr>
        </thead>
        <?php 
        $trials = mysqli_query($conn, "SELECT * FROM trials");
        while ($trial = mysqli_fetch_array($trials)) { ?>
        <tr>
            <td><?php echo $trial['Trial_ID']; ?></td>
            <td><?php echo $trial['Trial_Title']; ?></td>
            <td><?php echo $trial['Trial_StartDate']; ?></td>
            <td><?php echo $trial['Trial_EndDate']; ?></td>
            <td><a href="?edit_trial=<?php echo $trial['Trial_ID']; ?>" class="edit_btn">Edit</a></td>
            <td><a href="process.php?del_trial=<?php echo $trial['Trial_ID']; ?>" class="del_btn">Delete</a></td>
        </tr>
        <?php } ?>
    </table>


</body>
</html>
