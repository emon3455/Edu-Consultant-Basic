<?php
include 'header.php';
?>

<h2 class="fs-2 my-2 fw-bold text-center">
    Update User Here
</h2>

<?php

$id = $_GET['updateid'];
$sql = "SELECT * FROM users WHERE id=$id";
$result = mysqli_query($mysqli, $sql);
$row = mysqli_fetch_assoc($result);
$name = $row["name"];
$email = $row["email"];
$password = $row["password"];
$role = $row["role"];


if (isset($_POST['update'])) {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $role = $_POST["role"];

    $sql = "UPDATE users SET ID=$id, name='$name', email='$email', password='$password' , role='$role' where id=$id ";
    $run = mysqli_query($mysqli, $sql);
    if ($run) {
        // echo "<h1> Data Updated  </h1>";
        header("location: manageAllUsers.php ");
    } else {
        echo "<h1> Data not Updated  </h1>";
    }

}

?>

<div class="d-md-flex flex-row-reverse justify-content-center align-items-center p-2 ">

    <div class="col-12 col-lg-6 text-center">

        <img src="https://abcschool.institute.org.in/assets/images/student-login-2.svg" class="img-fluid " alt="">

    </div>

    <div class="card col-12 col-lg-6">

        <form class="card-body" method="post">
            <div class="mb-3">
                <label for="exampleInputname1" class="form-label">User Name</label>
                <input type="text" name="name" value="<?php echo htmlspecialchars($name); ?>" class="form-control" id="exampleInputname1" aria-describedby="nameHelp">
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" name="email" value="<?php echo htmlspecialchars($email); ?>" class="form-control" id="exampleInputEmail1"
                    aria-describedby="emailHelp">
            </div>

            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="text" name="password" value="<?php echo htmlspecialchars($password); ?>" class="form-control" id="exampleInputPassword1">
            </div>

            <div class="mb-3">
                <label for="roleSelect" class="form-label">Select User Role</label>
                <select id="roleSelect" name="role" class="form-select">
                    <option value="<?php echo htmlspecialchars($role); ?>" selected disabled><?php echo htmlspecialchars($role); ?></option>
                    <option value="student">Student</option>
                    <option value="instructor">Instructor</option>
                    <option value="admin">Admin</option>
                </select>
            </div>

            <input type="submit" name="update" value="Update" class="btn btn-warning mb-2">

        </form>

    </div>

</div>

<?php
// Include the footer file
include 'footer.php';
?>