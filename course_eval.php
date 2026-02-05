<?php
session_start();
$page_title = "Course Evaluation Form | Course Evaluation System";
include 'includes/header.php';
?>

<header class="header">
    <h1>Course Evaluation Form</h1>
    <p>Your feedback is essential to maintaining educational quality</p>
</header>

<div class="container-small">
    <form action="course_eval_process.php" method="post">
        <div class="form-group">
            <label for="evaluation_id">Evaluation ID</label>
            <input type="text" id="evaluation_id" name="evaluation_id" required placeholder="Enter unique identifier">
            <span class="form-help">Create a unique identifier for this evaluation</span>
        </div>
        
        <div class="form-group">
            <label for="course_difficulty">Course Difficulty (1-10)</label>
            <input type="number" id="course_difficulty" name="course_difficulty" required min="1" max="10" placeholder="Rate 1-10">
            <span class="form-help">1 = Very Easy, 10 = Very Difficult</span>
        </div>
        
        <div class="form-group">
            <label for="course_rating">Overall Course Quality (1-10)</label>
            <input type="number" id="course_rating" name="course_rating" required min="1" max="10" placeholder="Rate 1-10">
            <span class="form-help">1 = Poor, 10 = Excellent</span>
        </div>
        
        <div class="form-group">
            <label for="instructor_rating">Instructor Effectiveness (1-10)</label>
            <input type="number" id="instructor_rating" name="instructor_rating" required min="1" max="10" placeholder="Rate 1-10">
            <span class="form-help">1 = Poor, 10 = Excellent</span>
        </div>
        
        <div class="form-group">
            <label for="feedback">Detailed Comments</label>
            <textarea id="feedback" name="feedback" rows="6" required placeholder="Please provide specific examples and constructive feedback..."></textarea>
            <span class="form-help">Include strengths, areas for improvement, and suggestions</span>
        </div>
        
        <div class="form-group">
            <label for="engagement_level">Student Engagement Level (1-10)</label>
            <input type="number" id="engagement_level" name="engagement_level" required min="1" max="10" placeholder="Rate 1-10">
            <span class="form-help">1 = Low Engagement, 10 = High Engagement</span>
        </div>
        
        <div class="form-group">
            <label for="communication_level">Communication Clarity (1-10)</label>
            <input type="number" id="communication_level" name="communication_level" required min="1" max="10" placeholder="Rate 1-10">
            <span class="form-help">1 = Unclear, 10 = Very Clear</span>
        </div>
        
        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block">Submit Evaluation</button>
            <a href="student_options.php" class="btn btn-secondary btn-block" style="margin-top: 0.5rem; text-decoration: none;">Cancel</a>
        </div>
    </form>
</div>

<?php include 'includes/footer.php'; ?>
