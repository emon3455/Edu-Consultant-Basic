<?php
include 'header.php';
?>


<!-- navbar start -->
<nav class="navbar navbar-expand-lg bg-info-subtle sticky-top">
    <div class="container-fluid">
        <a class="navbar-brand fw-bold" href="#"> Edu-Consultant BD </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse " id="navbarSupportedContent">

            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">

                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="home.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="blogs.php">Blog</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="login.php">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">Logout</a>
                </li>

            </ul>
        </div>
    </div>
</nav>
<!-- navbar end -->

<!-- main start -->
<main class="">

    <?php

    session_start();
    include_once('connection.php');
    ?>

    <h2>student home comming soon</h2>


<?php
    // Include the footer file
    include 'footer.php';
?>