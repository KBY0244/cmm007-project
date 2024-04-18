<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Database connection
$con = mysqli_connect("localhost", "root", "", "recipeblog");


if (mysqli_connect_errno()) {
    die("Failed to connect to MySQL: " . mysqli_connect_error());
}


if (isset($_POST['submit-recipe'])) { 
    
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        
        $chefName = $_POST['chefName']; 
        $category = $_POST['category'];
        $recipeTitle = $_POST['recipeTitle'];
        $ingredients = $_POST['ingredients'];
        $description = $_POST['description']; 

        // File upload starts
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["image"]["name"]);

        
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            $image_path = $_FILES['image']['name'];

            // Inserting data into addrecipe table
            $query = "INSERT INTO addrecipe (chefName, category, recipeTitle, ingredients, description, recipeImage) VALUES ('$chefName', '$category', '$recipeTitle', '$ingredients', '$description', '$image_path')";
            
            // Provide feedback
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
