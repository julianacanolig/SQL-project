<?php
session_start();
$page_title = "Report Exported | Course Evaluation System";
include 'includes/header.php';
?>

<div class="container">
    <div class="card text-center">
        <h2 style="color: var(--success-color); margin-bottom: 1rem;">Evaluation Report Exported</h2>
        <p style="font-size: 1.1rem; color: var(--text-muted); margin-bottom: 1rem;">The evaluation report has been successfully exported.</p>
        <p>The report data is now available for download and can be utilized for analysis and record-keeping purposes.</p>
        
        <div class="action-links" style="justify-content: center; margin-top: 2.5rem;">
            <a href="instructorselect_to_retrieve.php" class="btn btn-primary">Review Another Evaluation</a>
            <a href="instructor_options.php" class="btn btn-secondary">Return to Instructor Portal</a>
            <a href="index.php" class="btn btn-outline">Return to Home</a>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>
