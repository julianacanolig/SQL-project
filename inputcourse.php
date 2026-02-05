<?php
session_start();
$page_title = "Course Registration | Course Evaluation System";
include 'includes/header.php';
?>

<header class="header">
    <h1>Course Registration</h1>
    <p>Add course details to begin evaluation process</p>
</header>

<div class="container-small">
    <form action="inputcourse_process.php" method="post">
        <div class="form-group">
            <label for="course_id">Course ID</label>
            <input type="text" id="course_id" name="course_id" required placeholder="e.g., CS101">
            <span class="form-help">Enter the official course identifier</span>
        </div>

        <div class="form-group">
            <label for="course_name">Course Name</label>
            <input type="text" id="course_name" name="course_name" required placeholder="e.g., Introduction to Computer Science">
            <span class="form-help">Full course title as listed in catalog</span>
        </div>

        <div class="form-group">
            <label for="credits">Credit Hours</label>
            <input type="number" id="credits" name="credits" required min="1" max="6" placeholder="e.g., 3">
            <span class="form-help">Number of credit hours (1-6)</span>
        </div>

        <div class="form-group">
            <label for="mode">Delivery Mode</label>
            <select id="mode" name="mode" required>
                <option value="">Select delivery mode...</option>
                <option value="In-Person">In-Person</option>
                <option value="Online">Online</option>
                <option value="Hybrid">Hybrid</option>
            </select>
            <span class="form-help">Primary method of course delivery</span>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block">Continue to Evaluation</button>
            <a href="student_options.php" class="btn btn-secondary btn-block" style="margin-top: 0.5rem; text-decoration: none;">Cancel</a>
        </div>
    </form>
</div>

<?php include 'includes/footer.php'; ?>
