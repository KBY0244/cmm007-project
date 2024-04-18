<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Database connection
$con = mysqli_connect("localhost", "root", "", "recipeblog");

// Check connection
if (mysqli_connect_errno()) {
    die("Failed to connect to MySQL: " . mysqli_connect_error());
}

// Handle form submission
if (isset($_POST['submit-recipe'])) { // Changed to match the button's name attribute
    // Check if the file input exists and if a file was uploaded
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        // Retrieve form data
        $chefName = $_POST['chefName']; // Fixed variable names
        $category = $_POST['category'];
        $recipeTitle = $_POST['recipeTitle'];
        $ingredients = $_POST['ingredients'];
        $description = $_POST['description']; // Corrected variable name

        // File upload handling
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["image"]["name"]);

        // Check if file was successfully moved
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            $image_path = $_FILES['image']['name'];

            // Insert data into addrecipe table
            $query = "INSERT INTO addrecipe (chefName, category, recipeTitle, ingredients, description, recipeImage) VALUES ('$chefName', '$category', '$recipeTitle', '$ingredients', '$description', '$image_path')";
            
            // Execute query and handle result
            if (mysqli_query($con, $query)) {
                echo "Individual recipe added successfully";
                echo "<a href='chefdashboard.php'>Return to dashboard</a>";
            } else {
                echo "Error adding Individual Recipe: " . mysqli_error($con);
            }
        } else {
            echo "Error uploading image";
        }
    } else {
        echo "No file uploaded or file upload error";
    }
} else {
    echo "Form not submitted";
}

// Close connection
mysqli_close($con);
?>
