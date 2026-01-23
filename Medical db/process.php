<?php
session_start();

include('connection.php');

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        $_SESSION['user_id'] = $username; 
        header("Location: index.php"); 
        exit();
    } else {
        echo "Invalid username or password.";
    }
}


include('connection.php');

if (isset($_POST['save_patient'])) {
    $Patient_Name = $_POST['Patient_Name'];
    $Patient_Age = $_POST['Patient_Age'];
    $Patient_Gender = $_POST['Patient_Gender'];
    $Patient_Contact = $_POST['Patient_Contact'];
    $Medical_History = $_POST['Medical_History'];

    mysqli_query($conn, "INSERT INTO patients (Patient_Name, Patient_Age, Patient_Gender, Patient_Contact, Medical_History) VALUES ('$Patient_Name', '$Patient_Age', '$Patient_Gender', '$Patient_Contact', '$Medical_History')");
    header('Location: index.php');
}

if (isset($_POST['save_trial'])) {
    $Trial_Title = $_POST['Trial_Title'];
    $Trial_StartDate = $_POST['Trial_StartDate'];
    $Trial_EndDate = $_POST['Trial_EndDate'];
    $Status = $_POST['Status']; 
    $Result = $_POST['Result']; 

    mysqli_query($conn, "INSERT INTO trials (Trial_Title, Trial_StartDate, Trial_EndDate, Status, Result) VALUES ('$Trial_Title', '$Trial_StartDate', '$Trial_EndDate', '$Status', '$Result')");
    header('Location: index.php');
}

if (isset($_POST['save_study'])) {
    $Study_Name = $_POST['Study_Name'];
    $Study_Purpose = $_POST['Study_Purpose'];
    $Study_StartDate = $_POST['Study_StartDate'];
    $Study_EndDate = $_POST['Study_EndDate'];
    $Protocol = $_POST['Protocol'];

    mysqli_query($conn, "INSERT INTO studies (Study_Name, Study_Purpose, Study_StartDate, Study_EndDate, Protocol) VALUES ('$Study_Name', '$Study_Purpose', '$Study_StartDate', '$Study_EndDate', '$Protocol')");
    header('Location: index.php');
}

if (isset($_POST['save_result'])) {
    $Trial_ID = $_POST['Trial_ID']; 
    $Study_ID = $_POST['Study_ID']; 
    $Outcome = $_POST['Outcome'];
    $Summary = $_POST['Summary'];
    $Date_Recorded = $_POST['Date_Recorded'];

    mysqli_query($conn, "INSERT INTO results (Trial_ID, Study_ID, Outcome, Summary, Date_Recorded) VALUES ('$Trial_ID', '$Study_ID', '$Outcome', '$Summary', '$Date_Recorded')");
    
    header('Location: index.php');
}

if (isset($_POST['save_drug'])) {
    $Drug_Name = $_POST['Drug_Name'];
    $Drug_Dosage = $_POST['Drug_Dosage'];
    $Side_Effect = $_POST['Side_Effect'];
    $Manufacturer = $_POST['Manufacturer'];

    mysqli_query($conn, "INSERT INTO drugs (Drug_Name, Drug_Dosage, Side_Effect, Manufacturer) VALUES ('$Drug_Name', '$Drug_Dosage', '$Side_Effect', '$Manufacturer')");
    header('Location: index.php');
}

if (isset($_POST['save_metadata'])) {
    $Metadata_ID  = $_POST['Metadata_ID'];
    $Trial_ID = $_POST['Trial_ID']; 

    mysqli_query($conn, "INSERT INTO metadata (Metadata_ID, Trial_ID) VALUES ('$Metadata_ID', '$Trial_ID')");
    header('Location: index.php');
}

if (isset($_POST['update_patient'])) {
    $Patient_ID = $_POST['Patient_ID'];
    $Patient_Name = $_POST['Patient_Name'];
    $Patient_Age = $_POST['Patient_Age'];
    $Patient_Gender = $_POST['Patient_Gender'];
    $Patient_Contact = $_POST['Patient_Contact'];
    $Medical_History = $_POST['Medical_History'];

    mysqli_query($conn, "UPDATE patients SET Patient_Name='$Patient_Name', Patient_Age='$Patient_Age', Patient_Gender='$Patient_Gender', Medical_History='$Medical_History', Patient_Contact='$Patient_Contact' WHERE Patient_ID='$Patient_ID'");
    header('Location: index.php');
}

