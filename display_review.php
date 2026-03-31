<?php
$conn = new mysqli("localhost", "root", "", "login");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT name, surname, comment FROM reviews ORDER BY created_at DESC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<div class='review-card'>";
        echo "<h3>" . htmlspecialchars($row['name']) . " " . htmlspecialchars($row['surname']) . "</h3>";
        echo "<p>" . nl2br(htmlspecialchars($row['comment'])) . "</p>";
        echo "<hr>";
        echo "</div>";
    }
} else {
    echo "No reviews yet.";
}

$conn->close();
?>