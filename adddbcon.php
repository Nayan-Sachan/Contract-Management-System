<?php

$_contractid = $_POST['contractid'];
$_contractname = $_POST['contractname'];
$_status = $_POST['status'];
$_contracttype = $_POST['contracttype'];
$_startdate = $_POST['startdate'];
$_enddate = $_POST['enddate'];
$_description = $_POST['description'];

$con = new mysqli('localhost', 'root', '', 'prac');
if ($con->connect_error) {
    echo "$con->connect_error";
    die("Connection Failed: " . $con->connect_error);
} else {
    $stmt = $con->prepare("INSERT INTO addcontract(`Contract Id`, `Contract Name`, `Status`, `Contract Type`, `Start Date`, `End Date`, `Description`) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssss", $_contractid, $_contractname, $_status, $_contracttype, $_startdate, $_enddate, $_description);
    $execval = $stmt->execute();
    if ($execval) {
        header("Location:http://localhost/youtube/dashboard.php");
    } else {
        echo '<script>alert("Error registering data");</script>';
    }
    $stmt->close();
    $con->close();
}
?>