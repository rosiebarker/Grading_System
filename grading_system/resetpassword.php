<?php
$account_type = $_GET['account_type'] ?? '';
$id = $_GET['id'] ?? null;

include 'navigationbar.php';
include 'resetpasswordprocess.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/admin.css"> 
    <title>Reset User Password</title>
</head>

<body>

<div class="success-container">
    <form method="POST" class="reset-password-form">

        <h2>Reset Password</h2>

        <input type="password" id="new_password" name="new_password" placeholder="New Password" required>

        <div class="pass-wrapper">
            <input type="password" id="confirm_password" name="confirm_password" placeholder="Confirm Password" required>
            <img src="uploads/show.png" class="toggle-password" onclick="togglePasswords()">
        </div>

        <button type="submit">Update Password</button>

    </form>

</div>

<!--javascript to toggle to show password-->

<script>
function togglePasswords() {
    const newpass = document.getElementById('new_password');
    const confirmpass = document.getElementById('confirm_password');
    const type = newpass.type === 'password' ? 'text' : 'password';
    newpass.type = type;
    confirmpass.type = type;
}
</script>


</body>
</html>
