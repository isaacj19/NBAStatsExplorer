<?php require_once 'header.php'; ?>

<div style="text-align: center; padding: 2rem 0;">
    <h1>Welcome to NBA Stats Explorer</h1>
    <p style="font-size: 1.2rem; max-width: 600px; margin: 0 auto; color: #475569;">
        Democratizing access to NBA statistics, custom player watchlists, and saved head-to-head comparisons.
    </p>
    <div style="margin-top: 2rem;">
        <?php if (!is_logged_in()): ?>
            <a href="login.php" class="btn btn-primary" style="padding: 0.75rem 1.5rem;">Sign In to Get Started</a>
        <?php else: ?>
            <a href="watchlists.php" class="btn btn-primary">Manage Watchlists</a>
            <a href="comparisons.php" class="btn btn-secondary">Saved Comparisons</a>
        <?php endif; ?>
    </div>
</div>

<h2>Live NBA API Data Sample</h2>
<div class="card-grid">
    <div class="card">
        <h3>LeBron James</h3>
        <p><strong>Team:</strong> L.A. Lakers</p>
        <p><strong>PPG:</strong> 24.8 | <strong>APG:</strong> 8.3 | <strong>RPG:</strong> 7.2</p>
    </div>
    <div class="card">
        <h3>Stephen Curry</h3>
        <p><strong>Team:</strong> Golden State Warriors</p>
        <p><strong>PPG:</strong> 26.4 | <strong>APG:</strong> 5.1 | <strong>RPG:</strong> 4.5</p>
    </div>
    <div class="card">
        <h3>Nikola Jokic</h3>
        <p><strong>Team:</strong> Denver Nuggets</p>
        <p><strong>PPG:</strong> 29.7 | <strong>APG:</strong> 10.1 | <strong>RPG:</strong> 13.4</p>
    </div>
</div>

<?php require_once 'footer.php'; ?>