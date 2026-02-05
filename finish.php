<?php
session_start();
$page_title = "Evaluation Complete | Course Evaluation System";
include 'includes/header.php';
?>

<div class="container">
    <div class="card text-center">
        <h2 style="color: var(--success-color); margin-bottom: 1rem;">Evaluation Complete</h2>
        <p style="font-size: 1.1rem; color: var(--text-muted); margin-bottom: 1rem;">Thank you for your participation in the course evaluation process.</p>
        <p>Your feedback is invaluable in our commitment to maintaining and enhancing the quality of education. The information you have provided will be carefully reviewed and utilized for continuous improvement of our academic programs.</p>
        
        <div class="action-links" style="justify-content: center; margin-top: 2.5rem;">
            <a href="inputcourse.php" class="btn btn-primary">Submit Another Evaluation</a>
            <a href="student_options.php" class="btn btn-secondary">Return to Student Portal</a>
            <a href="index.php" class="btn btn-outline">Return to Home</a>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>
