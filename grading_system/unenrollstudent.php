<?php
include 'database/connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $course_id = $_POST['course_id'];
    $student_id = $_POST['student_id'];

    //delete student from course
    try {
        $stmt = $conn->prepare("DELETE FROM enrollment WHERE course_id = :course_id AND student_id = :student_id");
        $stmt->execute([
            'course_id' => $course_id,
            'student_id' => $student_id
        ]);

        header("Location: editcourse.php?course_id=$course_id");
        exit;
    } catch (PDOException $e) {
        echo "error removing the student from course" . $e->getMessage();
        exit;
    }
}
?>