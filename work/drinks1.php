<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Drinks Page</title>
    <link rel="stylesheet" href="recipes.css">
    
</head>
<body>
  <header>
    <nav class="navbar">
        <div class="logo-container">
          <a href="inde.html">
            <img src="logo-white.png" alt="Logo" class="logo">
          </a>
        </div>
        <ul class="nav-buttons">
            <li><a href="chefdashboard.php">Chef dashboard</a></li>
            <li><a href="about.html">About</a></li>
            <li><a href="contact.html">Contact</a></li>
        </ul>
        <button class="login-button">Logout</button>
    </nav>       
</header>
    
    <section class="content">
        
            <div class="category">
                <h2>Fix a Drink!</h2>
                <?php
                include('../work/connection.php'); 

                // Assuming you have a variable $category_name containing the name of the category you want to fetch
                $category_name = "Drinks"; // Change this to the desired category name

                // Query to fetch recipes of a specific category from the database
                $query = "SELECT * FROM addrecipe WHERE category = '$category_name'";
                $result = mysqli_query($db, $query);

                // Check if there are any recipes in the specified category
                if(mysqli_num_rows($result) > 0) {
                // Open a container for recipes
                echo '<div class="recipe-container">';

                // Loop through each recipe and display them
                while($row = mysqli_fetch_assoc($result)) {
                // Open a container for each recipe
                echo '<div class="recipe">';

                echo "<h3>{$row['recipeTitle']}</h3>";

                if(!empty($row['recipeImage'])) {
                    echo "<img src='uploads/{$row['recipeImage']}' alt='recipeImage' style='max-width: 350px; max-height: 350px;'>";
                }
                // Check if 'ingredients' key exists before accessing it
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

                // Close the recipe container
                echo "</div>";
                }

                // Close the recipes container
                echo "</div>";
                } else {
                // If no recipes are found in the specified category
                echo "No recipes found in the category: $category_name";
                }
                ?>

            </div>
            
      </section>
    </section>
    <footer>
      <div class="footer-content">
          <p>Are you a chef? You are encouraged to share your recipe.</p><button>Add Recipe</button>
          <p>&copy; 2024 Recipe Blog. All rights reserved.</p>
          
          <div class="social-media">
              <a href="https://www.facebook.com"><img src="Facebook.png" alt="Facebook"></a>
              <a href="https://www.twitter.com"><img src="Twitter.png" alt="Twitter"></a>
              <a href="https://www.instagram.com"><img src="Instagram.png" alt="Instagram"></a>
          </div>
      </div>
  </footer>
</body>
</html>
