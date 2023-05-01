<?php

// show errors
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "gaana_medical_records";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// get the value from the form
if(isset($_POST['submit'])) {

    $patientId=$_POST['patientId'];
    // check if the patientId is 10 digits
    if(strlen($patientId) != 10){
        echo "Patient ID should be 10 digits";
        exit();
    }
    $patientName=$_POST['patientName'];
    $hospitalName=$_POST['hospitalName'];
    $doctorName=$_POST['doctorName'];
    $date=$_POST['date'];
    $vitalStatistics=$_POST['vitalStatistics'];
    $symptoms=$_POST['symptoms'];
    $treatment=$_POST['treatment'];
    $nextCheckupDate=$_POST['nextCheckupDate'];
    $extraNote=$_POST['extraNote'];
    $recordId=rand(1000000000,9999999999);

    // Prepare the SQL statement
    $sql = "INSERT INTO records (recordId, patientId, patientName, hospitalName, doctorName, date, vitalStatistics, symptoms, treatment, nextCheckupDate, extraNote) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);

    // Bind the parameters to the prepared statement
    $stmt->bind_param("sssssssssss", $recordId, $patientId, $patientName, $hospitalName, $doctorName, $date, $vitalStatistics, $symptoms, $treatment, $nextCheckupDate, $extraNote);

    // Execute the prepared statement
    if ($stmt->execute() === TRUE) {
        echo "Record added successfully";

        ?>
<!DOCTYPE html>
<html>

<head>
    <title>Medical Records</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>

    <form>
        <input name="patientId" id="patientId" value="<?php echo $patientId ?>" hidden>
        <input name="patientName" id="patientName" value="<?php echo $patientName ?>" hidden>
        <input name="hospitalName" id="hospitalName" value="<?php echo $hospitalName ?>" hidden>
        <input name="doctorName" id="doctorName" value="<?php echo $doctorName ?>" hidden>
        <input name="date" id="year" value="2023" hidden>
        <input name="date" id="date" value="<?php echo $date ?>" hidden>
        <input name="vitalStatistics" id="vitalStatistics" value="<?php echo $vitalStatistics ?>" hidden>
        <input name="symptoms" id="symptoms" value="<?php echo $symptoms ?>" hidden>
        <input name="treatment" id="treatment" value="<?php echo $treatment ?>" hidden>
        <input name="nextCheckupDate" id="nextCheckupDate" value="<?php echo $nextCheckupDate ?>" hidden>
        <input name="extraNote" id="extraNote" value="<?php echo $extraNote ?>" hidden>
        <input name="recordId" id="recordId" value="<?php echo $recordId ?>" hidden>



    </form>
    <h1>Record Added Successfully</h1>

    <script src="uploadbundle.js"></script>

</body>
<?php
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

}else{
    echo "No data received";
}

// Close the connection
$conn->close();

?>