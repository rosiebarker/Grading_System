<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="css/admin.css"/>
</head>

<?php include 'database/connection.php'; ?>
<?php include 'navigationbar.php'; ?>

<body>
    <div class="dashboard" style="max-width: 1200px; margin: 0 auto; text-align: center;">

        <h1>ADMIN DASHBOARD</h1>

        <!--Grid for all of the forms course/student/teacher-->

        <div class="form-grid" style="display: flex; justify-content: center; gap: 30px; flex-wrap: wrap; margin-bottom: 40px;">
            
            <!-- COURSES -->

            <!--fetch all teachers for dropdown-->
            <?php $teachers = [];
            try {
                $stmt = $conn->query("SELECT teacher_id, teacher_fname, teacher_lname FROM teacher");
                $teachers = $stmt->fetchAll(PDO::FETCH_ASSOC);
            } catch (PDOException $e) {
                echo "Error fetching teachers: " . $e->getMessage();
            }
            ?>

            <div class="form-container">
                <h2>Add New Course</h2>
                <form action="createcourse.php" method="POST" enctype="multipart/form-data">
                    <input type="text" name="course_name" placeholder="Course Name" required>
                    <textarea name="course_description" placeholder="Course Description" rows="3" required></textarea>
                    <input type="file" name="course_image" accept="image/*">
                    
                    <!--teachers dropdown-->

                    <select name="teacher_id" required class="input-standard">
                        <option value="">Select a Teacher</option>
                        <?php foreach ($teachers as $teacher): ?>
                            <option value="<?= htmlspecialchars($teacher['teacher_id']) ?>">
                                <?= htmlspecialchars($teacher['teacher_fname'] . ' ' . $teacher['teacher_lname']) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>

                    <button type="submit" style="width: 250px; margin: 10px auto; display: block;">Create Course</button>
                </form>
            </div>

            <!--STUDENT-->

            <div class="form-container">
                <h2>Add New Student</h2>
                <form action="createuser.php" method="POST">
                    <input type="text" name="student_fname" placeholder="First Name" required>
                    <input type="text" name="student_lname" placeholder="Last Name" required>
                    <input type="email" name="student_email" placeholder="Email" required>
                    <input type="password" name="student_password" placeholder="Password" required>
                    <input type="hidden" name="account_id" value="3">
                    <button type="submit">Add Student</button>
                </form>
            </div>

            <!--TEACHER-->

            <div class="form-container">
                <h2>Add New Teacher</h2>
                <form action="createuser.php" method="POST">
                    <input type="text" name="teacher_fname" placeholder="First Name" required>
                    <input type="text" name="teacher_lname" placeholder="Last Name" required>
                    <input type="email" name="teacher_email" placeholder="Email" required>
                    <input type="password" name="teacher_password" placeholder="Password" required>
                    <input type="hidden" name="account_id" value="2">
                    <button type="submit">Add Teacher</button>
                </form>
            </div>
            
        </div>

        <!-- RESET PASSWORDS -->

        <div class="pass-reset-container">
            <h2>Reset User Password</h2>
            <form action="resetpassword.php" method="GET">
                <div class="pass-reset-container pass-dropdown-container">
                    <label for="user">Select A User</label>
                    <select name="id" id="user" required>

                        <optgroup label="Students">
                            <?php
                            $students = $conn->query("SELECT student_id, student_fname, student_lname FROM student")->fetchAll(PDO::FETCH_ASSOC);
                            foreach ($students as $student):
                                $name = htmlspecialchars($student['student_fname'] . ' ' . $student['student_lname']);
                                echo "<option value=\"{$student['student_id']}\" data-type=\"student\">Student: $name</option>";
                            endforeach;
                            ?>
                        </optgroup>

                        <optgroup label="Teachers">
                            <?php
                            $teachers = $conn->query("SELECT teacher_id, teacher_fname, teacher_lname FROM teacher")->fetchAll(PDO::FETCH_ASSOC);
                            foreach ($teachers as $teacher):
                                $name = htmlspecialchars($teacher['teacher_fname'] . ' ' . $teacher['teacher_lname']);
                                echo "<option value=\"{$teacher['teacher_id']}\" data-type=\"teacher\">Teacher: $name</option>";
                            endforeach;
                            ?>
                        </optgroup>
                    </select>
                </div>

                <input type="hidden" name="account_type" id="account_type" value="">

                <div class="pass-dropdown-group">
                    <button type="submit">Reset User Password</button>
                </div>
                
            </form>
        </div>
    
    </div>

    <script>
        //set account type based on the option that is selected teacher or student account
        document.getElementById('user').addEventListener('change', function () {
            const selected = this.options[this.selectedIndex];
            document.getElementById('account_type').value = selected.dataset.type;
        });
        document.getElementById('user').dispatchEvent(new Event('change'));
    </script>


        <!--list of courses-->

        <?php include 'admindashboardprocess.php'; ?> <!--grab the process-->

        <div class="course">
            <?php foreach ($course as $row) { ?>
                <div class="course-card">
                    <img src="<?= htmlspecialchars($row['course_image'] ?? 'https://via.placeholder.com/200x120') ?>">

                    <h3><?= htmlspecialchars($row['course_name']) ?></h3>

                    <p><?= isset($row['course_description']) ? htmlspecialchars($row['course_description']) : 'No course description' ?></p>

                    <p><strong>Teacher:</strong> <?= htmlspecialchars($row['teacher_fname']) . ' ' . htmlspecialchars($row['teacher_lname']) ?></p>
                    
                    <a href="editcourse.php?course_id=<?= htmlspecialchars($row['course_id']) ?>" class="bttn-standard">Edit Course</a>
                </div>
            <?php } ?>
        </div>

    </div>
</body>
</html>