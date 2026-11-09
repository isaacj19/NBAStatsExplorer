<?php
require_once __DIR__ . '/security/session.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NBA Stats Explorer</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <header>
        <div class="nav-container">
            <a href="index.php" class="logo">🏀 NBA Stats Explorer</a>
            <nav>
                <a href="index.php">Home</a>
                <?php if (is_logged_in()): ?>
                    <a href="watchlists.php">My Watchlists</a>
                    <a href="comparisons.php">My Comparisons</a>
                    <a href="login.php?action=logout" style="color: #f87171;">Logout</a>
                <?php else: ?>
                    <a href="login.php" class="btn btn-primary">Login</a>
                <?php endif; ?>
            </nav>
        </div>
    </header>
    <div class="container">