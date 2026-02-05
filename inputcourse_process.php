<?php
session_start();
$page_title = "Course Added | Course Evaluation System";
include 'config/config.php';
include 'includes/header.php';

// Get form data
$course_id = $_POST['course_id'] ?? '';
$course_name = $_POST['course_name'] ?? '';
$credits = $_POST['credits'] ?? '';
$mode = $_POST['mode'] ?? '';

try {
    // Insert data into course table
    $sql_course = "INSERT INTO course (course_id, course_name, credits, mode) 
                   VALUES (:course_id, :course_name, :credits, :mode)";
    $stmt_course = $conn->prepare($sql_course);

    $stmt_course->bindParam(':course_id', $course_id);
    $stmt_course->bindParam(':course_name', $course_name);
    $stmt_course->bindParam(':credits', $credits);
    $stmt_course->bindParam(':mode', $mode);

    if ($stmt_course->execute()) {
        ?>
        <div class="container">
            <div class="message message-success">
                <h2>Course Successfully Added</h2>
                <p>The course has been registered in the evaluation system. You may now proceed with the evaluation.</p>
            </div>

            <div class="card">
                <h2>Registered Courses</h2>
                <?php
                $stmt = $conn->query("SELECT course_id, course_name, credits, mode FROM course ORDER BY course_id");
                $stmt->setFetchMode(PDO::FETCH_ASSOC);
                ?>
                <table>
                    <thead>
                        <tr>
                            <th>Course ID</th>
                            <th>Course Name</th>
                            <th>Credits</th>
                            <th>Delivery Mode</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = $stmt->fetch()): ?>
                        <tr>
                            <td><strong><?php echo htmlspecialchars($row['course_id']); ?></strong></td>
                            <td><?php echo htmlspecialchars($row['course_name']); ?></td>
                            <td><?php echo htmlspecialchars($row['credits']); ?></td>
                            <td><?php echo htmlspecialchars($row['mode']); ?></td>
                        </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>

                <div class="action-links">
                    <a href="course_eval.php" class="btn btn-primary">Proceed to Evaluation</a>
                    <a href="inputcourse.php" class="btn btn-secondary">Add Another Course</a>
                </div>
            </div>
        </div>
        <?php
    } else {
        echo '<div class="container"><div class="message message-error">Error adding course. Please try again.</div></div>';
    }

    $conn = null;
} catch (PDOException $e) {
    echo '<div class="container"><div class="message message-error">Database error: ' . htmlspecialchars($e->getMessage()) . '</div></div>';
}

include 'includes/footer.php';
?>
