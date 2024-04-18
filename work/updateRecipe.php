<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

include('connection.php');


if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}


$chefName = $_POST['chefName'];
$category = $_POST['category'];
$recipeTitle = $_POST['recipeTitle'];
$ingredients = $_POST['ingredients'];
$description = $_POST['description'];


if(empty($chefName) || empty($category) || empty($recipeTitle) || empty($ingredients) || empty($description))
{
    echo "All fields are required.";
}
else
{   
    
    if(isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK)
    {
        
        $image_name = $_FILES['image']['name'];
        $image_tmp_name = $_FILES['image']['tmp_name'];
        $image_destination = "uploads/" . $image_name; 
        
        if(move_uploaded_file($image_tmp_name, $image_destination))
        {
            
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

    
    if($stmt->affected_rows >! 0)
    {
        echo "Recipe updated successfully";
         header("Location: chefdashboard.php");
        exit; 
    }
    else
    {
        
        echo "No rows were updated.";
        header("Location: editRecipe.html");
        exit; 
    }
    
    $stmt->close(); 
}

$db->close();

?>
