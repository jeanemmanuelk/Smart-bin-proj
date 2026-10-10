<?php
/**
 * Smart Bin Capstone Project - Data Receiver
 *
 * This script receives data from an ESP32 device equipped with bin sensors and stores it in a database.
 * It validates the API key, processes the received data, and inserts it into the database.
 *
 * Instructions:
 * 1. Set up a MySQL database and update the database credentials ($dbname, $dbuser, $dbpass) accordingly.
 * 2. Replace $api_key_value with your desired API key.
 * 3. Make sure the ESP32 sketch sends the data using an HTTP POST request to this script's URL.
 *
 * @version 1.0
 * @author Your Name
 */

// Database credentials
$dbname = '';       // Your server database name
$dbuser = '';       // Your server username
$dbpass = '';       // Your database password
$dbhost = 'localhost';  // Your database hosting server name ("localhost" for local development)

// Set your own secret value here. It must match apiKeyValue in the ESP32 sketch.
// If you change this value, the ESP32 sketch needs to match
$api_key_value = "YOUR_API_KEY";

// Initialize variables
$api_key = $distance = $weight = $binState = "";

// Check if the request method is POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $api_key = test_input($_POST["api_key"]);

    // Validate the API key
    if ($api_key == $api_key_value) {
        $distance = test_input($_POST["distance"]);
        $weight = test_input($_POST["weight"]);
        $binState = test_input($_POST["binState"]);

        // Create database connection
        $conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

        // Check database connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Prepare SQL statement
        $sql = "INSERT INTO BinSensor (distance, weight, binState) VALUES ('" . $distance . "', '" . $weight . "', '" . $binState . "')";

        // Execute SQL statement
        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        // Close database connection
        $conn->close();
    } else {
        echo "Wrong API Key provided.";
    }
} else {
    echo "No data posted with HTTP POST.";
}

/**
 * Function to sanitize and validate input data
 *
 * @param string $data The input data to be processed
 * @return string The sanitized and validated data
 */
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
