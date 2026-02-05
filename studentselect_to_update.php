<?php
session_start();
$page_title = "Update Evaluation | Course Evaluation System";
include 'config/config.php';
include 'includes/header.php';
?>

<header class="header">
    <h1>Update Evaluation</h1>
    <p>Modify an existing course evaluation</p>
</header>

<div class="container">
    <div class="card">
        <h2>Existing Evaluations</h2>
        <?php
        try {
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
            <?php
        } catch (PDOException $e) {
            echo '<div class="message message-error">Error loading evaluations: ' . htmlspecialchars($e->getMessage()) . '</div>';
        }
        ?>
    </div>

    <div class="card">
        <h2>Select Evaluation to Update</h2>
        <form action="studentfill_to_update.php" method="post">
            <div class="form-group">
                <label for="evaluation_id">Evaluation ID</label>
                <input type="text" id="evaluation_id" name="evaluation_id" required placeholder="Enter evaluation ID (e.g., EVAL001)">
                <span class="form-help">Select from the evaluations listed above</span>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Retrieve Evaluation</button>
                <a href="student_options.php" class="btn btn-secondary" style="text-decoration: none;">Cancel</a>
            </div>
        </form>
    </div>
</div>

<?php include 'includes/footer.php'; ?>
