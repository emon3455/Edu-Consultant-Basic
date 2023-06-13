<?php
include 'header.php';
?>

<!-- main start -->
<main class="">


    <h2 class="fs-2 my-4 fw-bold text-center">
        Please Register
    </h2>

    <section class="mb-5">
        <div class="d-md-flex flex-row-reverse justify-content-center align-items-center p-2 ">

            <div class="col-12 col-lg-6 text-center">

                <img src="./assets/register.png" class="img-fluid " alt="">

            </div>

            <div class="card col-12 col-lg-6">

                <form class="card-body" method="post">
                    <div class="mb-3">
                        <label for="exampleInputname1" class="form-label">User Name</label>
                        <input type="text" name="name" class="form-control" id="exampleInputname1"
                            aria-describedby="nameHelp">
                    </div>

                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <input type="email" name="email" class="form-control" id="exampleInputEmail1"
                            aria-describedby="emailHelp">
                    </div>

                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                    </div>

                    <div class="mb-3">
                        <label for="roleSelect" class="form-label">Select Your Role</label>
                        <select id="roleSelect" name="role" class="form-select">
                            <option value="student">Student</option>
                            <option value="instructor">Instructor</option>
                            <option value="admin">Admin</option>
                        </select>
                    </div>

                    <input type="submit" name="submit" value="Register" class="btn btn-warning mb-2">

                    <p class="text-center">Already Have an Account? <a href="login.php">Please Login</a></p>

                </form>

            </div>

        </div>

        <?php
        // Inserting data into the database
        if (isset($_POST['submit'])) {
            if (isset($_POST['submit'])) {
                if (!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['role'])) {

                    $name = $_POST['name'];
                    $email = $_POST['email'];
                    $password = $_POST['password'];
                    $role = $_POST['role'];

                    $sql = "INSERT INTO users(name, email, password, role) VALUES('$name','$email','$password','$role')";
                    $run = mysqli_multi_query($mysqli, $sql) or die(mysql_query());

                    if ($run) {
                        echo '<h2 class="text-center text-success">User Successfully Registerd</h2>';
                    } else {
                        echo '<h2 class="text-center text-danger">Sorry Try Again!!</h2>';
                    }

                } else {
                    echo '<h2 class="text-center text-warning">All Field are required</h2>';
                }
            }
        }

        ?>

</section>



<?php
// Include the footer file
include 'footer.php';
?>