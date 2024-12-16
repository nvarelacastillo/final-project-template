<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="/public/assets/styles/homepage.css">
        <title>Projects</title>
    </head>

    <body>
    <!-- Navigation Bar -->
    <header class="navigation-bar">
        <nav class="navigation-bar-header">
            <div class="navigation-bar-container">
                <a href="/" class="navigation-bar-logo">Nicole Varela Castillo</a>
                <ul class="navigation-bar-links">
                    <li><a href="/projects">Projects</a></li>
                    <li><a href="/education">Education</a></li>
                    <li><a href="/experience">Experience</a></li>
                    <li><a href="/skills">Skills</a></li>
                    <li><a href="/contact">Contact</a></li>
                </ul>
            </div>
        </nav>
    </header>

    <!-- Projects Section -->
    <main>
        <section>
            <h2>My Projects</h2>
            <?php if (!empty($projects)): ?>
                <ul>
                    <?php foreach ($projects as $project): ?>
                        <li>
                            <strong><?php echo htmlspecialchars($project['title']); ?></strong><br>
                            <?php echo htmlspecialchars($project['description']); ?><br>
                            <a href="<?php echo htmlspecialchars($project['link']); ?>" target="_blank">View Project</a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php else: ?>
                <p>No projects available at the moment.</p>
            <?php endif; ?>

            <!-- Add New Project Form -->
            <h3>Add a New Project</h3>
            <form method="POST" action="/api/projects">
                <label for="title">Title:</label><br>
                <input type="text" id="title" name="title" required><br><br>

                <label for="description">Description:</label><br>
                <textarea id="description" name="description" required></textarea><br><br>

                <label for="link">Link:</label><br>
                <input type="url" id="link" name="link"><br><br>

                <button type="submit">Submit</button>
            </form>
        </section>
    </main>

    <!-- Footer -->
    <footer>
        <p>&copy; 2024 Nicole Varela Castillo</p>
    </footer>
    </body>

</html>