if (isset($_GET['del_patient'])) {
    $Patient_ID = $_GET['del_patient'];

    $delete_query = "DELETE FROM patients WHERE Patient_ID = $Patient_ID";

    if (mysqli_query($conn, $delete_query)) {
        echo "Patient record deleted successfully.";
        header("Location: index.php"); 
        exit();
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
}

if (isset($_POST['update_trial'])) {
    $Trial_ID  = $_POST['Trial_ID'];
    $Trial_Title = $_POST['Trial_Title'];
    $Trial_StartDate = $_POST['Trial_StartDate'];
    $Trial_EndDate = $_POST['Trial_EndDate'];
    $Status = $_POST['Status']; 
    $Result = $_POST['Result']; 

   mysqli_query($conn, "UPDATE trials SET Trial_Title='$Trial_Title', Trial_StartDate='$Trial_StartDate', Trial_EndDate='$Trial_EndDate', Status='$Status', Result='$Trial_ReResultsult' WHERE Trial_ID='$Trial_ID'");
   header('Location: index.php');
}

if (isset($_GET['del_trial'])) {
    $Trial_ID =  $_GET['del_trial']; 

    $delete_query = "DELETE FROM trials WHERE Trial_ID = $Trial_ID";

    if (mysqli_query($conn, $delete_query)) {
        header('Location: index.php');
        exit();
    } else {
        echo "Error deleting trial: " . mysqli_error($conn);
    }
}


if (isset($_POST['update_study'])) {
   $Study_ID  = $_POST['Study_ID']; 
   $Study_Name = $_POST['Study_Name'];
   $Study_Purpose = $_POST['Study_Purpose'];
   $Study_StartDate = $_POST['Study_StartDate'];
   $Study_EndDate = $_POST['Study_EndDate'];
   $Protocol = $_POST['Protocol'];

   mysqli_query($conn, "UPDATE studies SET Study_Name='$Study_Name', Study_Purpose='$Study_Purpose', Study_StartDate='$Study_StartDate', Study_EndDate='$Study_EndDate', Protocol='$Protocol' WHERE Study_ID='$Study_ID'");
   header('Location: index.php');
}

if (isset($_GET['del_study'])) {
    $study_id = mysqli_real_escape_string($conn, $_GET['del_study']);

    $delete_query = "DELETE FROM studies WHERE Study_ID = '$study_id'";

    if (mysqli_query($conn, $delete_query)) {
        header('Location: index.php');
        exit();
    } else {
        echo "Error deleting study: " . mysqli_error($conn);
    }
}


if (isset($_POST['update_result'])) {
   $Result_ID  = $_POST['Result_ID']; 
   $Trial_ID  = $_POST['Trial_ID']; 
   $Study_ID = $_POST['Study_ID']; 
   $Outcome = $_POST['Outcome'];
   $Summary = $_POST['Summary'];
   $Date_Recorded = $_POST['Date_Recorded'];

   mysqli_query($conn, "UPDATE results SET Trial_ID='$Trial_ID', Study_ID='$Study_ID', Outcome='$Outcome', Summary='$Summary', Date_Recorded='$Date_Recorded' WHERE Result_ID='$Result_ID'");
   header('Location: index.php');
}

if (isset($_GET['del_result'])) {
    $result_id = mysqli_real_escape_string($conn, $_GET['del_result']);

    $delete_query = "DELETE FROM results WHERE Result_ID = '$result_id'";

    if (mysqli_query($conn, $delete_query)) {
        header('Location: index.php');
        exit();
    } else {
        echo "Error deleting result: " . mysqli_error($conn);
    }
}


if (isset($_POST['update_drug'])) {
   $Drug_ID  = $_POST['Drug_ID']; 
   $Drug_Name = $_POST['Drug_Name'];
   $Drug_Dosage = $_POST['Drug_Dosage'];
   $Side_Effect = $_POST['Side_Effect'];
   $Manufacturer = $_POST['Manufacturer'];

   mysqli_query($conn, "UPDATE drugs SET Drug_Name='$Drug_Name', Drug_Dosage='$Drug_Dosage', Side_Effect='$Side_Effect', Manufacturer='$Manufacturer' WHERE Drug_ID='$Drug_ID'");
   header('Location: index.php');
}

if (isset($_GET['del_drug'])) {
    $drug_id = mysqli_real_escape_string($conn, $_GET['del_drug']);

    $delete_query = "DELETE FROM drugs WHERE Drug_ID = '$drug_id'";

    if (mysqli_query($conn, $delete_query)) {
        header('Location: index.php');
        exit();
    } else {
        echo "Error deleting drug: " . mysqli_error($conn);
    }
}


if (isset($_POST['update_metadata'])) {
   $Metadata_ID  = $_POST["Metadata_ID"]; 
   $Trial_ID  = $_POST["Trial_ID"]; 

   mysqli_query($conn, "UPDATE metadata SET Trial_ID='$Trial_ID' WHERE Metadata_ID='$Metadata_ID'");
   header('Location: index.php');
}

if (isset($_GET["del_metadata"])) {
    $Metadata_ID =  $_GET["del_metadata"];

    $delete_query = "DELETE FROM metadata WHERE Metadata_ID = '$Metadata_ID'";

    if (mysqli_query($conn, $delete_query)) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error deleting metadata: " . mysqli_error($conn);
    }
}

?>