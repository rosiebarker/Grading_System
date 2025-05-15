<?php
session_start();  

include 'database/connection.php';  

//check form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    //checks if its teacher email
    $stmt = $conn->prepare("SELECT teacher_id AS account_id, teacher_email AS email, teacher_password AS password, 'Teacher' AS account_type FROM teacher WHERE teacher_email = :email");
    $stmt->execute([':email' => $email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    //if it isnt found in teacher table search student table
    if (!$user) {
        $stmt = $conn->prepare("SELECT student_id AS account_id, student_email AS email, student_password AS password, 'Student' AS account_type FROM student WHERE student_email = :email");
        $stmt->execute([':email' => $email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
    }

    //if it isnt found in teacher table search admin table
    if (!$user) {
        $stmt = $conn->prepare("SELECT admin_id AS account_id, admin_email AS email, admin_password AS password, 'Admin' AS account_type FROM admin WHERE admin_email = :email");
        $stmt->execute([':email' => $email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
    }

    //if a user has been found in above process the password is correct
    if ($user && password_verify($password, $user['password'])) {
        //store these variables in the session 
        $_SESSION['username'] = $email;  
        $_SESSION['account_id'] = $user['account_id'];  
        $_SESSION['account_type'] = $user['account_type']; 

        //redirect each user based on their account type
        if ($user['account_type'] === 'Admin') {
            header('Location: admindashboard.php');
            exit();

        } elseif ($user['account_type'] === 'Teacher') {
            header('Location: index.php');
            exit();

        } elseif ($user['account_type'] === 'Student') {
            header('Location: studentdashboard.php');
            exit();
        }
    } else {
        echo "incorrect login details try again";
    }
}
?>