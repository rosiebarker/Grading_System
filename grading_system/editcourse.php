<!DOCTYPE html>
<html>
<head>
    <title>Edit Course</title>
    <link rel="stylesheet" href="css/admin.css"/>
</head>

<?php include 'navigationbar.php'; ?>
<?php include 'editcourseprocess.php'; ?>



<body>
<div class="dashboard" style="max-width: 800px; margin: 0 auto; text-align: center;">
    <h1>Edit: <?= htmlspecialchars($course['course_name']) ?></h1>

    <!-- update course-->
     
    <div class="form-container">
        <form action="updatecourse.php" method="POST">
            <input type="hidden" name="course_id" value="<?= htmlspecialchars($course['course_id']) ?>">
            <input type="text" name="course_name" value="<?= htmlspecialchars($course['course_name']) ?>" required class="input-standard">
            <textarea name="course_description" required class="input-standard" rows="3"><?= htmlspecialchars($course['course_description']) ?></textarea>
            
            <!--dropdown to slect the teacher-->

            <select name="teacher_id" required class="input-standard">
                <option value="">Select a Teacher</option>
                <?php foreach ($teachers as $teacher): ?>
                    <option value="<?= $teacher['teacher_id'] ?>"
                        <?= $teacher['teacher_id'] == $course['teacher_id'] ? 'selected' : '' ?>>
                        <?= htmlspecialchars($teacher['teacher_fname'] . ' ' . $teacher['teacher_lname']) ?>
                    </option>
                <?php endforeach; ?>
            </select>

            <button type="submit" class="bttn-standard">Update Course</button>
        </form>
    </div>

    <hr>

    <!--enroll students-->

    <div class="form-container">
        <h2>Enroll Student</h2>

        <form action="enrollstudent.php" method="POST">
            <input type="hidden" name="course_id" value="<?= htmlspecialchars($course['course_id']) ?>">

            <select name="student_id" required class="input-standard">
                <option value="">Select Student</option>
                <?php foreach ($students as $student): ?>
                    <option value="<?= $student['student_id'] ?>">
                        <?= htmlspecialchars($student['student_fname'] . ' ' . $student['student_lname']) ?>
                    </option>
                <?php endforeach; ?>
            </select>

            <button type="submit" class="bttn-standard">Enroll</button>

        </form>
    </div>

    <!--students who have enrolled onto the course list-->

    <div class="form-container">
        <h3>Enrolled Students</h3>

        <ul style="list-style: none; padding: 0;">
            <?php if (empty($enrolled_students)): ?>
                <li>No students are enrolled on this course</li>
            <?php else: ?>
                <?php foreach ($enrolled_students as $student): ?>
                    <li style="margin: 10px 0; display: flex; justify-content: space-between; align-items: center;">
                        <span><?= htmlspecialchars($student['student_fname'] . ' ' . $student['student_lname']) ?></span>
                        <form action="unenrollstudent.php" method="POST" style="margin: 0;">
                            <input type="hidden" name="course_id" value="<?= htmlspecialchars($course_id) ?>">
                            <input type="hidden" name="student_id" value="<?= htmlspecialchars($student['student_id']) ?>">
                            <button type="submit" class="bttn-standard" style="width: auto; padding: 5px 10px;" onclick="return confirm('Are you sure?')">Remove</button>
                        </form>
                    </li>
                <?php endforeach; ?>
            <?php endif; ?>
        </ul>
    </div>

</div>
</body>
</html>