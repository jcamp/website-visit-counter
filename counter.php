<?php
// File: counter.php

// Set the file path to store the counter value
$counterFilePath = './counter.txt';

// Check if the file exists
if (file_exists($counterFilePath)) {
  // If the file exists, read the current counter value from the file
  $counter = intval(file_get_contents($counterFilePath));
} else {
  // If the file doesn't exist, set the counter to 0
  $counter = 0;
}

// Check if the request method is POST (indicating an update to the counter value)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Get the new counter value from the request body
  $requestData = json_decode(file_get_contents('php://input'), true);
  $newCounter = intval($requestData['counter']);

  // Write the new counter value to the file
  file_put_contents($counterFilePath, $newCounter);

  // Send a success response with the new counter value
  header('Content-Type: application/json');
  echo json_encode(['counter' => $newCounter]);
} else {
  // If the request method is not POST, assume it's a GET request (to retrieve the current counter value)

  // Send the current counter value as a JSON response
  header('Content-Type: application/json');
  echo json_encode(['counter' => $counter]);
}
?>