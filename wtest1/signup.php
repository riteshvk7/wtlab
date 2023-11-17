<?php
$users = []; // Associative array to store user details

function validatePassword($password) {
    // Password should be at least 10 characters, have at least 2 uppercase letters,
    // one number, and one of the characters (_, @, $)
    return preg_match('/^(?=.*[A-Z].*[A-Z])(?=.*\d)(?=.*[_@$]).{10,}$/', $password);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the form was submitted
    if (isset($_POST["signup"])) {
        // New user sign-up
        $name = $_POST["name"];
        $phone = $_POST["phone"];
        $address = $_POST["address"];
        $password = $_POST["password"];
        $confirmPassword = $_POST["confirm_password"];

        // Validate phone number
        if (!preg_match('/^[789]\d{9}$/', $phone)) {
            echo "Invalid phone number. Please enter a valid 10-digit number starting with 7, 8, or 9.";
            exit;
        }

        // Validate password
        if ($password !== $confirmPassword || !validatePassword($password)) {
            echo "Invalid password. Please make sure it meets the requirements.";
        } else {
            // Store user details in the associative array
            $users[$name] = [
                "phone" => $phone,
                "address" => $address,
                "password" => password_hash($password, PASSWORD_DEFAULT), // Use a secure hash function
            ];

            echo "User signed up successfully!";
        }
    }
}
?>
