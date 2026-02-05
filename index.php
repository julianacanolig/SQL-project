<?php
session_start();
$page_title = "Home | Course Evaluation System";
include 'includes/header.php';
?>

<header class="header">
    <h1>Course Evaluation Portal</h1>
    <p>Enhancing Educational Excellence Through Student Feedback</p>
    <p class="subtitle">Select your role to access the evaluation system</p>
</header>

<div class="container">
    <div class="portal-grid">
        <div class="portal-card" onclick="window.location.href='student_options.php'">
            <div class="portal-icon">S</div>
            <h3>Student Portal</h3>
            <p>Submit and manage your course evaluations</p>
            <a href="student_options.php" class="btn btn-primary btn-block">Access Student Portal</a>
        </div>
        
        <div class="portal-card" onclick="window.location.href='instructor_options.php'">
            <div class="portal-icon">I</div>
            <h3>Instructor Portal</h3>
            <p>Review student feedback and evaluation reports</p>
            <a href="instructor_options.php" class="btn btn-primary btn-block">Access Instructor Portal</a>
        </div>
    </div>

    <div class="grid" style="margin-top: 4rem;">
        <div class="card">
            <h3>For Students</h3>
            <p>The Course Evaluation System enables students to provide comprehensive feedback on their learning experiences. Your input directly influences curriculum development and instructional quality.</p>
            <ul>
                <li>Submit detailed course evaluations</li>
                <li>Update existing evaluation responses</li>
                <li>Rate multiple aspects of instruction</li>
                <li>Provide constructive feedback</li>
            </ul>
        </div>
        
        <div class="card">
            <h3>For Instructors</h3>
            <p>Access aggregated student feedback to enhance teaching methodologies and course design. Utilize evaluation data to identify strengths and areas for improvement.</p>
            <ul>
                <li>View comprehensive evaluation reports</li>
                <li>Analyze student feedback data</li>
                <li>Track course performance metrics</li>
                <li>Export evaluation summaries</li>
            </ul>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>
