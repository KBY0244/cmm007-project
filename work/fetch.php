<?php
include('../html/connection.php'); // Include your database connection file

// Query to fetch recipes from the database
$query = "SELECT * FROM addrecipe";
$result = mysqli_query($db, $query);

// Check if there are any recipes in the database
if(mysqli_num_rows($result) > 0) {
    // Loop through each recipe and display them
    while($row = mysqli_fetch_assoc($result)) {
        echo "<h3>{$row['recipeTitle']}</h3>";
        // Display the image if 'image_name' is set
        if(!empty($row['recipeImage'])) {
            echo "<img src='uploads/{$row['recipeImage']}' alt='recipeImage' style='max-width: 350px; max-height: 350px;'>";
        }
        // Check if 'Ingredient' key exists before accessing it
        if(isset($row['ingredients'])) {
            echo "<h4 style='max-width: 450px; max-height: 450px;'>{$row['ingredients']}</h4>";
        } else {
            echo "<h4 style='max-width: 450px; max-height: 450px;'>No ingredients provided</h4>";
        }
        // Check if 'description' key exists before accessing it
        if(isset($row['description'])) {
            echo "<h4 style='max-width: 450px; max-height: 450px;'>{$row['description']}</h4>";
        } else {
            echo "<h4 style='max-width: 450px; max-height: 450px;'>No Directions provided</h4>";
        }
        echo "<hr>";
    }
} else {
    // If no recipes are found in the database
    echo "No recipes found.";
}
?>