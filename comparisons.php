<?php
require_once 'header.php';

// Mock data representing Saved Comparison definitions (ComparisonID, Title, Season, Players, Measures)
$comparisons = [
    [
        'id' => 1,
        'title' => 'MVP Candidates Head-to-Head',
        'season' => '2025-2026',
        'players' => ['Nikola Jokic', 'LeBron James'],
        'measures' => ['Points Per Game', 'Assists Per Game', 'Rebounds Per Game'],
        'stats' => [
            'Nikola Jokic' => ['Points Per Game' => '29.7', 'Assists Per Game' => '10.1', 'Rebounds Per Game' => '13.4'],
            'LeBron James' => ['Points Per Game' => '24.8', 'Assists Per Game' => '8.3', 'Rebounds Per Game' => '7.2']
        ],
        'updated_at' => '2026-11-08 14:30 UTC'
    ],
    [
        'id' => 2,
        'title' => 'Elite Sharpshooters Comparison',
        'season' => '2025-2026',
        'players' => ['Stephen Curry', 'Devin Booker'],
        'measures' => ['Points Per Game', 'Assists Per Game', 'Rebounds Per Game'],
        'stats' => [
            'Stephen Curry' => ['Points Per Game' => '26.4', 'Assists Per Game' => '5.1', 'Rebounds Per Game' => '4.5'],
            'Devin Booker' => ['Points Per Game' => '27.1', 'Assists Per Game' => '6.9', 'Rebounds Per Game' => '4.8']
        ],
        'updated_at' => '2026-11-07 09:15 UTC'
    ]
];
?>

<div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1.5rem;">
    <h2>My Saved Comparisons</h2>
    <a href="comparison-create.php" class="btn btn-primary">+ Build New Comparison</a>
</div>

<?php foreach ($comparisons as $comp): ?>
    <div class="card" style="margin-bottom: 2rem;">
        <div class="card-header">
            <div>
                <h3 style="margin: 0;"><?php echo htmlspecialchars($comp['title']); ?></h3>
                <small style="color: #64748b;">Season: <?php echo htmlspecialchars($comp['season']); ?> | Last Refreshed: <?php echo htmlspecialchars($comp['updated_at']); ?></small>
            </div>
            <div style="display: flex; gap: 0.5rem;">
                <a href="comparison-edit.php?id=<?php echo $comp['id']; ?>" class="btn btn-secondary">Edit</a>
                <button onclick="alert('Comparison \'<?php echo addslashes($comp['title']); ?>\' deleted successfully (Mock)')" class="btn btn-danger">Delete</button>
            </div>
        </div>

        <!-- Side-by-Side Statistical Matrix Table -->
        <table style="width: 100%; border-collapse: collapse; margin-top: 1rem;">
            <thead>
                <tr style="background-color: #f1f5f9; text-align: left;">
                    <th style="padding: 0.75rem; border: 1px solid #cbd5e1;">Stat / Measure</th>
                    <?php foreach ($comp['players'] as $player): ?>
                        <th style="padding: 0.75rem; border: 1px solid #cbd5e1; text-align: center;"><?php echo htmlspecialchars($player); ?></th>
                    <?php endforeach; ?>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($comp['measures'] as $measure): ?>
                    <tr>
                        <td style="padding: 0.75rem; border: 1px solid #cbd5e1; font-weight: 600;"><?php echo htmlspecialchars($measure); ?></td>
                        <?php foreach ($comp['players'] as $player): ?>
                            <td style="padding: 0.75rem; border: 1px solid #cbd5e1; text-align: center;">
                                <?php echo htmlspecialchars($comp['stats'][$player][$measure] ?? 'N/A'); ?>
                            </td>
                        <?php endforeach; ?>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
<?php endforeach; ?>

<?php require_once 'footer.php'; ?>