<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>About Me | Faith Barmato</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <?php include 'partials/navbar.php'; ?>

    <main class="container">
        <!-- ABOUT SECTION -->
        <section class="about-me detailed">
            <h1><i class="fas fa-user"></i> About Me</h1>
            <div class="about-content">
                <div class="about-text">
                    <p>
                        I am an ICT professional currently working at Konza Technopolis Development Authority,
                        with a strong background in software development, system administration and user support.
                    </p>
                    <p>
                        I enjoy building reliable digital solutions, improving operational efficiency,
                        and applying data-driven approaches to solve real-world problems.
                    </p>
                    <p>
                        My journey in technology began at Kenyatta University where I studied Computer Science
                        and has evolved through various roles in both government and private sectors.
                    </p>
                </div>
            </div>
        </section>

        <!-- SKILLS SECTION -->
        <section class="skills detailed">
            <h2><i class="fas fa-code"></i> Technical Skills</h2>
            <div class="skill-tags">
                <span>PHP</span>
                <span>Laravel</span>
                <span>MySQL</span>
                <span>Python</span>
                <span>JavaScript</span>
                <span>HTML/CSS</span>
                <span>Git</span>
                <span>Linux</span>
                <span>REST APIs</span>
                <span>Data Analysis</span>
                <span>System Administration</span>
                <span>DevOps</span>
            </div>
        </section>

        <!-- EXPERIENCE SECTION -->
        <section class="experience detailed">
            <h2><i class="fas fa-briefcase"></i> Professional Experience</h2>
            <div class="experience-cards">
                <div class="experience-card">
                    <h3>Information Technology Officer</h3>
                    <span class="company">Konza Technopolis Development Authority</span>
                    <span class="duration">2025 – Present</span>
                    <ul>
                        <li>Develop and maintain software systems following SDLC principles</li>
                        <li>Conduct systems analysis and optimize data center operations</li>
                        <li>Develop database-driven applications and APIs</li>
                        <li>Provide technical support and training to staff</li>
                    </ul>
                </div>
                <div class="experience-card">
                    <h3>ICT Assistant Officer</h3>
                    <span class="company">Kenya National Innovation Agency (KeNIA)</span>
                    <span class="duration">2024 – 2025</span>
                    <ul>
                        <li>System development and research support</li>
                        <li>Technical support and system administration</li>
                        <li>Documentation and reporting</li>
                        <li>Network maintenance and troubleshooting</li>
                    </ul>
                </div>
                <div class="experience-card">
                    <h3>Software Support Engineer</h3>
                    <span class="company">FLY6 Global / ICT Choice International</span>
                    <span class="duration">2025</span>
                    <ul>
                        <li>Server and application troubleshooting</li>
                        <li>Networking and hardware support</li>
                        <li>User training and customer support</li>
                        <li>Software deployment and maintenance</li>
                    </ul>
                </div>
            </div>
        </section>

        <!-- EDUCATION SECTION -->
        <section class="certifications">
            <h2><i class="fas fa-graduation-cap"></i> Education & Certifications</h2>
            <ul>
                <li>BSc Computer Science – Kenyatta University</li>
                <li>Data Science Certificate – ALX</li>
                <li>Data Science Certificate – National Research Fund (NRF)</li>
                <li>Web Development – Duke University & University of London</li>
                <li>Python & Web Development – Microsoft / ACWICT</li>
            </ul>
        </section>
    </main>

    <?php include 'partials/footer.php'; ?>

</body>

</html>