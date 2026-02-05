<?php
session_start();
$page_title = "Review Evaluation | Course Evaluation System";
include 'includes/header.php';
?>

<header class="header">
    <h1>Review Evaluation Report</h1>
    <p>Access detailed student feedback</p>
</header>

<div class="container-small">
    <div class="card">
        <h2>Retrieve Evaluation</h2>
        <form action="instructorfill_to_retrieve.php" method="post">
            <div class="form-group">
                <label for="evaluation_id">Evaluation ID</label>
                <input type="text" id="evaluation_id" name="evaluation_id" required placeholder="Enter evaluation ID (e.g., EVAL001)">
                <span class="form-help">Available evaluations: EVAL001, EVAL002, EVAL003</span>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block">Retrieve Report</button>
                <a href="instructor_options.php" class="btn btn-secondary btn-block" style="margin-top: 0.5rem; text-decoration: none;">Cancel</a>
            </div>
        </form>
    </div>
</div>

<?php include 'includes/footer.php'; ?>
