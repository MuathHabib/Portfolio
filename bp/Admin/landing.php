<?php
session_start();
include 'db_connection.php'; // Database connection

// Handle adding a project
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_project'])) {
    $github_link = $_POST['github_link'];
    $live_demo_link = $_POST['live_demo_link'];

    // Image upload handling
    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $image_tmp_name = $_FILES['image']['tmp_name'];
        $image_name = $_FILES['image']['name'];
        $image_size = $_FILES['image']['size'];
        $image_type = $_FILES['image']['type'];

        // Validate image type (e.g., only allow images)
        $allowed_types = ['image/jpeg', 'image/png', 'image/gif'];
        if (in_array($image_type, $allowed_types)) {
            $image_path = 'uploads/' . basename($image_name);
            // Move uploaded image to the 'uploads' directory

            if (move_uploaded_file($image_tmp_name, $image_path)) {
                // Insert project details into the database
                $stmt = $conn->prepare("INSERT INTO projects (image, github_link, live_demo_link) VALUES (?, ?, ?)");
                $stmt->bind_param("sss", $image_path, $github_link, $live_demo_link);
                $stmt->execute();

                header("Location: landing.php");
                exit;
            } else {
                echo "Error uploading the image.";
            }
        } else {
            echo "Only image files (JPEG, PNG, GIF) are allowed.";
        }
    }
}

// Handle updating a project
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_project'])) {
    $id = $_POST['id'];
    $github_link = $_POST['github_link'];
    $live_demo_link = $_POST['live_demo_link'];

    // Image upload handling (optional update)
    $image_path = $_POST['existing_image']; // Keep the existing image unless a new one is uploaded

    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $image_tmp_name = $_FILES['image']['tmp_name'];
        $image_name = $_FILES['image']['name'];
        $image_size = $_FILES['image']['size'];
        $image_type = $_FILES['image']['type'];

        // Validate image type (e.g., only allow images)
        $allowed_types = ['image/jpeg', 'image/png', 'image/gif'];
        if (in_array($image_type, $allowed_types)) {
            $image_path = 'uploads/' . basename($image_name);

            // Move uploaded image to the 'uploads' directory
            if (move_uploaded_file($image_tmp_name, $image_path)) {
                // Update project details in the database
                $stmt = $conn->prepare("UPDATE projects SET image = ?, github_link = ?, live_demo_link = ? WHERE id = ?");
                $stmt->bind_param("sssi", $image_path, $github_link, $live_demo_link, $id);
                $stmt->execute();

                header("Location: landing.php");
                exit;
            } else {
                echo "Error uploading the image.";
            }
        } else {
            echo "Only image files (JPEG, PNG, GIF) are allowed.";
        }
    } else {
        // If no new image is uploaded, just update other details
        $stmt = $conn->prepare("UPDATE projects SET github_link = ?, live_demo_link = ? WHERE id = ?");
        $stmt->bind_param("ssi", $github_link, $live_demo_link, $id);
        $stmt->execute();

        header("Location: landing.php");
        exit;
    }
}

// Handle deleting a project
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];

    $stmt = $conn->prepare("DELETE FROM projects WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();

    header("Location: landing.php");
    exit;
}

// Handle deleting a contact
if (isset($_GET['delete_contact'])) {
    $contact_id = $_GET['delete_contact'];

    $stmt = $conn->prepare("DELETE FROM contact WHERE id = ?");
    $stmt->bind_param("i", $contact_id);
    $stmt->execute();

    header("Location: landing.php");
    exit;
}

// Fetch all projects
$stmt = $conn->prepare("SELECT * FROM projects");
$stmt->execute();
$result = $stmt->get_result();
$projects = $result->fetch_all(MYSQLI_ASSOC);

