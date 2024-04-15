<?php

include('connection.php');
 $chefname=$_POST['chefName'];
 $category=$_POST['category'];
 $RecipeName=$_POST['recipeTitle'];
 $Ingredients=$_POST['ingredients'];
 $description=$_POST['description'];

    if(empty($_POST["chefName"]) || empty($_POST["category"]) || empty($_POST["recipeTitle"]) || empty($_POST["ingredients"]) || empty($_POST["description"]))
    {
        echo "All fields are required.";
    }
       
    else
    {   
        $sql = "UPDATE addrecipe set chefName='$chefName',category='$category',ingredients='$ingredients',description='$description' where recipeTitle='$recipeTitle'";
        $result = mysqli_query($db, $sql);

        if($result)
        {
            echo "Updated Successfully";
            header("Location: chefdashboard.php");
        }
        else
        {
            echo "Something Went Wrong!";
            header("Location: editRecipe.html");
        }
    }
   
?>