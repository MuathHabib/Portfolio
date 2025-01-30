<?php
include 'Admin/db_connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $description = $_POST['description'];

    $stmt = $conn->prepare("INSERT INTO contact (name, email, description) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $email, $description);
    $stmt->execute();
    $success = "Message sent successfully.";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
    <link rel="stylesheet" href="css/contact.css">
</head>

<body>
    <form method="POST">
        <h2>Contact Us</h2>
        <?php if (isset($success))
            echo "<p class='success'>$success</p>"; ?>
        <label for="name">Name:</label><br>
        <input type="text" id="name" name="name" required><br><br>
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" required><br><br>
        <label for="description">Message:</label><br>
        <textarea id="description" name="description" rows="5" required></textarea><br><br>
        <button type="submit">Send</button><br><br>
        <button type="close">close</button>
        <script>
            document.querySelector('button[type="close"]').addEventListener('click', function (event) {
                event.preventDefault();
                window.location.href = 'index.php';
            });
        </script>
    </form>
</body>

</html>