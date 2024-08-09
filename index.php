<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$database = "work";

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
        <div class="header-content">
            <h1>Welcome to My Portfolio</h1>
            <img src="DSC_4605.jpg" alt="Profile Picture" class="profile-picture">
            <nav>
                <ul>
                    <li><a href="#about">About</a></li>
                    <li><a href="#projects">Projects</a></li>
                    <li><a href="#contact">Contact</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <section id="about">
        <h2>About Me</h2>
        <div class="about-content">
            <img src="DSC_4605.jpg" alt="Profile Picture" class="profile-picture">
            <div class="about-text">
                <p>Hello and welcome to my portfolio website! My name is <b>Ijomah Chinaza Augustine</b>, and I am a fresh graduate with a degree in Software Engineering. This platform serves as a comprehensive showcase of my skills, experiences, and the projects I have passionately worked on. Here, you will find detailed information about my journey, expertise, and aspirations as a budding software engineer. Let me take you through my story.</p>
                <br>
                <b><u>Educational Background</u></b>
                <p>I recently completed my Bachelor's degree in Software Engineering, where I developed a solid foundation in various aspects of software development. My education provided me with a deep understanding of the theoretical concepts and practical skills required to design, develop, and maintain software systems. The curriculum included rigorous coursework in algorithms, data structures, software design, database systems, and more, which have all contributed to my growth as a proficient software engineer.</p>
                <br>
                <b><u>Technical Skills</u></b>
                <p>Throughout my academic journey, I have honed my skills in multiple programming languages and technologies. I have become proficient in PHP, Java, HTML, CSS, and JavaScript. Each of these languages plays a crucial role in my toolkit, enabling me to tackle diverse software development challenges.</p>
                <br>
                <b>PHP</b>: My experience with PHP has been extensive, particularly in developing dynamic and interactive web applications. I have built several projects using PHP, ranging from simple websites to complex content management systems. My proficiency in PHP allows me to create efficient, secure, and scalable backend systems that power modern web applications.
                <br>
                <b>Java</b>: Java has been a significant part of my learning and project work. I appreciate Java for its versatility, robustness, and widespread use in enterprise-level applications. My projects have included developing desktop applications, mobile apps, and backend services using Java. This experience has strengthened my object-oriented programming skills and my ability to design scalable software solutions.
                <br>
                <b>HTML & CSS</b>: HTML and CSS are the backbone of web development, and I have mastered these technologies to create visually appealing and responsive web pages. My understanding of HTML allows me to structure content effectively, while CSS enables me to style and layout web pages in a user-friendly and aesthetically pleasing manner. I have also explored advanced CSS techniques such as Flexbox and Grid to build modern, responsive designs.
                <br>
                <b>JavaScript</b>: JavaScript is the language that brings interactivity to web applications, and I have utilized it extensively in my projects. My knowledge of JavaScript, combined with frameworks and libraries like React and jQuery, allows me to build dynamic user interfaces and enhance user experiences. I am proficient in both vanilla JavaScript and using it in conjunction with other technologies to create seamless, interactive web applications.
                <br>
                <b><u>Software Testing Expertise</u></b>
                <p>In addition to my programming skills, I have developed a keen interest and expertise in software testing. I firmly believe that thorough testing is a critical aspect of software development, ensuring the delivery of high-quality, reliable, and bug-free software products. My approach to testing includes various techniques such as unit testing, integration testing, system testing, and acceptance testing.</p>
                <p>I am proficient in using testing frameworks and tools like JUnit, Selenium, and PHPUnit to automate testing processes and achieve comprehensive test coverage. My experience in software testing has equipped me with the ability to identify and rectify defects early in the development cycle, ultimately leading to more robust and dependable software solutions.</p>
                <br>
                <b><u>Projects and Experience</u></b>
                <p>My academic projects and internships have provided me with invaluable hands-on experience in software development. Some of the notable projects I have worked on include:</p>
                <ul>
                    <li><b>E-commerce Website:</b> As part of a team project, I developed an e-commerce website using PHP, MySQL, HTML, CSS, and JavaScript. The website featured user authentication, product catalog, shopping cart, and payment gateway integration. This project allowed me to apply my full-stack development skills and gain practical experience in building a complete web application.</li>
                    <li><b>Inventory Management System:</b> I designed and implemented an inventory management system using Java and MySQL. The system provided functionalities for managing product inventories, tracking stock levels, and generating reports. This project enhanced my understanding of database design, Java programming, and software architecture.</li>
                    <li><b>Responsive Portfolio Website:</b> To showcase my skills and projects, I created this portfolio website using HTML, CSS, and JavaScript. The website is fully responsive, ensuring an optimal viewing experience across various devices. It features sections about me, my skills, projects, and contact information. This project allowed me to demonstrate my web development expertise and attention to detail in design.</li>
                    <li><b>Automated Testing Framework:</b> During an internship, I developed an automated testing framework using Selenium and JUnit for a web application. The framework enabled automated regression testing, significantly reducing the time required for manual testing. This experience solidified my understanding of software testing principles and the importance of automation in maintaining software quality.</li>
                </ul>
                <br>
                <b><u>Personal Qualities and Aspirations</u></b>
                <p>Beyond my technical skills, I possess several personal qualities that contribute to my effectiveness as a software engineer. I am a quick learner, always eager to explore new technologies and stay updated with industry trends. My problem-solving abilities and attention to detail enable me to tackle complex challenges and deliver high-quality solutions. I am also a strong communicator and team player, capable of collaborating effectively with cross-functional teams.</p>
                <p>Looking ahead, I aspire to further develop my expertise in software engineering and contribute to innovative projects that make a positive impact. I am particularly interested in exploring emerging technologies such as artificial intelligence, machine learning, and cloud computing. My goal is to continuously learn, grow, and leverage my skills to build cutting-edge software solutions that address real-world problems.</p>
                <br>
                <b><u>Conclusion</u></b>
                <p>Thank you for visiting my portfolio website and taking the time to learn about me. I am excited to embark on my professional journey as a software engineer and contribute to the ever-evolving field of technology. Please feel free to explore my projects and reach out to me for any opportunities or collaborations. I look forward to connecting with you!</p>
            </div>
        </div>
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
        <form action="contact.php" method="post">
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
