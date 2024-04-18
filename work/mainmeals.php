<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recipe Page</title>
    <link rel="stylesheet" href="recipes.css">
    
</head>
<body>
  <header>
    <nav class="navbar">
        <div class="logo-container">
          <a href="index.html">
            <img src="logo-white.png" alt="Logo" class="logo">
          </a>
        </div>
        <ul class="nav-buttons">
            <li><a href="inde.html">Home</a></li>
            <li><a href="about.html">About</a></li>
            <li><a href="contact.html">Contact</a></li>
        </ul>
        <button class="login-button">Login</button>
    </nav>       
</header>
    <section class="banner">
       <a href="#categories"><h1>Main meals</h1></a>
    </section>
    <section class="content">
        
            <div class="recipe-container">
                <h2>Main Meals</h2>
                
                <!-- Manually adding Ghanaian main meals -->
                <div class="recipe">
                    <h3>Fufu and Light Soup</h3>
                    <img src="fufu-light-soup.jpg" alt="Fufu and Light Soup">
                    <h4>Ingredients:</h4>
                    <ul>
                        <li>Fufu (cassava and plantain dough)</li>
                        <li>Chicken or fish</li>
                        <li>Tomatoes</li>
                        <li>Onions</li>
                        <li>Pepper</li>
                        <li>Ginger</li>
                        <li>Garlic</li>
                        <li>Seasoning</li>
                    </ul>
                    <h4>Directions:</h4>
                    <ol>
                        <li>Cook the chicken or fish until done.</li>
                        <li>Blend tomatoes, onions, pepper, ginger, and garlic.</li>
                        <li>Boil the blended mixture until thickened.</li>
                        <li>Season with your preferred seasoning.</li>
                        <li>Prepare the fufu according to package instructions.</li>
                        <li>Serve the fufu with the light soup and cooked chicken or fish.</li>
                    </ol>
                </div>

                <div class="recipe">
                    <h3>Banku and Tilapia</h3>
                    <img src="banku-tilapia.jpg" alt="Banku and Tilapia">
                    <h4>Ingredients:</h4>
                    <ul>
                        <li>Banku (fermented corn and cassava dough)</li>
                        <li>Tilapia fish</li>
                        <li>Tomatoes</li>
                        <li>Onions</li>
                        <li>Pepper</li>
                        <li>Ginger</li>
                        <li>Garlic</li>
                        <li>Seasoning</li>
                    </ul>
                    <h4>Directions:</h4>
                    <ol>
                        <li>Clean and season the tilapia fish.</li>
                        <li>Grill or fry the tilapia until golden brown.</li>
                        <li>Blend tomatoes, onions, pepper, ginger, and garlic.</li>
                        <li>Boil the blended mixture until thickened.</li>
                        <li>Season with your preferred seasoning.</li>
                        <li>Prepare the banku according to package instructions.</li>
                        <li>Serve the banku with the grilled or fried tilapia and hot pepper sauce.</li>
                    </ol>
                </div>
                
                <!-- Fetch recipes from the database -->
                <?php
                include('../work/connection.php'); 

                
                $category_name = "Main meal"; 

                //  fetch recipes of a specific category from the database
                $query = "SELECT * FROM addrecipe WHERE category = '$category_name'";
                $result = mysqli_query($db, $query);

                
                if(mysqli_num_rows($result) > 0) {
                    
                    while($row = mysqli_fetch_assoc($result)) {
                        
                        echo '<div class="recipe">';

                        echo "<h3>{$row['recipeTitle']}</h3>";

                        if(!empty($row['recipeImage'])) {
                            echo "<img src='uploads/{$row['recipeImage']}' alt='recipeImage' style='max-width: 350px; max-height: 350px;'>";
                        }
                        
                        if(isset($row['ingredients'])) {
                            echo "<h4>Ingredients:</h4>";
                            echo "<ul>";
                            
                            $ingredients = explode("\n", $row['ingredients']);
                            foreach($ingredients as $ingredient) {
                                
                                $ingredient = trim($ingredient);
                                
                                if(!empty($ingredient)) {
                                    echo "<li>{$ingredient}</li>";
                                }
                            }
                            echo "</ul>";
                        } else {
                            echo "<p>No ingredients provided</p>";
                        }

                        
                        if(isset($row['description'])) {
                            echo "<h4>Directions:</h4>";
                            $directions = explode("\n", $row['description']);
                            echo "<ol>";
                            foreach ($directions as $direction) {
                                
                                if (!empty(trim($direction))) {
                                    echo "<li>{$direction}</li>";
                                }
                            }
                            echo "</ol>";
                        } else {
                            echo "<h4>No Directions provided</h4>";
                        }
                        // Close the recipe container
                        echo "</div>";
                    }
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

