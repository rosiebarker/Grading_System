<?php
include 'database/connection.php';

//check account type is teacher if not redirect back to login
if (!isset($_SESSION['account_id']) || $_SESSION['account_type'] !== 'Teacher') {
    header('Location: login.php');
    exit();
}

$account_id = $_SESSION['account_id'];
$user_first_name = '';
$user_last_name = '';
$courses = [];

try {
    //get teacher info
    $stmt = $conn->prepare("SELECT teacher_fname, teacher_lname FROM teacher WHERE teacher_id = :account_id");
    $stmt->execute(['account_id' => $account_id]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        $user_first_name = $user['teacher_fname'];
        $user_last_name = $user['teacher_lname'];
    }

    //fetch the courses the teacher is teaching with all its fields
    $stmt = $conn->prepare("
        SELECT course_id, course_name, course_description, course_image
        FROM course 
        WHERE teacher_id = :account_id
    ");
    $stmt->execute(['account_id' => $account_id]);
    $courses = $stmt->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    echo "error" . $e->getMessage();
    exit;
}
?>