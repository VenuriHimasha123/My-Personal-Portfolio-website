<?php
// Connect to the database
$conn = new mysqli('localhost', 'root', '', 'contact_system');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch messages
$sql = "SELECT * FROM messages";
$result = $conn->query($sql);

while ($row = $result->fetch_assoc()) {
    echo "<div>";
    echo "<h3>" . $row['name'] . " (" . $row['email'] . ")</h3>";
    echo "<p>" . $row['message'] . "</p>";
    echo "<form method='POST' action='reply.php'>";
    echo "<input type='hidden' name='id' value='" . $row['id'] . "'>";
    echo "<textarea name='reply'>" . $row['reply'] . "</textarea>";
    echo "<button type='submit'>Reply</button>";
    echo "</form>";
    echo "</div>";
}
$conn->close();
?>
