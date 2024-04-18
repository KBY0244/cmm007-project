<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Breakfast Page</title>
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
<section class="banner">
     <a href="#categories"><h1>Fix a quick breakfast!</h1></a>
      
  </section>
  
  <section class="content">
    <div class="recipe-container">
      <h2>Main Meals</h2>
      
      <!-- Manually adding breakfast -->

      <!-- First recipe -->
      <div class="recipe">
          <h3>Mmɔri koko (Ghanaian Spiced Corn Porridge)</h3>
          <img src="Mmori koko.jpg" alt="Mmɔri koko">
          <p>Ingredients:</p>
          <ul>
              <li>1 cup corn dough</li>
              <li>1 small ginge</li>
              <li>4 dried chili peppers</li>
              <li>4 Negro Peppers</li>
              <li>Salt</li>
          </ul>
          <p>Directions:</p>
          <ol>
              <li>Grind the chili and ginger, add 1/4 water and pass the mixture through a fine sieve. Use an earthenware or motor and pestle to grind if possible.</li>
              <li>Lightly crush the negro peppers and add to the dough mixture.</li>
              <li>Add the sieved ginger and chili. Add a pinch of salt and bring mixture to a boil. Stir continuously in a circular manner until it thickens up then add 1 cup of water.</li>
              <li>Stir and allow to cook until it thickens up again. If porridge is too thick, add a small amount of water to thin it.</li>
              <li>Remove negro peppers and serve with sugar and milk (optional) and bread or anything really.</li>
          </ol>
      </div>

      <!-- Second recipe -->

      <div class="recipe">
          <h3>Akara (Bean Cakes)</h3>
          <img src="akara.jpeg" alt="Akara">
          <p>Ingredients:</p>
          <ul>
              <li>2 cups black-eyed peas</li>
              <li>1 small onion, chopped</li>
              <li>1 small red bell pepper, chopped</li>
              <li>1 small green bell pepper, chopped</li>
              <li>1-2 habanero peppers (adjust to taste)</li>
              <li>Salt, to taste</li>
          </ul>
          <p>Directions:</p>
          <ol>
              <li>Soak the black-eyed peas in water for 4-6 hours or overnight. Drain and peel the skins off the peas.</li>
              <li>In a blender, blend the peeled black-eyed peas with the onion, bell peppers, and habanero peppers until smooth.</li>
              <li>Transfer the mixture to a bowl and add salt. Mix thoroughly.</li>
              <li>Heat vegetable oil in a deep frying pan. Once the oil is hot, scoop spoonfuls of the mixture into the oil and fry until golden brown and cooked through.</li>
              <li>Remove the Akara from the oil and drain on paper towels. Serve hot with pap, bread, or as a side dish.</li>
          </ol>
      </div>
      
      <!-- Third recipe -->
      <!-- Fourth recipe -->
      <!-- Fifth recipe -->

      <!-- Fetching recipes from the database -->
      <?php
      include('../work/connection.php'); 

      $category_name = "Breakfast"; 

      // Fetching recipes of a specific category from the database
      $query = "SELECT * FROM addrecipe WHERE category = '$category_name'";
      $result = mysqli_query($db, $query);

      if(mysqli_num_rows($result) > 0) {
          while($row = mysqli_fetch_assoc($result)) {
              // Open container for each recipe
              echo '<div class="recipe">';

              echo "<h3>{$row['recipeTitle']}</h3>";

              if(!empty($row['recipeImage'])) {
                  echo "<img src='uploads/{$row['recipeImage']}' alt='recipeImage' style='max-width: 100%; max-height: 100%;'>";
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
              // Close recipe container
              echo "</div>";
          }
      } else {
          echo "No recipes found in the category: $category_name";
      }
      ?>
    </div>
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

            