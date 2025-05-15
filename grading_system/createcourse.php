<?php
include 'database/connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $course_name = $_POST['course_name'];
    $course_description = $_POST['course_description'];
    $teacher_id = $_POST['teacher_id'];
    $imagePath = null;

    //image upload
    if (isset($_FILES['course_image']) && $_FILES['course_image']['error'] === UPLOAD_ERR_OK) {
        $imageTmpPath = $_FILES['course_image']['tmp_name'];
        $imageName = basename($_FILES['course_image']['name']);
        $uploadDir = 'uploads/';
        $targetFilePath = $uploadDir . time() . '_' . $imageName;

        // move the uploaded file to uploads
        if (move_uploaded_file($imageTmpPath, $targetFilePath)) {
            $imagePath = $targetFilePath; 
        } else {
            echo "there was an error uploading the file";
            exit;
        }
    }

    //insert course info in database
    try {
        $stmt = $conn->prepare("INSERT INTO course (course_name, course_description, teacher_id, course_image)
                                VALUES (:course_name, :course_description, :teacher_id, :course_image)");
        $stmt->execute([
            ':course_name' => $course_name,
            ':course_description' => $course_description,
            ':teacher_id' => $teacher_id,
            ':course_image' => $imagePath
        ]);

        header("Location: createcoursesuccess.php?success=course_added");
        exit();

    } catch (PDOException $e) {
        echo "there was an error" . $e->getMessage();
    }
}
?>