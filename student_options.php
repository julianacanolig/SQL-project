<?php
session_start();
$_SESSION['user_type'] = 'student';
$page_title = "Student Portal | Course Evaluation System";
include 'includes/header.php';
?>

<header class="header">
    <h1>Student Portal</h1>
    <p>Manage Your Course Evaluations</p>
</header>

<div class="container-small">
    <div class="card text-center">
        <h2>Evaluation Options</h2>
        <p style="margin-bottom: 2rem;">Please select an action to proceed</p>
        <div class="button-group">
            <a href="inputcourse.php" class="btn btn-primary btn-large">
                Submit New Evaluation
            </a>
            <a href="studentselect_to_update.php" class="btn btn-outline btn-large">
                Update Existing Evaluation
            </a>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>
