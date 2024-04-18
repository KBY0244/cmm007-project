<?php

session_start();


$con = mysqli_connect("localhost", "root", "", "recipeblog");


if (mysqli_connect_errno()) {
    die("Failed to connect to MySQL: " . mysqli_connect_error());
}


$chefName = $_SESSION['username'];


$stmt = $con->prepare("SELECT * FROM addrecipe WHERE chefName = ?");


$stmt->bind_param("s", $chefName);


$stmt->execute();


$result = $stmt->get_result();


if ($result->num_rows > 0) {
    
    while ($recipe = $result->fetch_assoc()) {
        
        echo "Recipe Title: " . $recipe['recipeTitle'] . "<br>";
        echo "Ingredients: " . $recipe['ingredients'] . "<br>";
        echo "Description: " . $recipe['description'] . "<br>";
        echo "<img src='path/to/uploads/" . $recipe['recipeImage'] . "' alt='Recipe Image'><br>";
        echo "<hr>";
    }
} else {
    echo "No recipes found";
}


$stmt->close();


mysqli_close($con);
?>
