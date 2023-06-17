<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edu Consultant BD</title>

    <!-- fav icon -->
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">

    <!-- font awesome cdn -->
    <script src="https://kit.fontawesome.com/3dfa760d15.js" crossorigin="anonymous"></script>

    <!-- bootstrap cdn -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

    <!-- css link -->
    <link rel="stylesheet" href="style.css">

</head>

<body>
    
<?php
session_start();
include_once('connection.php');
?>

<!-- navbar start -->
<nav class="navbar navbar-expand-lg bg-info-subtle sticky-top">
    <div class="container-fluid">
        <a class="navbar-brand fw-bold" href="#">Edu-Consultant BD</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="btn btn-primary btn-sm me-lg-1 mb-1 mb-lg-0 " aria-current="page" href="home.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="btn btn-primary btn-sm me-lg-1 mb-1 mb-lg-0 " href="blogs.php">Blogs</a>
                </li>
                <li class="nav-item">
                    <a class="btn btn-primary btn-sm me-lg-1 mb-1 mb-lg-0 " href="courses.php">Courses</a>
                </li>

                <?php
                // Check if the user is logged in
                if (isset($_SESSION['user_id'])) {
                    $role = $_SESSION['role'];

                    // User-specific links
                    if ($role == 'student') {
                        echo '
                            <li class="nav-item">
                                <a class="btn btn-primary btn-sm me-lg-1 mb-1 mb-lg-0 " href="selectedCourse.php">Selected Courses</a>
                            </li>
                            <li class="nav-item">
                                <a class="btn btn-primary btn-sm me-lg-1 mb-1 mb-lg-0 " href="enrolledCourse.php">Enrolled Courses</a>
                            </li>';
                    } elseif ($role == 'instructor') {
                        echo '
                            <li class="nav-item">
                                <a class="btn btn-primary btn-sm me-lg-1 mb-1 mb-lg-0 " href="addBlog.php">Add Blog</a>
                            </li>
                            <li class="nav-item">
                                <a class="btn btn-primary btn-sm me-lg-1 mb-1 mb-lg-0 " href="manageMyBlog.php">Manage My Blog</a>
                            </li>
                            <li class="nav-item">
                                <a class="btn btn-primary btn-sm me-lg-1 mb-1 mb-lg-0 " href="addCourse.php">Add Course</a>
                            </li>
                            <li class="nav-item">
                                <a class="btn btn-primary btn-sm me-lg-1 mb-1 mb-lg-0 " href="manageMyCourse.php">Manage My Course</a>
                            </li>';
                    } elseif ($role == 'admin') {
                        echo '
                            <li class="nav-item">
                                <a class="btn btn-primary btn-sm me-lg-1 mb-1 mb-lg-0 " href="addCourse.php">Add Course</a>
                            </li>
                            <li class="nav-item">
                                <a class="btn btn-primary btn-sm me-lg-1 mb-1 mb-lg-0 " href="manageAllCourse.php">Manage Courses</a>
                            </li>
                            <li class="nav-item">
                                <a class="btn btn-primary btn-sm me-lg-1 mb-1 mb-lg-0 " href="addBlog.php">Add Blog</a>
                            </li>
                            <li class="nav-item">
                                <a class="btn btn-primary btn-sm me-lg-1 mb-1 mb-lg-0 " href="manageAllBlog.php">Manage Blogs</a>
                            </li>
                            <li class="nav-item">
                                <a class="btn btn-primary btn-sm me-lg-1 mb-1 mb-lg-0 " href="manageAllUsers.php">Manage User</a>
                            </li>';
                    }

                    // Logout link
                    echo '<li class="nav-item">
                            <a class="btn btn-warning btn-sm me-lg-1 mb-1 mb-lg-0 " href="logout.php">Logout</a>
                        </li>';
                } else {
                    // Not logged in - show login link
                    echo '<li class="nav-item">
                            <a class="btn btn-warning btn-sm me-lg-1 mb-1 mb-lg-0 " href="login.php">Login</a>
                        </li>';
                }
                ?>
            </ul>
        </div>
    </div>
</nav>
<!-- navbar end -->

<!-- main start -->
<main class="p-2">