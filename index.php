<?php
// Display any errors for debugging purposes (remove this in production)
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Start a session (for user authentication and session management)
session_start();

// Check if user is logged in
function is_logged_in() {
    return isset($_SESSION['user_id']);
}

// Handle login
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['email']) && isset($_POST['password'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Example: Hardcoded login credentials for demonstration purposes
    $valid_email = "user@example.com";
    $valid_password = "password123";  // In a real application, store hashed passwords in the database.

    if ($email === $valid_email && $password === $valid_password) {
        $_SESSION['user_id'] = $email;  // Save the user session
        header("Location: dashboard.php");  // Redirect to the dashboard after login
        exit();
    } else {
        $error_message = "Invalid credentials. Please try again.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Learning Platform - Login</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <div class="container">
            <h1>E-Learning Platform</h1>
            <nav>
                <ul>
                    <li><a href="#home">Home</a></li>
                    <li><a href="#courses">Courses</a></li>
                    <li><a href="#login">Login</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <section id="home">
        <div class="container">
            <h2>Welcome to the E-Learning Platform</h2>
            <p>Explore online courses and grow your knowledge.</p>
        </div>
    </section>

    <section id="login">
        <div class="container">
            <h2>Login</h2>

            <?php if (isset($error_message)): ?>
                <div class="error"><?php echo $error_message; ?></div>
            <?php endif; ?>

            <form action="index.php" method="POST">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>

                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>

                <button type="submit">Login</button>
            </form>
        </div>
    </section>

    <footer>
        <div class="container">
            <p>&copy; 2025 E-Learning Platform. All Rights Reserved.</p>
        </div>
    </footer>
</body>
</html>
