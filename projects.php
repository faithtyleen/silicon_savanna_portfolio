<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Projects | Faith Barmato</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <?php include 'partials/navbar.php'; ?>

    <main class="container">
        <!-- PROJECTS SECTION - EXACTLY from your appcomponent.html -->
        <section id="projects" class="projects">
            <h2><i class="fas fa-laptop-code"></i> Projects</h2>

            <div class="project-cards">
                <div class="project-card">
                    <h3>Car Rental Management System</h3>
                    <p>Automated vehicle booking, tracking, and client management using Laravel & MySQL.</p>
                </div>

                <div class="project-card">
                    <h3>Participant CRUD System</h3>
                    <p>Backend system for managing program participants with validation and reporting.</p>
                </div>

                <div class="project-card">
                    <h3>Data Analysis Dashboard</h3>
                    <p>Python-based dashboard for visualizing system and participant performance.</p>
                </div>
            </div>
        </section>
    </main>

    <?php include 'partials/footer.php'; ?>
</body>

</html>