<?php
require __DIR__ . '/autoload.php'; // Include the Twilio PHP SDK autoload file

use Twilio\Rest\Client;

// Twilio credentials
$account_sid = 'ACa65a4fc4e39bb7377d4cb0e25bf6c6ea'; // Your Twilio Account SID
$auth_token = '0163b291b5299da5b372ba748f18a80c'; // Your Twilio Auth Token
$twilio_number = '+18288454547'; // Your Twilio phone number

// Create a new Twilio client
$client = new Client($account_sid, $auth_token);

// Check if the form is submitted and the notify_item button is clicked
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['notify_item'])) {
    // Get item ID and contact number from the form submission
    $item_id = $_POST['item_id'];
    $contact_number = '+' . $_POST['contact_number']; // Add "+" sign to the contact number

    // Build the message
    $message = "Hello, this is Mapua Makati Lost and Found. Your item has been found. You can retrieve it now.";

    try {
        // Send SMS using Twilio
        $client->messages->create(
            $contact_number, // To
            [
                'from' => $twilio_number,
                'body' => $message
            ]
        );

        // Redirect back to lists.php with success message
        header("Location: lists.php?notify_success=1");
        exit;
    } catch (Exception $e) {
        // Handle Twilio exception
        echo 'Error sending SMS: ' . $e->getMessage();
    }
} else {
    // Redirect back to lists.php if accessed directly
    header("Location: lists.php");
    exit;
}
?>
