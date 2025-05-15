<?php
include 'database/connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $course_id = $_POST['course_id'];
    $course_name = $_POST['course_name'];
    $course_description = $_POST['course_description'];
    $teacher_id = $_POST['teacher_id'];

    try {
        //sql statement to update the course details
        $sql = "UPDATE course SET course_name = :course_name, course_description = :course_description, teacher_id = :teacher_id WHERE course_id = :course_id";
        $stmt = $conn->prepare($sql);

        //execute the statement above
        $stmt->execute([
            'course_name' => $course_name,
            'course_description' => $course_description,
            'teacher_id' => $teacher_id,
            'course_id' => $course_id
        ]);

        
        header('Location: admindashboard.php');
        exit;
    } catch (PDOException $e) {
        echo "there was an error updating the course" . $e->getMessage();
        exit;
    }
}
?>