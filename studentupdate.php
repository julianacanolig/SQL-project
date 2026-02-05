<?php
session_start();
$page_title = "Evaluation Updated | Course Evaluation System";
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
    $query = "UPDATE course_evaluation 
              SET course_difficulty = :course_difficulty, 
                  course_rating = :course_rating, 
                  instructor_rating = :instructor_rating, 
                  feedback = :feedback, 
                  engagement_level = :engagement_level, 
                  communication_level = :communication_level 
              WHERE evaluation_id = :evaluation_id";
    
    $data = array(
        'course_difficulty' => $course_difficulty,
        'course_rating' => $course_rating,
        'instructor_rating' => $instructor_rating,
        'feedback' => $feedback,
        'engagement_level' => $engagement_level,
        'communication_level' => $communication_level,
        'evaluation_id' => $evaluation_id
    );
    
    $stmt = $conn->prepare($query);

    if ($stmt->execute($data)) {
        ?>
        <div class="container">
            <div class="message message-success">
                <h2>Evaluation Successfully Updated</h2>
                <p>Your changes have been saved. The updated evaluation is now recorded in the system.</p>
            </div>

            <div class="card">
                <h2>Updated Evaluation Summary</h2>
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
                    <a href="student_options.php" class="btn btn-primary">Return to Student Portal</a>
                    <a href="studentselect_to_update.php" class="btn btn-secondary">Update Another Evaluation</a>
                </div>
            </div>
        </div>
        <?php
    } else {
        echo '<div class="container"><div class="message message-error">Update failed. Please try again.</div></div>';
    }

    $conn = null;
} catch (PDOException $e) {
    echo '<div class="container"><div class="message message-error">Database error: ' . htmlspecialchars($e->getMessage()) . '</div></div>';
}

include 'includes/footer.php';
?>
