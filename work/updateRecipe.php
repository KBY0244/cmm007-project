<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

include('connection.php');

// Check if the database connection is established
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

// Retrieve form data
$chefName = $_POST['chefName'];
$category = $_POST['category'];
$recipeTitle = $_POST['recipeTitle'];
$ingredients = $_POST['ingredients'];
$description = $_POST['description'];

// Check if all fields are filled
if(empty($chefName) || empty($category) || empty($recipeTitle) || empty($ingredients) || empty($description))
{
    echo "All fields are required.";
}
else
{   
    // Check if an image was uploaded
    if(isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK)
    {
        // Handle file upload and update image field
        // Example code for handling file upload:
        $image_name = $_FILES['image']['name'];
        $image_tmp_name = $_FILES['image']['tmp_name'];
        $image_destination = "uploads/" . $image_name; // Set your desired destination folder
        
        if(move_uploaded_file($image_tmp_name, $image_destination))
        {
            // Update the recipe in the database with the image
            $sql = "UPDATE addrecipe SET chefName=?, category=?, ingredients=?, description=?, recipeImage=? WHERE recipeTitle=?";
            $stmt = $db->prepare($sql);
            if ($stmt === false) {
                die("Error preparing statement: " . $db->error);
            }
            $stmt->bind_param("ssssss", $chefName, $category, $ingredients, $description, $image_destination, $recipeTitle);
            if ($stmt->execute() === false) {
                die("Error executing statement: " . $stmt->error);
            }
        }
        else
        {
            echo "Failed to upload image.";
            exit;
        }
    }
    else
    {
        // Update the recipe in the database without the image
        $sql = "UPDATE addrecipe SET chefName=?, category=?, ingredients=?, description=? WHERE recipeTitle=?";
        $stmt = $db->prepare($sql);
        if ($stmt === false) {
            die("Error preparing statement: " . $db->error);
        }
        $stmt->bind_param("sssss", $chefName, $category, $ingredients, $description, $recipeTitle);
        if ($stmt->execute() === false) {
            die("Error executing statement: " . $stmt->error);
        }
    }

    // Check if the update was successful
    if($stmt->affected_rows >! 0)
    {
        echo "Recipe updated successfully";
        // header("Location: chefdashboard.php");
        exit; // Ensure no further execution of the script after redirection
    }
    else
    {
        // No rows affected, no update performed
        echo "No rows were updated.";
        // header("Location: editRecipe.html");
        exit; // Ensure no further execution of the script after redirection
    }
    
    $stmt->close(); // This line is redundant since the script exits after redirection
}

$db->close();

?>
