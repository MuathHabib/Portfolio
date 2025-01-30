<?php


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>My Portfolio</title>
  <link rel="stylesheet" href="style.css" />
  <link rel="stylesheet" href="mediaqueries.css" />
</head>

<body>
  <nav id="desktop-nav">
    <div class="logo">Muaz</div>
    <div>
      <ul class="nav-links">
        <li><a href="#about">About</a></li>
        <li><a href="#experience">Experience</a></li>
        <li><a href="#projects">Projects</a></li>
        <li><a href="contact.php">Contact</a></li>
        <li><a href="Admin/login.php">Sign in</a></li>
      </ul>
    </div>
  </nav>
  <nav id="hamburger-nav">
    <div class="logo">Muaz</div>
    <div class="hamburger-menu">
      <div class="hamburger-icon" onclick="toggleMenu()">
        <span></span>
        <span></span>
        <span></span>
      </div>
      <div class="menu-links">
        <li><a href="#about" onclick="toggleMenu()">About</a></li>
        <li><a href="#experience" onclick="toggleMenu()">Experience</a></li>
        <li><a href="#projects" onclick="toggleMenu()">Projects</a></li>
        <li><a href="contact.php" onclick="toggleMenu()">Contact</a></li>
        <li><a href="Admin/login.php" onclick="toggleMenu()">Login</a></li>
      </div>
    </div>
  </nav>
  <section id="profile">
    <div class="section__pic-container">
      <img src="./assets/muaz.jpg" alt="muaz profile picture" />
    </div>
    <div class="section__text">
      <p class="section__text__p1">Hello, I'm</p>
      <h1 class="title">Muaz</h1>
      <p class="section__text__p2">Computer Science Student</p>
      <div class="btn-container">
        <button class="btn btn-color-2" onclick="window.open('./assets/resume-example.pdf')">
          Download CV
        </button>
        <button class="btn btn-color-1" onclick="location.href='./#contact'">
          Contact Info
        </button>
      </div>
      <div id="socials-container">
        <img src="./assets/linkedin.png" alt="My LinkedIn profile" class="icon"
          onclick="location.href='https://linkedin.com/'" />
        <img src="./assets/github.png" alt="My Github profile" class="icon"
          onclick="location.href='https://github.com/'" />
      </div>
    </div>
  </section>
  <section id="about">
    <p class="section__text__p1">Get To Know More</p>
    <h1 class="title">About Me</h1>
    <div class="section-container">
      <div class="section__pic-container">
        <img src="./assets/muaz.jpg" alt="Profile picture" class="about-pic" />
      </div>
      <div class="about-details-container">
        <div class="about-containers">
          <div class="details-container">
            <img src="./assets/experience.png" alt="Experience icon" class="icon" />
            <h3>Experience</h3>
            <p>4th year <br />Computer Science Student</p>
          </div>
          <div class="details-container">
            <img src="./assets/education.png" alt="Education icon" class="icon" />
            <h3>Education</h3>
            <p>undergraduate</p>
          </div>
        </div>
        <div class="text-container">
          <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic quis
            reprehenderit et laborum, rem, dolore eum quod voluptate
            exercitationem nobis, nihil esse debitis maxime facere minus sint
            delectus velit in eos quo officiis explicabo deleniti dignissimos.
            Eligendi illum libero dolorum cum laboriosam corrupti quidem,
            reiciendis ea magnam? Nulla, impedit fuga!
          </p>
        </div>
      </div>
    </div>
    <img src="./assets/arrow.png" alt="Arrow icon" class="icon arrow" onclick="location.href='./#experience'" />
  </section>
  <section id="experience">
    <p class="section__text__p1">Explore My</p>
    <h1 class="title">Experience</h1>
    <div class="experience-details-container">
      <div class="about-containers">
        <div class="details-container">
          <h2 class="experience-sub-title">Frontend Development</h2>
          <div class="article-container">
            <article>
              <img src="./assets/checkmark.png" alt="Experience icon" class="icon" />
              <div>
                <h3>HTML</h3>
                <p>Experienced</p>
              </div>
            </article>
            <article>
              <img src="./assets/checkmark.png" alt="Experience icon" class="icon" />
              <div>
                <h3>CSS</h3>
                <p>Experienced</p>
              </div>
            </article>
            <article>
              <img src="./assets/checkmark.png" alt="Experience icon" class="icon" />
              <div>
                <h3>SASS</h3>
                <p>Intermediate</p>
              </div>
            </article>
            <article>
              <img src="./assets/checkmark.png" alt="Experience icon" class="icon" />
              <div>
                <h3>JavaScript</h3>
                <p>Basic</p>
              </div>
            </article>
            <article>
              <img src="./assets/checkmark.png" alt="Experience icon" class="icon" />
              <div>
                <h3>TypeScript</h3>
                <p>Basic</p>
              </div>
            </article>
            <article>
              <img src="./assets/checkmark.png" alt="Experience icon" class="icon" />
              <div>
                <h3>Material UI</h3>
                <p>Intermediate</p>
              </div>
            </article>
          </div>
        </div>
        <div class="details-container">
          <h2 class="experience-sub-title">Frontend Development</h2>
          <div class="article-container">
            <article>
              <img src="./assets/checkmark.png" alt="Experience icon" class="icon" />
              <div>
                <h3>PostgreSQL</h3>
                <p>Basic</p>
              </div>
            </article>
            <article>
              <img src="./assets/checkmark.png" alt="Experience icon" class="icon" />
              <div>
                <h3>Node JS</h3>
                <p>Intermediate</p>
              </div>
            </article>
            <article>
              <img src="./assets/checkmark.png" alt="Experience icon" class="icon" />
              <div>
                <h3>Express JS</h3>
                <p>Intermediate</p>
              </div>
            </article>
            <article>
              <img src="./assets/checkmark.png" alt="Experience icon" class="icon" />
              <div>
                <h3>Git</h3>
                <p>Intermediate</p>
              </div>
            </article>
          </div>
        </div>
      </div>
    </div>
    <img src="./assets/arrow.png" alt="Arrow icon" class="icon arrow" onclick="location.href='./#projects'" />
  </section>
  <?php
  include 'Admin/db_connection.php'; // Database connection
