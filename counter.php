<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$counterFile = 'counter.txt';

// Read the current counts from the file
$counts = json_decode(file_get_contents($counterFile), true);

// Increment the click count
$counts['clicks'] = isset($counts['clicks']) ? $counts['clicks'] + 1 : 1;

// Get the user's IP address
$ip = $_SERVER['REMOTE_ADDR'];

// Check if the user's IP is already recorded as a visitor
if (!in_array($ip, $counts['visitors'])) {
   // If not, add the IP to the list of visitors and increment the visit count
   $counts['visitors'][] = $ip;
   $counts['visits'] = isset($counts['visits']) ? $counts['visits'] + 1 : 1;
}

// Write the updated counts back to the file
file_put_contents($counterFile, json_encode($counts));

// Output the updated counts as JSON
echo json_encode($counts);
