<?php
include 'database/connection.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $new_password = $_POST['new_password'] ?? '';
    $confirm_password = $_POST['confirm_password'] ?? '';

    //check that new password and and confirm passwords are the same
    if ($new_password !== $confirm_password) {
        echo "Passwords do not match.";
        exit();
    }

    //hash the password always
    $hashed = password_hash($new_password, PASSWORD_DEFAULT);
    
    // Determine the correct password column based on account type
    if ($account_type === 'student') {
        $password_column = 'student_password';
    } else {
        $password_column = 'teacher_password';
    }

    // sql statement to update the password
    $stmt = $conn->prepare("UPDATE $account_type SET $password_column = :password WHERE {$account_type}_id = :id");
    $stmt->execute([
        'password' => $hashed,
        'id' => $id
    ]);

    header("Location: resetpasswordsuccess.php");
    exit();
}
?>