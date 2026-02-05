<?php
session_start();
$page_title = "Update Evaluation Form | Course Evaluation System";
include 'config/config.php';
include 'includes/header.php';

$evaluation_id = $_POST['evaluation_id'] ?? '';

if (empty($evaluation_id)) {
    header('Location: studentselect_to_update.php');
    exit;
}

try {
    $query = "SELECT evaluation_id, course_difficulty, course_rating, instructor_rating, 
              feedback, engagement_level, communication_level 
              FROM course_evaluation WHERE evaluation_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bindValue(1, $evaluation_id);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $row = $stmt->fetch();

    if (!$row) {
        echo '<div class="container"><div class="message message-error">Evaluation not found.</div></div>';
        include 'includes/footer.php';
        exit;
    }
    ?>

    <header class="header">
        <h1>Update Evaluation</h1>
        <p>Modify evaluation: <?php echo htmlspecialchars($row['evaluation_id']); ?></p>
    </header>

    <div class="container-small">
        <form action="studentupdate.php" method="post">
            <input type="hidden" name="evaluation_id" value="<?php echo htmlspecialchars($row['evaluation_id']); ?>">
            
            <div class="form-group">
                <label for="course_difficulty">Course Difficulty (1-10)</label>
                <input type="number" id="course_difficulty" name="course_difficulty" 
                       value="<?php echo htmlspecialchars($row['course_difficulty']); ?>" 
                       required min="1" max="10">
            </div>
            
            <div class="form-group">
                <label for="course_rating">Overall Course Quality (1-10)</label>
                <input type="number" id="course_rating" name="course_rating" 
                       value="<?php echo htmlspecialchars($row['course_rating']); ?>" 
                       required min="1" max="10">
            </div>
            
            <div class="form-group">
                <label for="instructor_rating">Instructor Effectiveness (1-10)</label>
                <input type="number" id="instructor_rating" name="instructor_rating" 
                       value="<?php echo htmlspecialchars($row['instructor_rating']); ?>" 
                       required min="1" max="10">
            </div>
            
            <div class="form-group">
                <label for="feedback">Detailed Comments</label>
                <textarea id="feedback" name="feedback" rows="6" required><?php echo htmlspecialchars($row['feedback']); ?></textarea>
            </div>
            
            <div class="form-group">
                <label for="engagement_level">Student Engagement Level (1-10)</label>
                <input type="number" id="engagement_level" name="engagement_level" 
                       value="<?php echo htmlspecialchars($row['engagement_level']); ?>" 
                       required min="1" max="10">
            </div>
            
            <div class="form-group">
                <label for="communication_level">Communication Clarity (1-10)</label>
                <input type="number" id="communication_level" name="communication_level" 
                       value="<?php echo htmlspecialchars($row['communication_level']); ?>" 
                       required min="1" max="10">
            </div>
            
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block">Update Evaluation</button>
                <a href="student_options.php" class="btn btn-secondary btn-block" style="margin-top: 0.5rem; text-decoration: none;">Cancel</a>
            </div>
        </form>
    </div>

    <?php
} catch (PDOException $e) {
    echo '<div class="container"><div class="message message-error">Database error: ' . htmlspecialchars($e->getMessage()) . '</div></div>';
}

include 'includes/footer.php';
?>
