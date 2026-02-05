<?php
session_start();
$_SESSION['user_type'] = 'instructor';
$page_title = "Instructor Portal | Course Evaluation System";
include 'config/config.php';
include 'includes/header.php';

// Get statistics
$eval_count = count($conn->query("SELECT evaluation_id FROM course_evaluation")->fetchAll());
$course_count = count($conn->query("SELECT course_id FROM course")->fetchAll());
?>

<header class="header">
    <h1>Instructor Portal</h1>
    <p>Course Evaluation Management</p>
</header>

<div class="container-small">
    <div class="card text-center">
        <h2>Evaluation Reports</h2>
        <p style="margin-bottom: 2rem;">Access and review student evaluation data</p>
        <div class="button-group">
            <a href="instructorselect_to_retrieve.php" class="btn btn-primary btn-large">
                Review Evaluation Report
            </a>
        </div>
    </div>

    <div class="stats-grid" style="margin-top: 2rem;">
        <div class="stat-card">
            <div class="stat-number"><?php echo $eval_count; ?></div>
            <div class="stat-label">Total Evaluations</div>
        </div>
        <div class="stat-card">
            <div class="stat-number"><?php echo $course_count; ?></div>
            <div class="stat-label">Courses Evaluated</div>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>
