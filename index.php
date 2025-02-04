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
    <style>
        /* Reset some default styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Body styling */
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            background-color: #f4f4f4;
            color: #333;
        }

        /* Header styling */
        header {
            background-color: #4CAF50;
            color: white;
            padding: 10px 0;
        }

        header .container {
            width: 80%;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        header nav ul {
            list-style: none;
        }

        header nav ul li {
            display: inline;
            margin: 0 15px;
        }

        header nav ul li a {
            color: white;
            text-decoration: none;
            font-weight: bold;
        }

        /* Section styling */
        section {
            padding: 50px 0;
        }

        .container {
            width: 80%;
            margin: 0 auto;
        }

        /* Home Section */
        #home {
            background-color: #e2f7e1;
            text-align: center;
        }

        #home h2 {
            color: #4CAF50;
            font-size: 2em;
        }

        /* Courses Section */
        #courses .course-list {
            display: flex;
            justify-content: space-around;
            margin-top: 20px;
        }

        .course {
            background-color: white;
            border-radius: 5px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 30%;
        }

        .course h3 {
            color: #4CAF50;
            font-size: 1.5em;
        }

        .course p {
            font-size: 1em;
        }

        /* Login Section */
        #login form {
            display: flex;
            flex-direction: column;
            width: 300px;
            margin: 0 auto;
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        #login label {
            margin-bottom: 5px;
            font-weight: bold;
        }

        #login input {
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        #login button {
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        #login button:hover {
            background-color: #45a049;
        }

        /* Error message styling */
        .error {
            color: red;
            margin-bottom: 20px;
        }

        /* Footer Section */
        footer {
            background-color: #333;
            color: white;
            text-align: center;
            padding: 10px 0;
        }

        footer p {
            font-size: 0.9em;
        }
    </style>
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
