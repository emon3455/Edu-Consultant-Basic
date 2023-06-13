<?php
include 'header.php';
?>

<h2 class="fs-2 my-2 fw-bold text-center">
    Update Course Here
</h2>

<?php

$id = $_GET['updateid'];
$sql = "SELECT * FROM course WHERE ID=$id";
$result = mysqli_query($mysqli, $sql);
$row = mysqli_fetch_assoc($result);
$course_name = $row["course_name"];
$course_image = $row["course_image"];
$teacher_name = $row["teacher_name"];
$teacher_email = $row["teacher_email"];
$price = $row["price"];


if (isset($_POST['update'])) {
    $course_name = $_POST["course_name"];
    $course_image = $_POST["course_image"];
    $teacher_name = $_POST["teacher_name"];
    $teacher_email = $_POST["teacher_email"];
    $price =  intval($_POST['price']);

    $sql = "UPDATE course SET ID=$id, course_name='$course_name', course_image='$course_image', teacher_name='$teacher_name' , teacher_email='$teacher_email', price=$price where ID=$id ";
    $run = mysqli_query($mysqli, $sql);
    if ($run) {
        // echo "<h1> Data Updated  </h1>";
        header("location: manageAllCourse.php ");
    } else {
        echo "<h1> Data not Updated  </h1>";
    }

}

?>

<div class="d-md-flex flex-row-reverse justify-content-center align-items-center p-2 my-5">
    <div class="col-12 col-lg-6 text-center p-2">
        <img class="img-fluid rounded"
                src="https://cdn.create.vista.com/api/media/medium/349609142/stock-photo-interior-secondary-school-class-light?token="
                class="img-fluid" alt="">
    </div>
    <div class="card col-12 col-lg-6">
        <form class="card-body" method="POST">

            <input type="hidden" name="ID"/>

            <div class="mb-3">
                <label for="exampleInputcourse_name" class="form-label fw-bold">Course Name</label>
                <input type="text" name="course_name" value="<?php echo htmlspecialchars($course_name); ?>" class="form-control" id="exampleInputcourse_name" aria-describedby="course_nameHelp" placeholder="Course Name" required>

            </div>

            <div class="mb-3">
                <label for="exampleInputcourse_image" class="form-label fw-bold">Course Image</label>
                <input type="text" name="course_image" value="<?php echo htmlspecialchars($course_image); ?>" class="form-control" id="exampleInputcourse_image" aria-describedby="course_imageHelp" placeholder="Course Image" required>

            </div>

            <div class="mb-3">
                <label for="exampleInputteacher_name" class="form-label fw-bold">Teacher Name</label>
                <input type="text" name="teacher_name" value="<?php echo htmlspecialchars($teacher_name); ?>" class="form-control" id="exampleInputteacher_name" aria-describedby="teacher_nameHelp" placeholder="Teacher Name" required>

            </div>

            <div class="mb-3">
                <label for="exampleInputteacher_email" class="form-label fw-bold">Teacher Email</label>
                <input type="email" name="teacher_email" value=<?php echo $teacher_email;?> class="form-control" id="exampleInputteacher_email"
                    aria-describedby="teacher_emailHelp" placeholder="Teacher Email" required>
            </div>

            <div class="mb-3">
                <label for="exampleInputprice" class="form-label fw-bold">Price</label>
                <input type="number" name="price" value=<?php echo $price;?> class="form-control" id="exampleInputprice"
                    aria-describedby="priceHelp" placeholder="price" required>
            </div>


            <input type="submit" name="update" value="Update Class" class="btn btn-warning mb-2">

        </form>
    </div>
</div>


<?php
// Include the footer file
include 'footer.php';
?>