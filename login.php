<?php
require_once 'security/session.php';

// Handle logout logic
if (isset($_GET['action']) && $_GET['action'] === 'logout') {
    unset($_SESSION['user_logged_in']);
    header("Location: login.php");
    exit();
}

// Simple toggle login logic for demonstration
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_SESSION['user_logged_in'] = true;
    header("Location: watchlists.php");
    exit();
}

require_once 'header.php';
?>

<div style="max-width: 400px; margin: 3rem auto;" class="card">
    <h2 style="text-align: center; margin-bottom: 1.5rem;">Sign In</h2>
    <form method="POST" action="login.php">
        <label for="username">Username or Email</label>
        <input type="text" id="username" name="username" placeholder="e.g. stats_user" required>

        <label for="password">Password</label>
        <input type="password" id="password" name="password" style="width:100%; padding:0.5rem; margin-top:0.25rem; border:1px solid #cbd5e1; border-radius:4px;" required>

        <div style="margin-top: 1.5rem;">
            <button type="submit" class="btn btn-primary" style="width: 100%;">Sign In</button>
        </div>
    </form>
</div>

<?php require_once 'footer.php'; ?>