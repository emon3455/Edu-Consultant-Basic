<?php
include 'header.php';
?>


<!-- main start -->
<main class="">

    <h2 class="text-center my-5 font-eb-garamond display-6 fw-bold">
        Please Login
    </h2>

    <div class="d-md-flex flex-row-reverse justify-content-center align-items-center p-2 mb-5">
        <div class="col-12 col-lg-6 text-center p-2">
            <img src="./assets/login.png" class="img-fluid" alt="">
        </div>
        <div class="card col-12 col-lg-6">
            <form class="card-body" method="POST">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1"
                        aria-describedby="emailHelp" placeholder="Email" required>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" id="exampleInputPassword1"
                        placeholder="Password" required>
                </div>
                <input type="submit" name="submit" value="Login" class="btn btn-warning mb-2">
                <p class="text-center">Don't Have any Account? <a href="register.php">Please Register</a></p>
            </form>
        </div>
    </div>

    <?php
    if (isset($_POST['submit'])) {
        if (!empty($_POST['email']) && !empty($_POST['password'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];

            $sql = "SELECT * FROM users WHERE email = ?";
            $stmt = $mysqli->prepare($sql);
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows === 1) {

                $user = $result->fetch_assoc();
                $storedPassword = $user['password'];

                if (strlen($password) == strlen($storedPassword)) {
                    if ($password == $storedPassword) {
                        // Set session variables
                        $_SESSION['user_id'] = $user['id'];
                        $_SESSION['name'] = $user['name'];
                        $_SESSION['email'] = $user['email'];
                        $_SESSION['role'] = $user['role'];

                        header("Location: home.php");

                    } else {
                        echo '<h2 class="text-center text-warning">Please Enter Valid Password</h2>';
                    }
                } else {
                    echo '<h2 class="text-center text-warning">Invalid Password Length</h2>';
                }

            } else {
                echo '<h2 class="text-center text-danger">Sorry Try Again!! Email is Not Valid</h2>';
            }
        } else {
            echo '<h2 class="text-center text-warning">All Fields are required</h2>';
        }
    }
    ?>

    <?php
    // Include the footer file
    include 'footer.php';
    ?>