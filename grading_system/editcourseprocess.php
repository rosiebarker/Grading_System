<?php
include 'database/connection.php';

if (!isset($_GET['course_id'])) {
    header('Location: admindashboard.php');
    exit;
}

// Empty arrays
$course_id = $_GET['course_id'];
$course = [];
$students = [];
$enrolled_students = [];
$teachers = [];

try {
    // fetch the course
    $stmt = $conn->prepare("SELECT * FROM course WHERE course_id = :course_id");
    $stmt->execute(['course_id' => $course_id]);
    $course = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$course) {
        header('Location: admindashboard.php');
        exit;
    }

    // fetch all students
    $stmt = $conn->query("SELECT student_id, student_fname, student_lname FROM student");
    $students = $stmt->fetchAll(PDO::FETCH_ASSOC);

    //fetch all the enrolled students
    $stmt = $conn->prepare("
        SELECT student.student_id, student.student_fname, student.student_lname
        FROM enrollment
        INNER JOIN student ON enrollment.student_id = student.student_id
        WHERE enrollment.course_id = :course_id
    ");
    $stmt->execute(['course_id' => $course_id]);
    $enrolled_students = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Get all teachers for the dropdown
    $stmt = $conn->query("SELECT teacher_id, teacher_fname, teacher_lname FROM teacher");
    $teachers = $stmt->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    echo "an error occured" . $e->getMessage();
    exit;
}
?>