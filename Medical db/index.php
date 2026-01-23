<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
if (isset($_POST['logout'])) {
    session_unset(); 
    session_destroy(); 
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

  <main>
    <section id="home">
      <h2>Welcome to the Medical Research Database</h2>
      <p>Manage clinical trials, patient records, studies, results, and drug data efficiently.</p>
    </section>

</body>
</html>
