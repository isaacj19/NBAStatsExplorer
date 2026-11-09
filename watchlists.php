<?php
require_once 'header.php';

// Sample state mock
$watchlists = [
    [
        'id' => 1,
        'name' => 'All-Star Targets 2026',
        'description' => 'Key players to monitor for fantasy drafting.',
        'players' => 'LeBron James, Stephen Curry, Nikola Jokic'
    ],
    [
        'id' => 2,
        'name' => 'Breakout Candidates',
        'description' => 'Young prospects showing high usage rate.',
        'players' => 'Victor Wembanyama, Anthony Edwards'
    ]
];
?>

<div style="display: flex; justify-content: space-between; align-items: center;">
    <h2>My Player Watchlists</h2>
    <a href="watchlist-create.php" class="btn btn-primary">+ Create New Watchlist</a>
</div>

<div class="card-grid">
    <?php foreach ($watchlists as $list): ?>
        <div class="card">
            <div class="card-header">
                <h3><?php echo htmlspecialchars($list['name']); ?></h3>
            </div>
            <p><?php echo htmlspecialchars($list['description']); ?></p>
            <p><strong>Tracked Players:</strong> <?php echo htmlspecialchars($list['players']); ?></p>
            <div style="margin-top: 1.5rem; display: flex; gap: 0.5rem;">
                <a href="watchlist-edit.php?id=<?php echo $list['id']; ?>" class="btn btn-secondary">Edit</a>
                <!-- Delete action implemented directly as an inline button -->
                <button onclick="alert('Watchlist deleted successfully (Mock)')" class="btn btn-danger">Delete</button>
            </div>
        </div>
    <?php endforeach; ?>
</div>

<?php require_once 'footer.php'; ?>