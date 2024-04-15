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
                <li><a href="inde.html">Home</a></li>
                <li><a href="about.html">About</a></li>
                <li><a href="contact.html">Contact</a></li>
            </ul>
            <button class="login-button">Login</button>
        </nav>       
    </header>
    <main>
        <section class="dashboard-overview">
            <!-- Dashboard overview goes here -->
            <h2>Welcome, Chef!</h2>
            
            <p>Here you can manage your recipes and edit your profile.</p>
        </section>
        <section class="my-recipes">
            <!-- Recipe cards go here -->
            <h2>My Recipes</h2>
            <div class="recipe-card">
                <img src="recipe1.jpg" alt="Recipe 1">
                <h3>Recipe 1</h3>
                <a href="editrecipe.html"><button class="edit-recipe">Edit</button></a>
                <button class="delete-recipe">Delete</button>
            </div>
            <!-- More recipe cards... -->
        </section>
        <section class="add-recipe">
            <!-- Add a Recipe button goes here -->
            <a href="myaddrecipe.html"><button>Add a Recipe</button></a>
        </section>
        <section class="edit-profile">
            <!-- Edit Profile goes here -->
            <h2>Edit Profile</h2>
            <button>Edit Profile</button>
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
