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
            <li><a href="inde.html">Home</a></li>
            <li><a href="about.html">About</a></li>
            <li><a href="contact.html">Contact</a></li>
        </ul>
        <button class="login-button">Admin</button>
    </nav>       
  </header>
  
  <section class="banner">
     <a href="#categories"><h1>Fix a soothing drink!</h1></a>
  </section>
  
  <section class="content">
    <div class="recipe-container">
      <h2>Drinks</h2>
      
      <!-- Manually adding Ghanaian drinks -->

      <!-- First drink -->
      <div class="recipe">
          <h3>Ghanaian Palm Wine</h3>
          <img src="IMAGES\palmwine.jpeg" alt="Palmwine">
          <p>Ingredients:</p>
          <ul>
              <li>Fresh palm wine</li>
              <li>Optional: Sliced oranges or pineapples for garnish</li>
          </ul>
          <p>Directions:</p>
          <ol>
              <li>Harvest fresh palm wine from the palm tree.</li>
              <li>Serve the palm wine chilled or at room temperature.</li>
              <li>Optionally, garnish with sliced oranges or pineapples for added flavor.</li>
              <li>Enjoy the refreshing taste of Asana!</li>
          </ol>
      </div>

      <!-- Second drink -->

      <div class="recipe">
          <h3>Sobolo (Hibiscus Tea)</h3>
          <img src="IMAGES\sobolo 1.jpg" alt="Sobolo">
          <p>Ingredients:</p>
          <ul>
              <li>2 cups dried hibiscus flowers (sorrel)</li>
              <li>8 cups water</li>
              <li>1 cup pineapple chunks</li>
              <li>1/2 cup sugar (adjust to taste)</li>
              <li>1/4 cup fresh ginger, sliced</li>
              <li>1-2 cinnamon sticks</li>
          </ul>
          <p>Directions:</p>
          <ol>
              <li>In a large pot, bring the water to a boil. Add the dried hibiscus flowers, pineapple chunks, ginger slices, and cinnamon sticks.</li>
              <li>Reduce the heat and simmer the mixture for about 20-30 minutes, stirring occasionally.</li>
              <li>Remove the pot from the heat and strain the liquid into a pitcher, pressing the hibiscus flowers to extract all the juice.</li>
              <li>Add sugar to taste and stir until dissolved.</li>
              <li>Chill the Sobolo in the refrigerator before serving. Serve over ice with a slice of lemon or lime, if desired.</li>
          </ol>
      </div>
      
      <!-- Third drink -->
      <!-- Fourth drink -->
      <!-- Fifth drink -->

      <!-- Fetching recipes from the database -->
      <?php
      include('../work/connection.php'); 

      $category_name = "Drinks"; 

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
