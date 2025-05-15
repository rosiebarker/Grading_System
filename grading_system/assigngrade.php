<?php
include 'database/connection.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Assign Grades</title>
    <link rel="stylesheet" href="css/style.css">
</head>


<body>

<?php include 'navigationbar.php'; ?>
<?php include 'assigngradeprocess.php'; ?>

<div class="form-container">
    <h2>Assign Grades for <?= htmlspecialchars($course_name) ?></h2>
    <?php foreach ($students as $student): ?>

    <form action="processgrades.php" method="POST" 

          style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 15px;">
          
        <div style="flex-grow: 1;">
            <strong><?= htmlspecialchars($student['student_fname'] . ' ' . $student['student_lname']) ?></strong><br>
            <?php if (!empty($student['grade'])): ?>
                <small>Grade: <strong><?= htmlspecialchars($student['grade']) ?></strong></small>
            <?php else: ?>
                <small>N/A</small>
            <?php endif; ?>
            <input type="hidden" name="student_id" value="<?= htmlspecialchars($student['student_id']) ?>">
            <input type="hidden" name="course_id" value="<?= htmlspecialchars($course_id) ?>">
        </div>

        <input type="text" name="grade" value="<?= htmlspecialchars($student['grade'] ?? '') ?>" 
               placeholder="Enter grade" class="input-standard" required 
               style="width: 80px; margin-right: 10px;">

        <button type="submit" class="bttn-standard" style="white-space: nowrap;">Submit Grade</button>

    </form>

<?php endforeach; ?>
</div>
</body>
</html>