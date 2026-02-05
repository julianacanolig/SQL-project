<?php
session_start();
$page_title = "Evaluation Submitted | Course Evaluation System";
include 'config/config.php';
include 'includes/header.php';

// Get form data
$evaluation_id = $_POST['evaluation_id'] ?? '';
$course_difficulty = $_POST['course_difficulty'] ?? '';
$course_rating = $_POST['course_rating'] ?? '';
$instructor_rating = $_POST['instructor_rating'] ?? '';
$feedback = $_POST['feedback'] ?? '';
$engagement_level = $_POST['engagement_level'] ?? '';
$communication_level = $_POST['communication_level'] ?? '';

try {
    $sql = "INSERT INTO course_evaluation 
            (evaluation_id, course_difficulty, course_rating, instructor_rating, 
             feedback, engagement_level, communication_level) 
            VALUES (:evaluation_id, :course_difficulty, :course_rating, :instructor_rating, 
                    :feedback, :engagement_level, :communication_level)";
    $stmt = $conn->prepare($sql);

    $stmt->bindParam(':evaluation_id', $evaluation_id);
    $stmt->bindParam(':course_difficulty', $course_difficulty);
    $stmt->bindParam(':course_rating', $course_rating);
    $stmt->bindParam(':instructor_rating', $instructor_rating);
    $stmt->bindParam(':feedback', $feedback);
    $stmt->bindParam(':engagement_level', $engagement_level);
    $stmt->bindParam(':communication_level', $communication_level);

    if ($stmt->execute()) {
        ?>
        <div class="container">
            <div class="message message-success">
                <h2>Evaluation Successfully Submitted</h2>
                <p>Thank you for your participation. Your feedback has been recorded and will contribute to ongoing quality improvement efforts.</p>
            </div>

            <div class="card">
                <h2>Evaluation Summary</h2>
                <?php
                $stmt = $conn->query("SELECT evaluation_id, course_difficulty, course_rating, 
                                      instructor_rating, engagement_level, communication_level 
                                      FROM course_evaluation ORDER BY evaluation_id");
                $stmt->setFetchMode(PDO::FETCH_ASSOC);
                ?>
                <table>
                    <thead>
                        <tr>
                            <th>Evaluation ID</th>
                            <th>Difficulty</th>
                            <th>Course Quality</th>
                            <th>Instructor</th>
                            <th>Engagement</th>
                            <th>Communication</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = $stmt->fetch()): ?>
                        <tr>
                            <td><strong><?php echo htmlspecialchars($row['evaluation_id']); ?></strong></td>
                            <td><?php echo htmlspecialchars($row['course_difficulty']); ?>/10</td>
                            <td><?php echo htmlspecialchars($row['course_rating']); ?>/10</td>
                            <td><?php echo htmlspecialchars($row['instructor_rating']); ?>/10</td>
                            <td><?php echo htmlspecialchars($row['engagement_level']); ?>/10</td>
                            <td><?php echo htmlspecialchars($row['communication_level']); ?>/10</td>
                        </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>

                <div class="action-links">
                    <a href="finish.php" class="btn btn-success">Complete</a>
                    <a href="inputcourse.php" class="btn btn-secondary">Submit Another Evaluation</a>
                </div>
            </div>
        </div>
        <?php
    } else {
        echo '<div class="container"><div class="message message-error">Error submitting evaluation. Please try again.</div></div>';
    }

    $conn = null;
} catch (PDOException $e) {
    echo '<div class="container"><div class="message message-error">Database error: ' . htmlspecialchars($e->getMessage()) . '</div></div>';
}

include 'includes/footer.php';
?>
