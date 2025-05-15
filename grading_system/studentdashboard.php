<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard</title>
</head>

<?php include 'navigationbar.php'; ?>

<?php include 'studentdashboardprocess.php'; ?>

<body>

    <div class="dashboard">
        <h1>DASHBOARD</h1>
        <h2><?php echo htmlspecialchars($user_first_name . ' ' . $user_last_name); ?></h2> <!--first and last name-->

        <div class="courses">

            <?php if (empty($courses)): ?>
                <p>You are not enrolled on any courses yet</p>

            <?php else: ?>
                <?php foreach ($courses as $course): ?>

                    <div class="course-card">
                        <img src="<?= htmlspecialchars($course['course_image'] ?? 'https://via.placeholder.com/200x120') ?>" alt="Course Image">
                        <h3><?php echo htmlspecialchars($course['course_name']); ?></h3>
                        <p><?php echo htmlspecialchars($course['course_description']); ?></p>

                        <!--display grade if one has been given-->
                        <div class="grade-info">
                            <?php if (!empty($course['grade'])): ?>
                                <p><strong>Grade:</strong> <?php echo htmlspecialchars($course['grade']); ?></p>
                            <?php else: ?>
                                <p><strong>Grade:</strong> N/A</p>
                            <?php endif; ?>
                        </div>

                    </div>
                <?php endforeach; ?>

            <?php endif; ?>

        </div>

    </div>

</body>
</html>