// Fetch all contacts
$stmt_contact = $conn->prepare("SELECT * FROM contact");
$stmt_contact->execute();
$result_contact = $stmt_contact->get_result();
$contact = $result_contact->fetch_all(MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            /* background: linear-gradient(135deg, #1f4037, #99f2c8); */
            background-color: black;
            margin: 0;
            padding: 20px;
            color: #333;
        }

        h1,
        h2 {
            text-align: center;
            color: white;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
            background-color: white;
        }

        th,
        td {
            padding: 15px;
            text-align: center;
            border: 1px solid #ddd;
        }

        th {
            background: #f4f4f4;
            color: #555;
        }

        td img {
            max-width: 100px;
            max-height: 100px;
            object-fit: cover;
            border-radius: 5px;
        }

        form {
            background: rgba(255, 255, 255, 0.9);
            padding: 20px;
            margin: 20px auto;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
            max-width: 600px;
        }

        form h2 {
            margin-bottom: 20px;
            color: #333;
        }

        form input[type="text"],
        form input[type="file"],
        form textarea {
            width: calc(100% - 20px);
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-sizing: border-box;
        }

        form button {
            padding: 10px 15px;
            /* background: linear-gradient(135deg, #1f4037, #99f2c8); */
            background-color: black;
            border: none;
            color: white;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
            transition: background 0.3s ease;
            align-items: center;
        }

        form button:hover {
            /* background: linear-gradient(135deg, #99f2c8, #1f4037); */
            background-color: #fff;
            color: black;
        }

        a {
            color: #007BFF;
            text-decoration: none;
            transition: color 0.2s;
        }

        a:hover {
            color: #0056b3;
        }

        tbody tr:hover {
            background: #f9f9f9;
        }

        .btn-logout {
            width: 70px;
        }
    </style>
</head>

<body>
    <h1>Projects</h1>

    <!-- Add Project Form -->
    <form method="POST" enctype="multipart/form-data">
        <h2>Add Project</h2>
        <input type="file" name="image" accept="image/*" required>
        <input type="text" name="github_link" placeholder="GitHub Link" required>
        <input type="text" name="live_demo_link" placeholder="Live Demo Link" required>
        <button type="submit" name="add_project">Add Project</button>
    </form>

    <!-- Projects Table -->
    <h2>Manage Projects</h2>
        <table>
            <thead>
                <tr>
                    <th>Image</th>
                    <th>GitHub</th>
                    <th>Live Demo</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($projects as $project): ?>
                    <tr>
                        <form method="POST" enctype="multipart/form-data">
                            <td>
                                <input type="file" name="image" accept="image/*">
                                <img src="<?php echo htmlspecialchars($project['image']); ?>" alt="Project Image">
                                <input type="hidden" name="existing_image"
                                    value="<?php echo htmlspecialchars($project['image']); ?>">
                            </td>
                            <td>
                                <input type="text" name="github_link"
                                    value="<?php echo htmlspecialchars($project['github_link']); ?>" required>
                            </td>
                            <td>
                                <input type="text" name="live_demo_link"
                                    value="<?php echo htmlspecialchars($project['live_demo_link']); ?>" required>
                            </td>
                            <td>
                                <input type="hidden" name="id" value="<?php echo $project['id']; ?>">
                                <button type="submit" name="update_project">Update</button>
                                <a href="?delete=<?php echo $project['id']; ?>">Delete</a>
                            </td>
                        </form>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

    <!-- Contacts Section -->
    <h2>Manage Contacts</h2>

    <!-- Contacts Table -->
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($contact as $contacts): ?>
                <tr>
                    <td><?php echo htmlspecialchars($contact['name']); ?></td>
                    <td><?php echo htmlspecialchars($contact['email']); ?></td>
                    <td><?php echo htmlspecialchars($contact['description']); ?></td>
                    <td>
                        <a href="?delete_contact=<?php echo $contact['id']; ?>">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <form class="btn-logout" action="logout.php" method="post">
        <button type="logout" name="logout">logout</button>
    </form>
</body>

</html>