/*projects section*/
  // Fetch all projects
  $stmt = $conn->prepare("SELECT * FROM projects");
  $stmt->execute();
  $result = $stmt->get_result();
  $projects = $result->fetch_all(MYSQLI_ASSOC);
  ?>
  <section id="projects">
    <p class="section__text__p1">Browse My Recent</p>
    <h1 class="title">Projects</h1>
    <div class="experience-details-container">
      <div class="about-containers">
        <?php foreach ($projects as $project): ?>
          <div class="details-container color-container">
            <div class="article-container">
              <img src="Admin/<?php echo htmlspecialchars($project['image']); ?>" alt="Project Image"
                class="project-img" />
            </div>
            <div class="btn-container">
              <button class="btn btn-color-2 project-btn"
                onclick="location.href='<?php echo htmlspecialchars($project['github_link']); ?>'">
                GitHub
              </button>
              <button class="btn btn-color-2 project-btn"
                onclick="location.href='<?php echo htmlspecialchars($project['live_demo_link']); ?>'">
                Live Demo
              </button>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>


  <footer>
    <nav>
      <div class="nav-links-container">
        <ul class="nav-links">
          <li><a href="#about">About</a></li>
          <li><a href="#experience">Experience</a></li>
          <li><a href="#projects">Projects</a></li>
          <li><a href="contact.php">Contact</a></li>
          <li><a href="Admin/login.php">login</a></li>
        </ul>
      </div>
    </nav>
    <p>Copyright &#169; 2025 Muaz Fikadu. All Rights Reserved.</p>
  </footer>
  <script src="script.js"></script>
</body>

</html>