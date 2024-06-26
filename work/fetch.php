<?php
include('../work/connection.php'); 

// fetch recipes the database
$query = "SELECT * FROM addrecipe";
$result = mysqli_query($db, $query);


if(mysqli_num_rows($result) > 0) {
    
    while($row = mysqli_fetch_assoc($result)) {
        echo "<h3>{$row['recipeTitle']}</h3>";
        
        if(!empty($row['recipeImage'])) {
            echo "<img src='uploads/{$row['recipeImage']}' alt='recipeImage' style='max-width: 350px; max-height: 350px;'>";
        }
        
        if(isset($row['ingredients'])) {
            echo "<h4 style='max-width: 450px; max-height: 450px;'>{$row['ingredients']}</h4>";
        } else {
            echo "<h4 style='max-width: 450px; max-height: 450px;'>No ingredients provided</h4>";
        }
        
        if(isset($row['description'])) {
            echo "<h4 style='max-width: 450px; max-height: 450px;'>{$row['description']}</h4>";
        } else {
            echo "<h4 style='max-width: 450px; max-height: 450px;'>No Directions provided</h4>";
        }
        echo "<hr>";
    }
} else {
    
    echo "No recipes found.";
}
?>