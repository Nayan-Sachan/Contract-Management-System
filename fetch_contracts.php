<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "prac";

// Create a connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check the connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Function to get all contracts from the database
function getAllContracts($conn)
{
    $sql = "SELECT * FROM contracts";
    $result = mysqli_query($conn, $sql);
    $contracts = array();

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $contracts[] = $row;
        }
    }

    return $contracts;
}

// Function to get contracts by type from the database
function getContractsByType($conn, $type)
{
    $sql = "SELECT * FROM contracts WHERE Contract Type = 'Revenue Expenditure'";
    $result = mysqli_query($conn, $sql);
    $contracts = array();

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $contracts[] = $row;
        }
    }

    return $contracts;
}

// Close the connection
mysqli_close($conn);
?>
