<?php
// Start the session
session_start();

// Database connection
$con = mysqli_connect("localhost", "root", "", "recipeblog");

// Check connection
if (mysqli_connect_errno()) {
    die("Failed to connect to MySQL: " . mysqli_connect_error());
}

// Get the logged in chef's username from the session
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
} else {
    echo "You must be logged in to view this page.";
    exit;
}
// Prepare SQL statement
$stmt = $con->prepare("SELECT * FROM chef WHERE username = ?");

// Bind parameters
$stmt->bind_param("s", $username);

// Execute statement
$stmt->execute();

// Get result
$result = $stmt->get_result();

// Check if user exists
if ($result->num_rows > 0) {
    // Get user data
    $user = $result->fetch_assoc();

    // Display user data
    echo "Username: " . $user['username'] . "<br>";
    echo "Email: " . $user['email'] . "<br>";
} else {
    echo "User not found";
}

// Close statement
$stmt->close();

// Close connection
mysqli_close($con);
?>
