<?php
// Database connection settings
include '../includes/connection.php';

// Process the form data after submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data
    $name = $conn->real_escape_string($_POST['name']);
    $email = $conn->real_escape_string($_POST['email']);
    $subject = $conn->real_escape_string($_POST['subject']);
    $suggestions = $conn->real_escape_string($_POST['suggestions']);
    $rating = $conn->real_escape_string($_POST['rating']);

    // SQL query to insert the data into the `feedback` table
    $sql = "INSERT INTO feedback (name, email, subject, suggestions, rating) VALUES ('$name', '$email', '$subject', '$suggestions', '$rating')";

    // Execute the query and check for success
    if ($conn->query($sql) === TRUE) {
        // Alert message and redirect back to the same page
        echo "<script>
            alert('Feedback submitted successfully!');
            window.location.href = 'aaaa.php'; // Change to your feedback form page URL
        </script>";
    } else {
        // Error message and redirect back to the same page
        echo "<script>
            alert('Error: " . $conn->error . "');
            window.location.href = 'aaaa.php'; // Change to your feedback form page URL
        </script>";
    }

    // Close the database connection
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback Form</title>
    <link rel="stylesheet" href="s.css">
    <!-- Font Awesome for Star Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body>
    <div class="feedback-wrapper">
        <form action="" method="POST">
            <div class="feedback-title">Rate your experience</div>
            <div class="feedback-content">We highly value your feedback! Kindly take a moment to rate your experience and provide us with your valuable feedback.</div>

            <!-- Name field -->
            <div class="feedback-name-box">
                <label for="feedback-name">Name:</label>
                <input type="text" id="feedback-name" name="name" placeholder="Your Name" required />
            </div>

            <!-- Email field -->
            <div class="feedback-email-box">
                <label for="feedback-email">Email:</label>
                <input type="email" id="feedback-email" name="email" placeholder="Your Email" required />
            </div>

            <!-- Subject field -->
            <div class="feedback-subject-box">
                <label for="feedback-subject">Subject:</label>
                <input type="text" id="feedback-subject" name="subject" placeholder="Subject Name" required />
            </div>

            <!-- Rating stars -->
            <div class="feedback-rate-box">
                <span class="feedback-star" data-value="1"><i class="fas fa-star" required checked="checked"></i></span>
                <span class="feedback-star" data-value="2"><i class="fas fa-star"></i></span>
                <span class="feedback-star" data-value="3"><i class="fas fa-star"></i></span>
                <span class="feedback-star" data-value="4"><i class="fas fa-star"></i></span>
                <span class="feedback-star" data-value="5"><i class="fas fa-star"></i></span>
                <input type="hidden" name="rating" id="rating" value="1" />
            </div>

            <!-- Suggestions field -->
             <div class="feedback-suggestion-box">
             <label for="feedback-comment">Suggestions</label>
             <textarea cols="30" rows="6" name="suggestions" placeholder="Tell us about your experience!" required></textarea>
             </div>
            

            <!-- Submit button -->
            <button type="submit" class="feedback-submit-btn">Send</button>
        </form>
    </div>

    <script src="s.js"></script>
</body>
</html>
