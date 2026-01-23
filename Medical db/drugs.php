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
    <title>Drug</title>
</head>
<body>
<?php 
    include('connection.php'); 

 $update_drug = false;
 if (isset($_GET['edit_drug'])) {
     $drug_id = $_GET['edit_drug'];
     $update_drug = true;
     $drug_record = mysqli_query($conn, "SELECT * FROM Drugs WHERE Drug_ID='$drug_id'"); 
     if ($drug_record) {
         $d = mysqli_fetch_array($drug_record);
         $Drug_ID = $d['Drug_ID'];
         $Drug_Name = $d['Drug_Name'];
         $Drug_Dosage = $d['Drug_Dosage']; 
         $Side_Effect = $d['Side_Effect'];
         $Manufacturer = $d['Manufacturer']; 
     } 
 }

?>

    <section id="drugs">
    <h2>Drugs</h2>
    <form method="post" action="process.php">
        <?php if ($update_drug == true): ?>
            <div class="input-group">
                <label>Drug ID</label>
                <input type="text" name="Drug_ID" value="<?php echo $Drug_ID; ?>">
            </div>
            <div class="input-group">
                <label>Drug Name</label>
                <input type="text" name="Drug_Name" value="<?php echo $Drug_Name; ?>">
            </div>
            <div class="input-group">
                <label>Drug Manufacturer</label>
                <input type="text" name="Manufacturer" value="<?php echo $Manufacturer; ?>">
            </div>
            <div class="input-group">
                <label>Dosage</label>
                <input type="text" name="Drug_Dosage" value="<?php echo $Drug_Dosage; ?>">
            </div>
            <div class="input-group">
                <label>Side Effect</label>
                <input type="text" name="Side_Effect" value="<?php echo $Side_Effect; ?>">
            </div>
            <div class="input-group">
                <button class="btn" type="submit" name="update_drug" style="background: #55682F;">Update</button>
            </div>
        <?php else: ?>
            <div class="input-group">
                <label>Drug Name</label>
                <input type="text" name="Drug_Name" value="">
            </div>
            <div class="input-group">
                <label>Drug Manufacturer</label>
                <input type="text" name="Manufacturer" value="">
            </div>
            <div class="input-group">
                <label>Dosage</label>
                <input type="text" name="Drug_Dosage" value="">
            </div>
            <div class="input-group">
                <label>Side Effect</label>
                <input type="text" name="Side_Effect" value="">
            </div>
            <div class="input-group">
                <button class="btn" type="submit" name="save_drug">Save</button>
            </div>
        <?php endif; ?>
    </form>
    </section>

    <table border='2'>
        <thead>
            <tr>
                <th>Drug ID</th>
                <th>Drug Name</th>
                <th>Dosage</th>
                <th>Side Effect</th>
                <th>Manufacturer</th>
                <th></th>
            </tr>
        </thead>
        <?php 
        $drugs = mysqli_query($conn, "SELECT * FROM Drugs");
        while ($drug = mysqli_fetch_array($drugs)) { ?>
        <tr>
            <td><?php echo $drug['Drug_ID']; ?></td>
            <td><?php echo $drug['Drug_Name']; ?></td>
            <td><?php echo $drug['Drug_Dosage']; ?></td>
            <td><?php echo $drug['Side_Effect']; ?></td>
            <td><?php echo $drug['Manufacturer']; ?></td>
            <td><a href="?edit_drug=<?php echo $drug['Drug_ID']; ?>" class="edit_btn">Edit</a></td>
            <td><a href="process.php?del_drug=<?php echo $drug['Drug_ID']; ?>" class="del_btn">Delete</a></td>
        </tr>
        <?php } ?>
    </table>


</body>
</html>
