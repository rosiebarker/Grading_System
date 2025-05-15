<?php session_start(); ?>

<?php
// when a user isn't logged in hide the nav bar
if (!isset($_SESSION['account_type'])) {
    header('Location: login.php'); 
    exit();
}

//redirect user based on the account type
$redirect_url = 'index.php'; 
if ($_SESSION['account_type'] === 'Admin') {
    $redirect_url = 'admindashboard.php'; 
} elseif ($_SESSION['account_type'] === 'Student') {
    $redirect_url = 'studentdashboard.php'; 
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Navigation Bar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css"> 
    <link rel="stylesheet" href="css/dropdown-style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body class="bg-light">

<!--displays if user is logged in-->
<nav class="navbar navbar-expand-lg navbar-light bg-dark shadow">
    <div class="container-fluid">

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbardropdown"
            aria-controls="navbardropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbardropdown">
            <ul class="navbar-nav w-100 justify-content-around">
                <?php
                //if the account type is admin show admin dashboard otherwise display relevent homepages for teacher and student
                if ($_SESSION['account_type'] === 'Admin') {
                    echo '<li class="nav-item">
                            <a class="nav-link active text-white fw-bold" href="admindashboard.php">Admin Dashboard</a>
                          </li>';
                } else {
                    echo '<li class="nav-item">
                            <a class="nav-link active text-white fw-bold" aria-current="page" href="' . $redirect_url . '">Home</a>
                          </li>';
                }
                ?>

                <?php
                //show account options
                if (isset($_SESSION['account_type'])) {
                    echo '<li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-white fw-bold d-flex align-items-center gap-1" href="' . $redirect_url . '" id="navbarDropdownMenuLink"
                                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                ' . htmlspecialchars($_SESSION['username']) . ' <i class="bi bi-person-circle"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
                                <li><a class="dropdown-item" href="logoutprocess.php">Log Out</a></li>
                            </ul>
                        </li>';
                }
                ?>
            </ul>
        </div>
    </div>
</nav>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-TQ0Nkp/3TbJAkBeH+f5f5PRm4JHlZzUXYRoMSdObH6z43B7V3Qu4iOv1YbwA4lPo" crossorigin="anonymous"></script>

</body> 
</html>