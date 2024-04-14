<?php
session_start(); // Start the session

// Check if the user is logged in
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    // User is logged in, display dashboard content
    // Include any necessary PHP files or database queries here
    // Display dashboard content
    echo "<h2>Welcome, Chef!</h2>";
    // Additional dashboard content goes here
} else {
    // User is not logged in, display a message
    echo "You must be logged in to view this page.";
}
?>

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
            <?php
            include 'chefprofile.php'; ?>
            <p>Here you can manage your recipes and edit your profile.</p>
        </section>
        <section class="my-recipes">
            <!-- Recipe cards go here -->
            <h2>My Recipes</h2>
            <div class="recipe-card">
                <img src="recipe1.jpg" alt="Recipe 1">
                <h3>Recipe 1</h3>
                <button class="edit-recipe">Edit</button>
                <button class="delete-recipe">Delete</button>
            </div>
            <!-- More recipe cards... -->
        </section>
        <section class="add-recipe">
            <!-- Add a Recipe button goes here -->
            <button>Add a Recipe</button>
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
