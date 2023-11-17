<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Simulate user details storage (you would normally use a database)
    $storedUserDetails = [
        "6091234567" => [
            "name" => "John Doe",
            "email" => "john.doe@example.com",
            "phone" => "6091234567",
            "address" => "123 Main St, City",
            "purchaseHistory" => "premium"
        ],
        // Add more users as needed
    ];

    // Get phone number from form data
    $phone = $_POST["phone"];

    // Check if user details exist
    if (array_key_exists($phone, $storedUserDetails)) {
        // User details found, send as JSON response
        header('Content-Type: application/json');
        echo json_encode($storedUserDetails[$phone]);
        exit;
    } else {
        // User details not found
        echo json_encode(["error" => "User details not found."]);
        exit;
    }
}
?>
