<?php
session_start();
$page_title = "Archive Evaluation | Course Evaluation System";
include 'config/config.php';
include 'includes/header.php';

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['evaluation_id'])) {
    $evaluation_id = $_GET['evaluation_id'];

    try {
        $query = "DELETE FROM course_evaluation WHERE evaluation_id = :evaluation_id";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':evaluation_id', $evaluation_id);

        if ($stmt->execute()) {
            ?>
            <div class="container">
                <div class="message message-success">
                    <h2>Evaluation Successfully Archived</h2>
                    <p>The evaluation report has been archived and removed from active records.</p>
                </div>
                <div class="card text-center">
                    <div class="action-links" style="justify-content: center;">
                        <a href="instructorselect_to_retrieve.php" class="btn btn-primary">Review Another Evaluation</a>
                        <a href="instructor_options.php" class="btn btn-secondary">Return to Instructor Portal</a>
                    </div>
                </div>
            </div>
            <?php
        } else {
            echo '<div class="container"><div class="message message-error">Error archiving evaluation report.</div></div>';
        }
    } catch (PDOException $e) {
        echo '<div class="container"><div class="message message-error">Database error: ' . htmlspecialchars($e->getMessage()) . '</div></div>';
    }
} else {
    echo '<div class="container"><div class="message message-error">Invalid request.</div></div>';
}

include 'includes/footer.php';
?>
