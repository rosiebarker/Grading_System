<?php
include 'database/connection.php'; 

//create empty course array
$course = [];

try {
    //fetch all the course details as well as the teacher info attached to that course
    $sql = "SELECT course_id, course_name, course_description, course_image, teacher.teacher_fname, teacher.teacher_lname
            FROM course
            INNER JOIN teacher ON course.teacher_id = teacher.teacher_id";

    // execute the query above and fetch the results
    $stmt = $conn->query($sql);
    $course = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {

    echo "sorry an error occured " . $e->getMessage();
    exit;

}
?>