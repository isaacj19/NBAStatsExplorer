<?php require_once 'header.php'; ?>

<div style="max-width: 600px; margin: 0 auto;" class="card">
    <h2>Create New Watchlist</h2>
    <form action="watchlists.php" method="GET">
        <label for="name">Watchlist Name *</label>
        <input type="text" id="name" name="name" required placeholder="e.g., Western Conference Guards">

        <label for="description">Description</label>
        <textarea id="description" name="description" rows="3" placeholder="Optional notes..."></textarea>

        <label>Select Players to Track *</label>
        <div style="margin-top: 0.5rem; display: flex; flex-direction: column; gap: 0.5rem;">
            <label><input type="checkbox" name="players[]" value="LeBron James"> LeBron James (LAL)</label>
            <label><input type="checkbox" name="players[]" value="Stephen Curry"> Stephen Curry (GSW)</label>
            <label><input type="checkbox" name="players[]" value="Nikola Jokic"> Nikola Jokic (DEN)</label>
            <label><input type="checkbox" name="players[]" value="Victor Wembanyama"> Victor Wembanyama (SAS)</label>
        </div>

        <div style="margin-top: 1.5rem; display: flex; gap: 1rem;">
            <button type="submit" class="btn btn-primary">Save Watchlist</button>
            <a href="watchlists.php" class="btn btn-secondary">Cancel</a>
        </div>
    </form>
</div>

<?php require_once 'footer.php'; ?>