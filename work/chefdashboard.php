<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chef Profile</title>
    <link rel="stylesheet" href="chefdashboard.css">
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
                <li><a href="recipes1.html">Recipes</a></li>
                <li><a href="about.html">About</a></li>
                <li><a href="contact.html">Contact</a></li>
            </ul>
            <a href="homepage.php"><button class="login-button">Logout</button></a>
        </nav>       
    </header>
    <main>
        <section class="dashboard-overview">
            
            <h2>Welcome, Chef!</h2>
            
            <p>Here you can manage your recipes.</p>
        
        <section class="add-recipe">
            <a href="myaddrecipe.html"><button>Add a Recipe</button></a>
        </section>

        <section class="delete-recipe">          
            <a href="deleteRecipe.html"><button class="delete-recipe">Delete a Recipe</button></a>
        </section>

        <section class="edit-recipe">
            <a href="editrecipe.html"><button class="edit-recipe">Edit a recipe</button></a>
        </section>
    </main>
    <footer>
        <div class="footer-content">
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
