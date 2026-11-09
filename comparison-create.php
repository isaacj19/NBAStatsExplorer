<?php require_once 'header.php'; ?>

<div style="max-width: 650px; margin: 0 auto;" class="card">
    <h2>Create Saved Comparison</h2>
    <form action="comparisons.php" method="GET">
        <label for="title">Comparison Title *</label>
        <input type="text" id="title" name="title" placeholder="e.g., Western Conference Big Men" required>

        <label for="season">Select Season *</label>
        <select id="season" name="season" required>
            <option value="2025-2026">2025-2026 Season</option>
            <option value="2024-2025">2024-2025 Season</option>
            <option value="2023-2024">2023-2024 Season</option>
        </select>

        <label>Select Players (Choose at least 2) *</label>
        <div style="margin-top: 0.5rem; display: grid; grid-template-columns: 1fr 1fr; gap: 0.5rem;">
            <label><input type="checkbox" name="players[]" value="Nikola Jokic" checked> Nikola Jokic</label>
            <label><input type="checkbox" name="players[]" value="LeBron James" checked> LeBron James</label>
            <label><input type="checkbox" name="players[]" value="Stephen Curry"> Stephen Curry</label>
            <label><input type="checkbox" name="players[]" value="Victor Wembanyama"> Victor Wembanyama</label>
        </div>

        <label>Statistical Measures to Display *</label>
        <div style="margin-top: 0.5rem; display: grid; grid-template-columns: 1fr 1fr; gap: 0.5rem;">
            <label><input type="checkbox" name="measures[]" value="Points Per Game" checked> Points Per Game (PPG)</label>
            <label><input type="checkbox" name="measures[]" value="Assists Per Game" checked> Assists Per Game (APG)</label>
            <label><input type="checkbox" name="measures[]" value="Rebounds Per Game" checked> Rebounds Per Game (RPG)</label>
            <label><input type="checkbox" name="measures[]" value="Steals Per Game"> Steals Per Game (SPG)</label>
            <label><input type="checkbox" name="measures[]" value="Blocks Per Game"> Blocks Per Game (BPG)</label>
        </div>

        <div style="margin-top: 1.5rem; display: flex; gap: 1rem;">
            <button type="submit" class="btn btn-primary">Save Comparison</button>
            <a href="comparisons.php" class="btn btn-secondary">Cancel</a>
        </div>
    </form>
</div>

<?php require_once 'footer.php'; ?>