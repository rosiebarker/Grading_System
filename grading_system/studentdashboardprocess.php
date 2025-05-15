<?php
include 'database/connection.php'; 


$account_id = $_SESSION['account_id'];
$user_first_name = '';
$user_last_name = '';
$courses = [];

try {
    // get the students details
    $stmt = $conn->prepare("SELECT student_fname, student_lname FROM student WHERE student_id = :account_id");
    $stmt->execute(['account_id' => $account_id]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        $user_first_name = $user['student_fname'];
        $user_last_name = $user['student_lname'];
    }

    //get the courses the student is enrolled on along with their grades for it if they have any
    $stmt = $conn->prepare("
        SELECT course.course_id, course.course_name, course.course_description, course.course_image, grade.grade
        FROM course
        JOIN enrollment ON course.course_id = enrollment.course_id
        LEFT JOIN grade ON grade.course_id = course.course_id AND grade.student_id = :account_id1
        WHERE enrollment.student_id = :account_id2
    ");

    $stmt->bindValue(':account_id1', $account_id);
    $stmt->bindValue(':account_id2', $account_id);
    $stmt->execute();
    $courses = $stmt->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
    exit;
}
?>