<?php
session_start();

if (!isset($_SESSION['admin'])) {
    header('Location: login.php');
    exit;
}

// Logout
if (isset($_GET['logout'])) {
    session_destroy();
    header('Location: login.php');
    exit;
}

require '../php/db.php';

// Proje ekleme
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_project'])) {
    $title = trim($_POST['title'] ?? '');
    $description = trim($_POST['description'] ?? '');
    $tags = trim($_POST['tags'] ?? '');
    $link = trim($_POST['link'] ?? '');

    if ($title && $description) {
        $stmt = $pdo->prepare("INSERT INTO projects (title, description, tags, link) VALUES (?, ?, ?, ?)");
        $stmt->execute([$title, $description, $tags, $link]);
    }
}

// Proje silme
if (isset($_GET['delete'])) {
    $id = (int)$_GET['delete'];
    $pdo->prepare("DELETE FROM projects WHERE id = ?")->execute([$id]);
}

$projects = $pdo->query("SELECT * FROM projects ORDER BY created_at DESC")->fetchAll(PDO::FETCH_ASSOC);
$contacts = $pdo->query("SELECT * FROM contacts ORDER BY created_at DESC")->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="../css/style.css">
    <style>
        .dashboard { max-width: 900px; margin: 2rem auto; padding: 0 1rem; }
        .dashboard h1 { color: var(--primary); margin-bottom: 2rem; }
        .dashboard h2 { color: var(--primary); margin: 2rem 0 1rem; }
        .card {
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: 12px;
            padding: 1.5rem;
            margin-bottom: 1rem;
        }
        .card h3 { margin-bottom: 0.5rem; }
        .card p { color: var(--text-muted); font-size: 0.9rem; }
        .delete-btn {
            background: #ff4444;
            color: white;
            border: none;
            padding: 0.3rem 0.8rem;
            border-radius: 6px;
            cursor: pointer;
            font-size: 0.85rem;
            margin-top: 0.5rem;
        }
        .add-form {
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: 12px;
            padding: 1.5rem;
            margin-bottom: 2rem;
        }
        .add-form input, .add-form textarea {
            width: 100%;
            background: var(--bg);
            border: 1px solid var(--border);
            color: var(--text);
            padding: 0.8rem 1rem;
            border-radius: 8px;
            font-size: 1rem;
            margin-bottom: 1rem;
            outline: none;
            font-family: 'Inter', sans-serif;
        }
        .add-form input:focus, .add-form textarea:focus {
            border-color: var(--primary);
        }
        .logout { float: right; }
        table { width: 100%; border-collapse: collapse; }
        table th, table td {
            padding: 0.8rem;
            text-align: left;
            border-bottom: 1px solid var(--border);
            font-size: 0.9rem;
        }
        table th { color: var(--primary); }
    </style>
</head>
<body>
    <div class="dashboard">
        <h1>Admin Dashboard 
            <a href="?logout=1" class="btn logout">Logout</a>
        </h1>

        <!-- ADD PROJECT -->
        <h2>Add New Project</h2>
        <form method="POST" class="add-form">
            <input type="text" name="title" placeholder="Project Title" required />
            <textarea name="description" placeholder="Description" rows="3" required></textarea>
            <input type="text" name="tags" placeholder="Tags (comma separated: Unity, C#, PHP)" />
            <input type="text" name="link" placeholder="Project Link (optional)" />
            <button type="submit" name="add_project" class="btn">Add Project</button>
        </form>

        <!-- PROJECTS LIST -->
        <h2>Projects</h2>
        <?php foreach ($projects as $project): ?>
        <div class="card">
            <h3><?= htmlspecialchars($project['title']) ?></h3>
            <p><?= htmlspecialchars($project['description']) ?></p>
            <p><small><?= htmlspecialchars($project['tags']) ?></small></p>
            <a href="?delete=<?= $project['id'] ?>" 
               onclick="return confirm('Delete this project?')"
               class="delete-btn">Delete</a>
        </div>
        <?php endforeach; ?>

        <!-- CONTACTS -->
        <h2>Contact Messages</h2>
        <?php if (empty($contacts)): ?>
            <p style="color: var(--text-muted)">No messages yet.</p>
        <?php else: ?>
        <table>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Message</th>
                <th>Date</th>
            </tr>
            <?php foreach ($contacts as $contact): ?>
            <tr>
                <td><?= htmlspecialchars($contact['name']) ?></td>
                <td><?= htmlspecialchars($contact['email']) ?></td>
                <td><?= htmlspecialchars($contact['message']) ?></td>
                <td><?= $contact['created_at'] ?></td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>

</body>
</html>