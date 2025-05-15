<?php
include 'database/connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $course_id = $_POST['course_id'];
    $student_id = $_POST['student_id'];

    try {
        
        //if a student is already entolled prevent duplicates
        $stmt = $conn->prepare("SELECT COUNT(*) FROM enrollment WHERE course_id = :course_id AND student_id = :student_id");
        $stmt->execute(['course_id' => $course_id, 'student_id' => $student_id]);
        if ($stmt->fetchColumn() == 0) {

            //then enroll the student
            $stmt = $conn->prepare("INSERT INTO enrollment (course_id, student_id) VALUES (:course_id, :student_id)");
            $stmt->execute(['course_id' => $course_id, 'student_id' => $student_id]);

        }

        header("Location: editcourse.php?course_id=$course_id");
        exit;

    } catch (PDOException $e) {
        echo "whoops and error occured enrolling student" . $e->getMessage();
        exit;
    }
}
?>