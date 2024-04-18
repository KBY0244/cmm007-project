<?php
include('../work/connection.php'); 

// Category fetch
$category_name = "Main meal"; 

// fetch recipes of a specific category from database
$query = "SELECT * FROM addrecipe WHERE category = '$category_name'";
$result = mysqli_query($db, $query);


if(mysqli_num_rows($result) > 0) {
   
    echo '<div class="recipe-container">';
    
   
    while($row = mysqli_fetch_assoc($result)) {
        
        echo '<div class="recipe">';
        
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
        
        
        echo "</div>";
    }
    
    
    echo "</div>";
} else {
    
    echo "No recipes found in the category: $category_name";
}
?>
