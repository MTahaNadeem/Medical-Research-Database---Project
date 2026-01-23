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
    <title>Patients</title>
</head>
<body>
<?php 
    include('connection.php'); 

    $update_patient = false;
    if (isset($_GET['edit_patient'])) {
        $patient_id = $_GET['edit_patient'];
        $update_patient = true;
        $patient_record = mysqli_query($conn, "SELECT * FROM patients WHERE Patient_ID='$patient_id'"); 
        if ($patient_record) {
            $p = mysqli_fetch_array($patient_record);
            $Patient_ID = $p['Patient_ID'];
            $Patient_Name = $p['Patient_Name'];
            $Patient_Age = $p['Patient_Age'];
            $Patient_Gender = $p['Patient_Gender'];
            $Patient_MedicalHistory = $p['Patient_MedicalHistory']; 
            $Patient_Contact = $p['Patient_Contact'];
        } 
    } 
?>

    <section id="patients">
    <h2>Patient Records</h2>
    <form method="post" action="process.php">
        <?php if ($update_patient == true): ?>
            <div class="input-group">
                <label>Patient ID</label>
                <input type="text" name="Patient_ID" value="<?php echo $Patient_ID; ?>">
            </div>
            <div class="input-group">
                <label>Patient Name</label>
                <input type="text" name="Patient_Name" value="<?php echo $Patient_Name; ?>">
            </div>
            <div class="input-group">
                <label>Patient Age</label>
                <input type="text" name="Patient_Age" value="<?php echo $Patient_Age; ?>">
            </div>
            <div class="input-group">
                <label>Patient Gender</label>
                <input type="text" name="Patient_Gender" value="<?php echo $Patient_Gender; ?>">
            </div>
            <div class="input-group">
                <label>Medical History</label>
                <input type="text" name="Patient_MedicalHistory" value="<?php echo $Patient_MedicalHistory; ?>">
            </div>
            <div class="input-group">
                <label>Contact Info</label>
                <input type="text" name="Patient_Contact" value="<?php echo $Patient_Contact; ?>">
            </div>
            <div class="input-group">
                <button class="btn" type="submit" name="update_patient" style="background: #55682F;">Update</button>
            </div>
        <?php else: ?>
            <div class="input-group">
                <label>Patient Name</label>
                <input type="text" name="Patient_Name" value="">
            </div>
            <div class="input-group">
                <label>Patient Age</label>
                <input type="text" name="Patient_Age" value="">
            </div>
            <div class="input-group">
                <label>Patient Gender</label>
                <input type="text" name="Patient_Gender" value="">
            </div>
            <div class="input-group">
                <label>Medical History</label>
                <input type="text" name="Patient_MedicalHistory" value="">
            </div>
            <div class="input-group">
                <label>Contact Info</label>
                <input type="text" name="Patient_Contact" value="">
            </div>
            <div class="input-group">
                <button class="btn" type="submit" name="save_patient">Save</button>
            </div>
        <?php endif; ?>
    </form>
    </section>

    <table border='2'>
        <thead>
            <tr>
                <th>Patient ID</th>
                <th>Patient Name</th>
                <th>Patient Age</th>
                <th>Patient Gender</th>
                <th>Contact Info</th>
                <th>Action</th>
                <th></th> 
            </tr>
        </thead>
        <?php 
        $patients = mysqli_query($conn, "SELECT * FROM patients");
        while ($patient = mysqli_fetch_array($patients)) { ?>
        <tr>
            <td><?php echo $patient['Patient_ID']; ?></td>
            <td><?php echo $patient['Patient_Name']; ?></td>
            <td><?php echo $patient['Patient_Age']; ?></td>
            <td><?php echo $patient['Patient_Gender']; ?></td>
            <td><?php echo $patient['Patient_Contact']; ?></td>
            <td><a href="?edit_patient=<?php echo $patient['Patient_ID']; ?>" class="edit_btn">Edit</a></td>
            <td><a href="process.php?del_patient=<?php echo $patient['Patient_ID']; ?>" class="del_btn">Delete</a></td>
        </tr>
        <?php } ?>
    </table>

</body>
</html>
