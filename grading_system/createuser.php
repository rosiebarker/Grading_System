<?php
include 'database/connection.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $account_id = $_POST['account_id']; 

    try {
        if ($account_id == 2) {
            //teachers account
            $teacher_fname = $_POST['teacher_fname'];
            $teacher_lname = $_POST['teacher_lname'];
            $teacher_email = $_POST['teacher_email'];
            $teacher_password = password_hash($_POST['teacher_password'], PASSWORD_DEFAULT);

            $stmt = $conn->prepare("INSERT INTO teacher (teacher_fname, teacher_lname, teacher_email, teacher_password, account_id) 
                                    VALUES (?, ?, ?, ?, ?)");
            $stmt->execute([$teacher_fname, $teacher_lname, $teacher_email, $teacher_password, $account_id]);

        } elseif ($account_id == 3) {
            // students account
            $student_fname = $_POST['student_fname'];
            $student_lname = $_POST['student_lname'];
            $student_email = $_POST['student_email'];
            $student_password = password_hash($_POST['student_password'], PASSWORD_DEFAULT);

            $stmt = $conn->prepare("INSERT INTO student (student_fname, student_lname, student_email, student_password, account_id) 
                                    VALUES (?, ?, ?, ?, ?)");
            $stmt->execute([$student_fname, $student_lname, $student_email, $student_password, $account_id]);

        } else {
            echo "invalid account";
            exit();
        }

        header("Location: createusersuccess.php");
        exit();

    } catch (PDOException $e) {
        echo "there was an error" . $e->getMessage();
    }
}
?>
