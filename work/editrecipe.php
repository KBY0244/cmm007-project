<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Recipe</title>
    <link rel="stylesheet" href="myaddrecipe.css">

</head>
<body>
    <header>
        <!-- Header content -->
    </header>
    <main>
        <div class="container">
            <h1>Edit Recipe</h1>
            <?php

            // error_reporting(E_ALL);
            // ini_set('display_errors', 1);

            // Include the connection file
            include('connection.php');

            // Check if a recipe title is provided via POST
            if(isset($_POST['recipeTitle'])) {
                $recipeTitle = $_POST['recipeTitle'];
                $sql = "SELECT * FROM addrecipe WHERE recipeTitle='$recipeTitle'";
                $result = $db->query($sql);

                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    ?>
                    <form action="updateRecipe.php" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="oldRecipeTitle" value="<?php echo $row['recipeTitle']; ?>">
                        <label for="chefName">Chef name:</label>
                        <input type="text" id="chefName" name="chefName" value="<?php echo $row['chefName']; ?>" required>

                        <label for="category">Category:</label>
                        <input type="text" id="category" name="category" value="<?php echo $row['category']; ?>" required>

                        <label for="recipeTitle">Recipe Title:</label>
                        <input type="text" id="recipeTitle" name="recipeTitle" value="<?php echo $row['recipeTitle']; ?>" required>

                        <label>Upload Image:</label>
                        <input type="file" name="image"><br><br>

                        <label for="ingredients">Ingredients:</label>
                        <textarea id="ingredients" name="ingredients" rows="4" required><?php echo $row['ingredients']; ?></textarea>

                        <label for="description">Description:</label>
                        <textarea id="description" name="description" rows="6" required><?php echo $row['description']; ?></textarea> 

                        <button type="submit" name="submit-recipe" class="submit-recipe">Update Recipe</button>

                        <button type="reset" class="reset-button">Reset</button>
                    </form>
                    <?php
                } else {
                    echo "Recipe not found.";
                }
            } else {
                echo "Recipe title not provided.";
            }
            ?>
        </div>
    </main>
    <footer>
        <!-- Footer content -->
    </footer>
</body>
</html>
