<?php
// Enable error reporting 
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Check if form was submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get form data
    $name = isset($_POST['name']) ? htmlspecialchars(trim($_POST['name'])) : '';
    $email = isset($_POST['email']) ? htmlspecialchars(trim($_POST['email'])) : '';
    $subject = isset($_POST['subject']) ? htmlspecialchars(trim($_POST['subject'])) : '';
    $message = isset($_POST['message']) ? htmlspecialchars(trim($_POST['message'])) : '';
    
    // Validate form data
    $errors = [];
    
    // Validate name
    if (empty($name)) {
        $errors[] = 'Name is required';
    } elseif (strlen($name) < 2) {
        $errors[] = 'Name must be at least 2 characters';
    }
    
    // Validate email
    if (empty($email)) {
        $errors[] = 'Email is required';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'Please enter a valid email address';
    }
    
    // Validate message
    if (empty($message)) {
        $errors[] = 'Message is required';
    } elseif (strlen($message) < 10) {
        $errors[] = 'Message must be at least 10 characters';
    }
    
    // If there are no errors, process the form
    if (empty($errors)) {
        // Create data array
        $data = [
            'timestamp' => date('Y-m-d H:i:s'),
            'name' => $name,
            'email' => $email,
            'subject' => $subject ?: 'No Subject',
            'message' => $message,
            'ip_address' => $_SERVER['REMOTE_ADDR'] ?? 'Unknown'
        ];
        
        // Save to JSON file 
        $filename = 'contact_submissions.json';
        
        // Read existing data if file exists
        if (file_exists($filename)) {
            $existing_data = json_decode(file_get_contents($filename), true);
            if (!is_array($existing_data)) {
                $existing_data = [];
            }
        } else {
            $existing_data = [];
        }
        
        // Add new submission
        $existing_data[] = $data;
        
        // Save to file
        if (file_put_contents($filename, json_encode($existing_data, JSON_PRETTY_PRINT))) {
            
            header('Location: contact.php?success=1');
            exit;
        } else {
            header('Location: contact.php?error=' . urlencode('Failed to save your message. Please try again.'));
            exit;
        }
    } else {
        // Redirect with errors
        header('Location: contact.php?error=' . urlencode(implode('. ', $errors)));
        exit;
    }
} else {
    // If not a POST request, redirect to contact page
    header('Location: contact.php');
    exit;
}
?>