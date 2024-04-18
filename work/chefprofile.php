<?php

session_start();


$con = mysqli_connect("localhost", "root", "", "recipeblog");


if (mysqli_connect_errno()) {
    die("Failed to connect to MySQL: " . mysqli_connect_error());
}


if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
} else {
    echo "You must be logged in to view this page.";
    exit;
}

$stmt = $con->prepare("SELECT * FROM chef WHERE username = ?");


$stmt->bind_param("s", $username);


$stmt->execute();


$result = $stmt->get_result();


if ($result->num_rows > 0) {
    
    $user = $result->fetch_assoc();

    
    echo "Username: " . $user['username'] . "<br>";
    echo "Email: " . $user['email'] . "<br>";
} else {
    echo "User not found";
}


$stmt->close();


mysqli_close($con);
?>
