<?php
include 'database/connection.php';

if (!isset($_SESSION['account_id']) || $_SESSION['account_type'] !== 'Teacher') {
    header('Location: login.php');
    exit();
}

$course_id = $_GET['course_id'] ?? null;
$students = []; 

//get the course name and display in url 
$course_name = '';
if ($course_id) {
    $stmt = $conn->prepare("SELECT course_name FROM course WHERE course_id = :course_id");
    $stmt->execute(['course_id' => $course_id]);
    $course = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($course) {
        $course_name = $course['course_name'];
    } else {
        echo "course cannt be found";
        exit();
    }
}

//security, check if the teacher actually teaches the courese
$stmt = $conn->prepare("SELECT * FROM course WHERE course_id = :course_id AND teacher_id = :teacher_id");
$stmt->execute([
    'course_id' => $course_id,
    'teacher_id' => $_SESSION['account_id']
]);
if (!$stmt->fetch()) {
    echo "you do not have autorisation";
    exit();
}

//fetch all the enrolled students who are on the course
if ($course_id) {
    $stmt = $conn->prepare("
        SELECT student.student_id, student.student_fname, student.student_lname, grade.grade
        FROM enrollment
        JOIN student ON enrollment.student_id = student.student_id
        LEFT JOIN grade ON grade.student_id = student.student_id AND grade.course_id = :grade_course_id
        WHERE enrollment.course_id = :enroll_course_id
    ");
    $stmt->execute([
        'grade_course_id' => $course_id,
        'enroll_course_id' => $course_id
    ]);
    $students = $stmt->fetchAll(PDO::FETCH_ASSOC);
} else {
    echo "this course id doesnt exist";
    exit();
}
?>