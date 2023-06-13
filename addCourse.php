<?php
include 'header.php';
?>



    <h2 class="fs-2 my-2 fw-bold text-center">
        Add Course Here
    </h2>

    <div class="d-md-flex flex-row-reverse justify-content-center align-items-center p-2 my-5">
        <div class="col-12 col-lg-6 text-center p-2">
            <img class="img-fluid rounded"
                src="https://cdn.create.vista.com/api/media/medium/349609142/stock-photo-interior-secondary-school-class-light?token="
                class="img-fluid" alt="">
        </div>
        <div class="card col-12 col-lg-6">
            <form class="card-body" method="POST">

                <div class="mb-3">
                    <label for="exampleInputcourse_name" class="form-label fw-bold">Course Name</label>
                    <input type="text" name="course_name" class="form-control" id="exampleInputcourse_name"
                        aria-describedby="course_nameHelp" placeholder="Course Name" required>
                </div>

                <div class="mb-3">
                    <label for="exampleInputcourse_image" class="form-label fw-bold">Course Image</label>
                    <input type="text" name="course_image" class="form-control" id="exampleInputcourse_image"
                        aria-describedby="course_imageHelp" placeholder="Course Image" required>
                </div>

                <div class="mb-3">
                    <label for="exampleInputteacher_name" class="form-label fw-bold">Teacher Name</label>
                    <input type="text" name="teacher_name" class="form-control" id="exampleInputteacher_name"
                        aria-describedby="teacher_nameHelp" placeholder="Teacher Name" required>
                </div>

                <div class="mb-3">
                    <label for="exampleInputteacher_email" class="form-label fw-bold">Teacher Email</label>
                    <input type="email" name="teacher_email" class="form-control" id="exampleInputteacher_email"
                        aria-describedby="teacher_emailHelp" placeholder="Teacher Email" required>
                </div>

                <div class="mb-3">
                    <label for="exampleInputprice" class="form-label fw-bold">Price</label>
                    <input type="number" name="price" class="form-control" id="exampleInputprice"
                        aria-describedby="priceHelp" placeholder="price" required>
                </div>


                <input type="submit" name="submit" value="Add Class" class="btn btn-warning mb-2">

            </form>
        </div>
    </div>

    <?php
    if (isset($_POST['submit'])) {
        if (isset($_POST['submit'])) {
            if (!empty($_POST['course_name']) && !empty($_POST['course_image']) && !empty($_POST['teacher_name']) && !empty($_POST['teacher_email']) && !empty($_POST['price'])) {

                $course_name = $_POST['course_name'];
                $course_image = $_POST['course_image'];
                $teacher_name = $_POST['teacher_name'];
                $teacher_email = $_POST['teacher_email'];
                $price = intval($_POST['price']);

                $sql = "INSERT INTO course(course_name, course_image, teacher_name, teacher_email,price) VALUES('$course_name','$course_image','$teacher_name','$teacher_email','$price')";
                $run = mysqli_multi_query($mysqli, $sql);

                if ($run) {
                    echo '<h2 class="text-center text-success fw-bold mb-4">Class Successfully Added</h2>';
                } else {
                    echo '<h2 class="text-center text-danger fw-bold mb-4">Sorry Something Went Wrong Try Again!!</h2>';
                }

            } else {
                echo '<h2 class="text-center text-warning">All Field are required</h2>';
            }
        }
    }
    ?>

    <?php
    // Include the footer file
    include 'footer.php';
    ?>