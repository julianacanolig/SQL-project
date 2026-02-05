<?php
session_start();
$page_title = "Evaluation Report | Course Evaluation System";
include 'config/config.php';
include 'includes/header.php';

function getRatingDescription($rating, $type) {
    $num = (int)$rating;
    if ($type === 'difficulty') {
        return $num <= 3 ? 'Easy' : ($num <= 6 ? 'Moderate' : 'Challenging');
    }
    if ($type === 'engagement') {
        return $num <= 4 ? 'Low' : ($num <= 7 ? 'Moderate' : 'High');
    }
    return $num <= 4 ? 'Needs Improvement' : ($num <= 7 ? 'Good' : 'Excellent');
}

function getRatingBadgeClass($rating) {
    $num = (int)$rating;
    if ($num <= 4) return 'rating-needs-improvement';
    if ($num <= 7) return 'rating-good';
    return 'rating-excellent';
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['evaluation_id'])) {
    $evaluation_id = $_POST['evaluation_id'];

    try {
        $query = "SELECT course_difficulty, course_rating, instructor_rating, 
                  feedback, engagement_level, communication_level 
                  FROM course_evaluation WHERE evaluation_id = :evaluation_id";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':evaluation_id', $evaluation_id, PDO::PARAM_STR);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row) {
            ?>
            <header class="header">
                <h1>Evaluation Report</h1>
                <p>Evaluation ID: <?php echo htmlspecialchars($evaluation_id); ?></p>
            </header>

            <div class="container-small">
                <div class="evaluation-container">
                    <h2>Detailed Assessment Report</h2>
                    
                    <div class="detail-row">
                        <div class="detail-label">Course Difficulty:</div>
                        <div class="detail-value">
                            <?php echo htmlspecialchars($row['course_difficulty']); ?>/10
                            <span class="rating-badge <?php echo getRatingBadgeClass($row['course_difficulty']); ?>">
                                <?php echo getRatingDescription($row['course_difficulty'], 'difficulty'); ?>
                            </span>
                        </div>
                    </div>

                    <div class="detail-row">
                        <div class="detail-label">Overall Course Quality:</div>
                        <div class="detail-value">
                            <?php echo htmlspecialchars($row['course_rating']); ?>/10
                            <span class="rating-badge <?php echo getRatingBadgeClass($row['course_rating']); ?>">
                                <?php echo getRatingDescription($row['course_rating'], 'rating'); ?>
                            </span>
                        </div>
                    </div>

                    <div class="detail-row">
                        <div class="detail-label">Instructor Effectiveness:</div>
                        <div class="detail-value">
                            <?php echo htmlspecialchars($row['instructor_rating']); ?>/10
                            <span class="rating-badge <?php echo getRatingBadgeClass($row['instructor_rating']); ?>">
                                <?php echo getRatingDescription($row['instructor_rating'], 'rating'); ?>
                            </span>
                        </div>
                    </div>

                    <div class="detail-row">
                        <div class="detail-label">Student Engagement:</div>
                        <div class="detail-value">
                            <?php echo htmlspecialchars($row['engagement_level']); ?>/10
                            <span class="rating-badge <?php echo getRatingBadgeClass($row['engagement_level']); ?>">
                                <?php echo getRatingDescription($row['engagement_level'], 'engagement'); ?>
                            </span>
                        </div>
                    </div>

                    <div class="detail-row">
                        <div class="detail-label">Communication Clarity:</div>
                        <div class="detail-value">
                            <?php echo htmlspecialchars($row['communication_level']); ?>/10
                            <span class="rating-badge <?php echo getRatingBadgeClass($row['communication_level']); ?>">
                                <?php echo getRatingDescription($row['communication_level'], 'rating'); ?>
                            </span>
                        </div>
                    </div>

                    <div class="detail-row" style="border-bottom: none;">
                        <div class="detail-label">Student Comments:</div>
                        <div class="detail-value">
                            <div class="feedback-box">
                                <?php echo nl2br(htmlspecialchars($row['feedback'])); ?>
                            </div>
                        </div>
                    </div>

                    <div class="action-links">
                        <a href="save_evaluation.php?evaluation_id=<?php echo urlencode($evaluation_id); ?>" class="btn btn-success">
                            Export Report
                        </a>
                        <a href="delete_evaluation.php?evaluation_id=<?php echo urlencode($evaluation_id); ?>" 
                           class="btn btn-primary"
                           onclick="return confirm('Are you sure you want to archive this evaluation? This action can be reversed from the archive management page.');">
                            Archive Evaluation
                        </a>
                        <a href="instructorselect_to_retrieve.php" class="btn btn-secondary">
                            Review Another
                        </a>
                    </div>
                </div>
            </div>
            <?php
        } else {
            echo '<div class="container"><div class="message message-error">Evaluation not found.</div></div>';
        }
    } catch (PDOException $e) {
        echo '<div class="container"><div class="message message-error">Database error: ' . htmlspecialchars($e->getMessage()) . '</div></div>';
    }
} else {
    echo '<div class="container"><div class="message message-error">Invalid request.</div></div>';
}

include 'includes/footer.php';
?>
