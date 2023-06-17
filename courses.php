<?php
include 'header.php';
?>

<!-- main start -->
<main class="">

    <h2 class="text-center my-3">All Courses</h2>

    <div class="row row-cols-1 mb-3 row-cols-md-3 g-4">
        <?php
        $sql = "SELECT * FROM course";
        $result = mysqli_query($mysqli, $sql);

        while ($row = mysqli_fetch_assoc($result)) {
            $ID = $row["ID"];
            $course_name = $row["course_name"];
            $course_image = $row["course_image"];
            $teacher_name = $row["teacher_name"];
            $teacher_email = $row["teacher_email"];
            $price = $row["price"];

            // Check if user is logged in
            if (isset($_SESSION['user_id'])) {
                // Check if user role is admin or instructor
                if ($_SESSION['role'] == 'admin' || $_SESSION['role'] == 'instructor') {
                    $disableButton = 'none';
                } else {
                    $disableButton = 'block';
                }
            } else {
                // User is not logged in, disable the button
                $disableButton = 'none';
            }

            echo '
                <div class="col">
                    <div class="card h-100">
                        <div class="h-75">
                            <img src=' . $course_image . ' class="img-fluid h-100" alt="...">
                        </div>
                        
                        <div class="p-2">
                            <h5 class="card-title"> ' . $course_name . ' </h5>
                            <h6>Teacher Name: ' . $teacher_name . ' </h6>
                            <h6>Course Fee: $' . $price . ' </h6>
                            <div class="d-flex justify-content-end d-'. $disableButton .'">
                                <a class="btn btn-info text-white ms-auto" href="selectClass.php?updateid=' . $ID . '">
                                Select
                                </a>
                            </div>                        
                        </div>
                    </div>
                </div>   
                    ';
        }
        mysqli_free_result($result);
        $mysqli->close();
        ?>
    </div>

    <?php
    // Include the footer file
    include 'footer.php';
    ?>
