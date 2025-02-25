<?php
// Database connection settings
include '../includes/connection.php';

// SQL query to fetch feedback data, group by subject, and calculate average rating
$sql = "SELECT subject, 
               GROUP_CONCAT(name SEPARATOR ', ') AS names, 
               GROUP_CONCAT(suggestions SEPARATOR '; ') AS suggestions,
               AVG(rating) AS average_rating
        FROM feedback
        GROUP BY subject";

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback Results</title>
    <link rel="stylesheet" href="ss.css">
</head>
<body>
    <div class="feedback-results-wrapper">
        <h1>Feedback Summary</h1>
        <table border="1">
            <tr>
                <th>Subject</th>
                <th>Names</th>
                <th>Suggestions</th>
                <th> Rating</th>
            </tr>
            <?php
            // Display feedback data in table format
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($row['subject']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['names']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['suggestions']) . "</td>";
                    echo "<td>" . number_format($row['average_rating'], 1) . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='4'>No feedback available</td></tr>";
            }
            ?>
        </table>
    </div>
</body>
</html>

<?php
// Close the database connection
$conn->close();
?>
