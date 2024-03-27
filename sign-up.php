<?php
include 'db.php'; // Include your database connection script

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect and sanitize input data
    $first_name = $conn->real_escape_string(trim($_POST['first_name']));
    $last_name = $conn->real_escape_string(trim($_POST['last_name']));
    $email = $conn->real_escape_string(trim($_POST['email']));
    $password = $_POST['password']; // Password will be hashed, no need for real_escape_string

    // Basic validation (should be expanded based on requirements)
    if (empty($first_name) || empty($last_name) || empty($email) || empty($password)) {
        echo "All fields are required.";
        exit;
    }

    // Hash the password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Prepare the SQL statement to prevent SQL injection
    $stmt = $conn->prepare("INSERT INTO contact (first_name, last_name, email, password) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $first_name, $last_name, $email, $hashedPassword);

    // Execute the statement and check for errors
    if ($stmt->execute()) {
        echo "Registration successful!";
        // Optionally, redirect to a login page or another page
        // header("Location: login.php");
    } else {
        // Handle errors, such as duplicate email
        if ($conn->errno == 1062) {
            echo "An account with this email already exists.";
        } else {
            echo "Error: " . $conn->error;
        }
    }

    $stmt->close();
    $conn->close();
} else {
    echo "Invalid request method.";
}
?>
