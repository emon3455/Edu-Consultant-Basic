<?php
include 'header.php';
?>

<h2 class="text-center my-5 font-eb-garamond display-6 fw-bold">
    Your Selected Class Status!!
</h2>

<?php

$id = $_GET['selectedid'];
$sql = "SELECT * FROM course WHERE ID=$id";
$result = mysqli_query($mysqli, $sql);
$row = mysqli_fetch_assoc($result);
$course_name = $row["course_name"];
$course_image = $row["course_image"];
$teacher_name = $row["teacher_name"];
$teacher_email = $row["teacher_email"];
$price = $row["price"];
$student_name = $_SESSION['name'];
$student_email = $_SESSION['email'];

$sql = "INSERT INTO selectedCourse(course_name, course_image, course_id, student_name, student_email, teacher_name, teacher_email, price) VALUES('$course_name','$course_image','$id','$student_name','$student_email','$teacher_name','$teacher_email','$price')";
$run = mysqli_multi_query($mysqli, $sql);

if ($run) {
    echo '<div class="alert alert-success text-center fs-4 my-5" role="alert">
            Course SuccessFully Selected
        </div>';
} else {
    echo '<div class="alert alert-danger text-center fs-4 my-5" role="alert">
            Something Went Wrong! Please try again.
        </div>';
}

echo '
<div class="text-center my-5">
    <a class="btn btn-warning fw-semibold ms-auto" href="selectedCourse.php">View Selected Classes</a>
</div>
'

?>

<?php
include 'footer.php';
?>