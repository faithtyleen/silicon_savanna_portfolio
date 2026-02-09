<?php
// index.php - MANUAL ROUTER
// Location: C:\xampp\htdocs\silicon-savanna-portfolio\index.php

// 1. GET THE REQUESTED URL

$request = $_SERVER['REQUEST_URI'];

// Remove query string (?param=value) if present
$request = strtok($request, '?');

// 2. REMOVE PROJECT FOLDER NAME FROM URL
$base_path = '/silicon-savanna-portfolio';
if (strpos($request, $base_path) === 0) {
    $request = substr($request, strlen($base_path));
}

// Handle empty request (homepage)
if ($request === '') {
    $request = '/';
}

// Remove trailing slash (except for root)
$request = rtrim($request, '/');
if ($request === '') {
    $request = '/';
}


// 3. MANUAL ROUTING LOGIC

switch ($request) {
    //  HOMEPAGE 
    case '/':
        require 'home.php';
        break;
    
    // ABOUT PAGE 
    case '/about':
        require 'about.php';
        break;
    
    // PROJECTS PAGE 
    case '/projects':
        require 'projects.php';
        break;
    
    // CONTACT PAGE 
    case '/contact':
        // Check if form was submitted (POST request)
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Handle form submission 
            require 'process_contact.php';
        } else {
            // Show contact form
            require 'contact.php';
        }
        break;
    
    // ========== 404 - PAGE NOT FOUND ==========
    default:
        // Set HTTP 404 status
        http_response_code(404);
        
        // Show custom 404 page
        if (file_exists('404.php')) {
            require '404.php';
        } else {
            // Default 404 message
            echo "<!DOCTYPE html>";
            echo "<html>";
            echo "<head>";
            echo "    <title>404 - Page Not Found</title>";
            echo "    <link rel='stylesheet' href='css/style.css'>";
            echo "</head>";
            echo "<body>";
            echo "    <h1>404 - Page Not Found</h1>";
            echo "    <p>The page you requested does not exist.</p>";
            echo "    <a href='/silicon-savanna-portfolio/'>Return to Homepage</a>";
            echo "</body>";
            echo "</html>";
        }
        break;
}
?>