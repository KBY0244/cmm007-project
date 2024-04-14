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
$chefName = $_SESSION['username'];

// Prepare SQL statement
$stmt = $con->prepare("SELECT * FROM addrecipe WHERE chefName = ?");

// Bind parameters
$stmt->bind_param("s", $chefName);

// Execute statement
$stmt->execute();

// Get result
$result = $stmt->get_result();

// Check if recipes exist
if ($result->num_rows > 0) {
    // Loop through recipes
    while ($recipe = $result->fetch_assoc()) {
        // Display recipe data
        echo "Recipe Title: " . $recipe['recipeTitle'] . "<br>";
        echo "Ingredients: " . $recipe['ingredients'] . "<br>";
        echo "Description: " . $recipe['description'] . "<br>";
        echo "<img src='path/to/uploads/" . $recipe['recipeImage'] . "' alt='Recipe Image'><br>";
        echo "<hr>";
    }
} else {
    echo "No recipes found";
}

// Close statement
$stmt->close();

// Close connection
mysqli_close($con);
?>
