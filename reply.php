<?php
// Connect to the database
$conn = new mysqli('localhost', 'root', '', 'contact_system');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle reply submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $reply = $_POST['reply'];

    $sql = "UPDATE messages SET reply='$reply' WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        echo "Reply sent successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
$conn->close();
?>
