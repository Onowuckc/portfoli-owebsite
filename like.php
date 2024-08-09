<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$database = "portfolio";
$conn = mysqli_connect($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch projects
$sql = "SELECT * FROM projects";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Portfolio</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>Welcome to My Portfolio</h1>
        <nav>
            <ul>
                <li><a href="#about">About</a></li>
                <li><a href="#projects">Projects</a></li>
                <li><a href="#contact">Contact</a></li> <!-- Updated link -->
            </ul>
        </nav>
    </header>
    <section id="about">
        <h2>About Me</h2>
        <p>Hello and welcome to my portfolio website! My name is <b>Ijomah Chinaza Augustine</b>, and I am a fresh graduate with a degree in Software Engineering...</p>
    </section>
    <section id="projects">
        <h2>Projects</h2>
        <ul id="project-list">
            <?php
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<li><a href='{$row['link']}'>{$row['title']}</a>: {$row['description']}</li>";
                }
            } else {
                echo "<li>No projects found.</li>";
            }
            $conn->close();
            ?>
        </ul>
    </section>
    <section id="contact">
        <h2>Contact Me</h2>
        <form action="contact.php" method="post"> <!-- Ensure this points to the correct PHP file -->
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            <label for="message">Message:</label>
            <textarea id="message" name="message" required></textarea>
            <button type="submit">Send</button>
        </form>
    </section>
    <footer>
        <p>© 2024 Your Name. All rights reserved.</p>
    </footer>
</body>
</html>
