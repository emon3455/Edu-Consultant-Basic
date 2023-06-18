<?php
include 'header.php';

// Check if a search query is present
if (isset($_GET['search_query']) && !empty($_GET['search_query'])) {
    $search_query = $_GET['search_query'];
    $sql = "SELECT * FROM course WHERE course_name LIKE '%$search_query%'";
} else {
    $sql = "SELECT * FROM course";
}

$result = mysqli_query($mysqli, $sql);
?>

<section class="">

    <h2 class="text-center my-5 font-eb-garamond display-6 fw-bold">All Courses</h2>

    <!-- Search form -->
    <form method="GET" class="my-5" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="mb-3">
        <div class="input-group w-75 mx-auto">
            <input type="text" class="form-control" name="search_query" placeholder="Search courses">
            <button type="submit" class="btn btn-warning">Search</button>
        </div>
    </form>

    <div class="row row-cols-1 mb-3 row-cols-md-3 g-4">
        <?php
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
                            <img src=' . $course_image . ' class="img-fluid h-100 w-100" alt="...">
                        </div>
                        
                        <div class="p-4">
                            <h5 class="card-title"> ' . $course_name . ' </h5>
                            <h6>Teacher Name: ' . $teacher_name . ' </h6>
                            <h6>Course Fee: $' . $price . ' </h6>
                            <div class="d-flex justify-content-end d-' . $disableButton . '">
                                <a class="btn btn-info text-white ms-auto" href="selectClass.php?selectedid=' . $ID . '">
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
    include 'footer.php';
    ?>

</section>
