<?php
session_start();
include 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM admin WHERE name = ? LIMIT 1");
    $stmt->bind_param("s", $name);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if ($user && $password === $user['password']) { // Direct comparison
        $_SESSION['admin'] = $user['name'];
        header("Location: landing.php");
        exit;
    } else {
        $error = "Invalid credentials.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            /* background: linear-gradient(135deg, #1f4037, #99f2c8); */
            background-color: black;
        }

        form {
            width: 100%;
            max-width: 400px;
            padding: 30px;
            border-radius: 15px;
            background: rgba(255, 255, 255, 0.9);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        }

        form h2 {
            margin: 0 0 20px;
            font-size: 24px;
            text-align: center;
            color: #333;
        }

        form p {
            color: red;
            font-size: 14px;
            text-align: center;
        }

        form label {
            font-size: 14px;
            color: #555;
        }

        form input {
            width: 100%;
            padding: 10px;
            font-size: 14px;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-sizing: border-box;
            margin-top: 5px;
        }

        form button {
            width: 100%;
            padding: 10px;
            /* background: linear-gradient(135deg, #1f4037, #99f2c8); */
            background-color: black;
            border: none;
            color: white;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        form button:hover {
            /* background: linear-gradient(135deg, #99f2c8, #1f4037); */
            background-color: #fff;
            color: black;
        }
    </style>
</head>

<body>
    <form method="POST">
        <h2>Login</h2>
        <?php if (isset($error))
            echo "<p>$error</p>"; ?>
        <label for="name">Name:</label><br>
        <input type="text" id="name" name="name" required><br><br>
        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password" required><br><br>
        <button type="submit">Login</button><br><br>
        <button type="close">close</button>
        <script>
            document.querySelector('button[type="close"]').addEventListener('click', function (event) {
                event.preventDefault();
                window.location.href = '../index.php';
            });
        </script>
    </form>
</body>

</html>