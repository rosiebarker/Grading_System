<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grading System</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/admin.css">
</head>

<?php include 'navigationbar.php'; ?>
<?php include 'indexprocess.php'; ?>

<!-- ADMIN LOGIN ADMIN@HOTMAIL.COM PASSWORD: Password123-->
<!-- TEACHER LOGIN JOEGRANT@HOTMAIL.COM PASSWORD: Password123-->
<!-- STUDENT LOGIN JAMESCAMPBELL@HOTMAIL.COM PASSWORD: Password123-->

<body>

    <div class="dashboard">
        <h1>DASHBOARD</h1>
        <h2><?php echo htmlspecialchars($user_first_name . ' ' . $user_last_name); ?></h2> <!--display first and last name of user-->

        <div class="courses">

            <?php if (empty($courses)): ?>
                <p>No courses found.</p>
            <?php else: ?>

                <?php foreach ($courses as $course): ?>
                    
                    <div class="course-card">
                            <img src="<?= htmlspecialchars($course['course_image'] ?? 'https://via.placeholder.com/200x120') ?>" alt="Course Image">
                            <h3><?php echo htmlspecialchars($course['course_name']); ?></h3>
                            <p><?php echo htmlspecialchars($course['course_description']); ?></p>
                        
                            <!--assign grades to the course -->
                        <a href="assigngrade.php?course_id=<?php echo $course['course_id']; ?>" class="bttn-standard" class="bttn-standard">
                            Assign Grades
                        </a>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>

        </div>
    </div>

</body>
</html>