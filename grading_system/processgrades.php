<?php
session_start(); 

include 'database/connection.php';

$teacher_id = $_SESSION['account_id'];
$student_id = $_POST['student_id'] ?? null;
$course_id = $_POST['course_id'] ?? null;
$grade = trim($_POST['grade'] ?? '');

if ($student_id && $course_id && $grade !== '') {
    try {
        //check if the student already has a grade for the course in the database
        $stmt = $conn->prepare("SELECT grade_id FROM grade WHERE student_id = :student_id AND course_id = :course_id");
        $stmt->execute([
            'student_id' => $student_id,
            'course_id' => $course_id
        ]);
        $existing = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($existing) {
            //then update the grade
            $stmt = $conn->prepare("
                UPDATE grade 
                SET grade = :grade, teacher_id = :teacher_id 
                WHERE grade_id = :grade_id
            ");
            $stmt->execute([
                'grade' => $grade,
                'teacher_id' => $teacher_id,
                'grade_id' => $existing['grade_id']
            ]);
        } else {
            //or insert new grade
            $stmt = $conn->prepare("
                INSERT INTO grade (teacher_id, student_id, course_id, grade) 
                VALUES (:teacher_id, :student_id, :course_id, :grade)
            ");
            $stmt->execute([
                'teacher_id' => $teacher_id,
                'student_id' => $student_id,
                'course_id' => $course_id,
                'grade' => $grade
            ]);
        }

        //redirect the user back to the page
        header("Location: assigngrade.php?course_id=" . $course_id);
        exit();
    } catch (PDOException $e) {
        echo "looks like an error occured" . $e->getMessage();
    }
} else {
    echo "looks like an error occured";
}
?>