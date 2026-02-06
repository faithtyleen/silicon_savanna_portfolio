<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Contact | Faith Barmato</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <?php include 'partials/navbar.php'; ?>

    <main class="container">
        <section id="contact" class="contact-me">
            <h2><i class="fas fa-envelope"></i> Contact Me</h2>
            <p>Feel free to reach out for collaboration or inquiries.</p>

            <div class="contact-info">
                <p><i class="fas fa-envelope"></i> manyimfaith@gmail.com</p>
                <p><i class="fas fa-phone"></i> +254 729 494 261</p>
                <p><i class="fas fa-map-marker-alt"></i> Kenya</p>
            </div>

            <h3>Send a Message</h3>

            <?php if (isset($_GET['success'])): ?>
            <p class="success">Thank you! Your message has been sent.</p>
            <?php endif; ?>

            <form method="POST" action="/silicon-savanna-portfolio/contact">
                <input type="text" name="name" placeholder="Your Name" required />

                <input type="email" name="email" placeholder="Your Email" required />

                <input type="text" name="subject" placeholder="Subject" />

                <textarea name="message" placeholder="Your Message" rows="5" required></textarea>

                <button class="contact-button" type="submit">
                    <i class="fas fa-paper-plane"></i> Send Message
                </button>
            </form>
        </section>
    </main>

    <?php include 'partials/footer.php'; ?>
</body>

</html>