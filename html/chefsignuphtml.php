<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="chefsignup.css">
    <title>Fix a Meal Sign-Up</title>
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
        <div class="form-container">
            <form class="signup-form" method="post" action="signup.php">
                <h1>Sign Up</h1>
            <div class="form-content">
                
                <input type="text" id="username" name="username" placeholder="Enter your username" required>
                
                <input type="email" id="email" name="email" placeholder="Enter your email" required>
                
                <input type="password" id="password" name="password" placeholder="Enter your password" required>
                
                <input type="password" id="confirm-password" name="confirmpassword" placeholder="Confirm your password" required>
                <button type="submit">Sign Up</button>
            
                <button type="reset">Reset</button></td>
            </div>
         </form>
        </div>
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
