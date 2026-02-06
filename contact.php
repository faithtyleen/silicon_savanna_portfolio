<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Contact | Faith Barmato</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
    <style>
    /* Modal Styles */
    .modal-overlay {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.8);
        justify-content: center;
        align-items: center;
        z-index: 1000;
    }

    .modal-content {
        background: #1a1a1a;
        padding: 40px;
        border-radius: 20px;
        width: 90%;
        max-width: 500px;
        position: relative;
        border: 1px solid #2d3748;
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.5);
    }

    .close-modal {
        position: absolute;
        top: 20px;
        right: 25px;
        font-size: 28px;
        color: #9ca3af;
        background: none;
        border: none;
        cursor: pointer;
        transition: color 0.3s;
    }

    .close-modal:hover {
        color: #60a5fa;
    }
    </style>
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

            <!-- Button to open modal -->
            <button class="contact-button" id="openModalBtn">
                <i class="fas fa-paper-plane"></i> Send Me a Message
            </button>

            <!-- Success/Error messages (will show after form submission) -->
            <?php if (isset($_GET['success'])): ?>
            <p class="success">Thank you! Your message has been sent.</p>
            <?php endif; ?>

            <?php if (isset($_GET['error'])): ?>
            <p class="error">Error: <?php echo htmlspecialchars($_GET['error']); ?></p>
            <?php endif; ?>
        </section>
    </main>

    <!-- Modal Form (hidden by default) -->
    <div class="modal-overlay" id="contactModal">
        <div class="modal-content">
            <button class="close-modal" id="closeModalBtn">&times;</button>

            <h3 style="color: #e0e0e0; margin-bottom: 25px; text-align: center; font-size: 1.8rem;">
                <i class="fas fa-envelope"></i> Send Me a Message
            </h3>

            <form method="POST" action="process_contact.php" id="contactForm">
                <div class="form-group">
                    <input type="text" name="name" placeholder="Your Name" required />
                </div>

                <div class="form-group">
                    <input type="email" name="email" placeholder="Your Email" required />
                </div>

                <div class="form-group">
                    <input type="text" name="subject" placeholder="Subject" />
                </div>

                <div class="form-group">
                    <textarea name="message" placeholder="Your Message" rows="5" required></textarea>
                </div>

                <button class="contact-button" type="submit" style="width: 100%;">
                    <i class="fas fa-paper-plane"></i> Send Message
                </button>
            </form>
        </div>
    </div>

    <?php include 'partials/footer.php'; ?>

    <script>
    // Modal functionality
    const openModalBtn = document.getElementById('openModalBtn');
    const closeModalBtn = document.getElementById('closeModalBtn');
    const contactModal = document.getElementById('contactModal');
    const contactForm = document.getElementById('contactForm');

    // Open modal when "Send Me a Message" button is clicked
    openModalBtn.addEventListener('click', function() {
        contactModal.style.display = 'flex';
        document.body.style.overflow = 'hidden'; // Prevent scrolling
    });

    // Close modal when X is clicked
    closeModalBtn.addEventListener('click', function() {
        contactModal.style.display = 'none';
        document.body.style.overflow = 'auto';
        // Reset form
        contactForm.reset();
    });

    // Close modal when clicking outside
    contactModal.addEventListener('click', function(e) {
        if (e.target === contactModal) {
            contactModal.style.display = 'none';
            document.body.style.overflow = 'auto';
            contactForm.reset();
        }
    });

    // Close modal with Escape key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape' && contactModal.style.display === 'flex') {
            contactModal.style.display = 'none';
            document.body.style.overflow = 'auto';
            contactForm.reset();
        }
    });

    // Form validation
    const form = document.getElementById('contactForm');
    const inputs = form.querySelectorAll('input, textarea');

    inputs.forEach(input => {
        input.addEventListener('blur', function() {
            validateField(this);
        });

        input.addEventListener('input', function() {
            clearError(this);
        });
    });

    form.addEventListener('submit', function(e) {
        let isValid = true;

        inputs.forEach(input => {
            if (!validateField(input)) {
                isValid = false;
            }
        });

        if (!isValid) {
            e.preventDefault();
            return false;
        }

        // If form is valid, submit via AJAX or let it submit normally
        // For AJAX submission (prevents page reload):
        /*
        e.preventDefault();
        
        const formData = new FormData(this);
        
        fetch('process_contact.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert('Message sent successfully!');
                contactModal.style.display = 'none';
                contactForm.reset();
                document.body.style.overflow = 'auto';
            } else {
                alert('Error: ' + data.message);
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('An error occurred. Please try again.');
        });
        */
    });

    function validateField(field) {
        const value = field.value.trim();
        const fieldName = field.getAttribute('name');
        let error = '';

        if (field.hasAttribute('required') && !value) {
            error = 'This field is required';
        } else if (fieldName === 'email' && value) {
            const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailPattern.test(value)) {
                error = 'Please enter a valid email';
            }
        }

        if (error) {
            showError(field, error);
            return false;
        }

        return true;
    }

    function showError(field, message) {
        clearError(field);

        const errorDiv = document.createElement('div');
        errorDiv.className = 'field-error';
        errorDiv.textContent = message;
        errorDiv.style.color = '#dc2626';
        errorDiv.style.fontSize = '14px';
        errorDiv.style.marginTop = '5px';

        field.parentNode.appendChild(errorDiv);
        field.style.borderColor = '#dc2626';
    }

    function clearError(field) {
        const errorDiv = field.parentNode.querySelector('.field-error');
        if (errorDiv) {
            errorDiv.remove();
        }
        field.style.borderColor = '#555';
    }

    // Check if there are success/error messages in URL
    // If so, show the modal automatically
    window.addEventListener('load', function() {
        const urlParams = new URLSearchParams(window.location.search);
        if (urlParams.has('success') || urlParams.has('error')) {
            contactModal.style.display = 'flex';
            document.body.style.overflow = 'hidden';

            // Clear URL parameters after showing modal
            setTimeout(() => {
                window.history.replaceState({}, document.title, window.location.pathname);
            }, 100);
        }
    });
    </script>
    <?php include 'partials/footer.php'; ?>
</body>

</html>