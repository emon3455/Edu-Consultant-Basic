<?php
include 'header.php';
?>

<h2 class="text-center mt-2 font-eb-garamond fs-2 fw-bold">
    Add Review Here
</h2>

<div class="d-md-flex flex-row-reverse justify-content-center align-items-center p-2">
    <div class="col-12 col-lg-6 text-center p-2">
        <img class="img-fluid rounded h"
            src="https://img.freepik.com/vecteurs-libre/gestion-reputation-commentaires-utilisateurs-fidelisation-clients-compteur-satisfaction-client-avis-positif-confiance-entreprise-systeme-evaluation-qualite-cinq-etoiles_335657-2691.jpg?w=740&t=st=1687035692~exp=1687036292~hmac=3af4e6f57ad1bde3461dc7499773b21f3c038be886ab5a2a4f584ba6c1617b49"
            class="img-fluid" alt="">
    </div>
    <div class="card col-12 col-lg-6">
        <form class="card-body" method="POST">

            <div class="mb-3">
                <label for="exampleInputname1" class="form-label">User Name</label>
                <input type="text" name="name" class="form-control" id="exampleInputname1" aria-describedby="nameHelp" value="<?php echo $_SESSION['name']; ?>" readonly>
            </div>

            <div class="mb-3">
                <label for="exampleInputblog_image" class="form-label fw-bold">Photo URL</label>
                <input type="text" name="image" class="form-control" id="exampleInputblog_image"
                    aria-describedby="course_imageHelp" placeholder="Your Photo URL" required>
            </div>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $_SESSION['email']; ?>" readonly>
            </div>

            <div class="mb-3">
                <label for="exampleInputcontent" class="form-label fw-bold">Message</label>
                <textarea name="message" class="form-control" required></textarea>
            </div>

            <input type="submit" name="submit" value="Add Review" class="btn btn-warning mb-2">

        </form>
    </div>
</div>

<?php
if (isset($_POST['submit'])) {
    if (!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['image']) && !empty($_POST['message'])) {

        $name = $_POST['name'];
        $email = $_POST['email'];
        $image = $_POST['image'];
        $message = $_POST['message'];

        // Prepare the SQL statement with placeholders
        $sql = "INSERT INTO reviews (name, email, image, message) VALUES (?, ?, ?, ?)";
        $stmt = $mysqli->prepare($sql);

        // Bind the parameters to the statement
        $stmt->bind_param("ssss", $name, $email, $image, $message);

        // Execute the query
        if ($stmt->execute()) {
            echo '<div class="alert alert-success text-center fs-4" role="alert">
                    Review Successfully Added
                </div>';
        } else {
            echo '<div class="alert alert-danger text-center fs-4" role="alert">
            Something Went Wrong! Please try again.
          </div>';
        }

        // Close the statement
        $stmt->close();
    } else {
        echo '<div class="alert alert-danger text-center fs-4" role="alert">
                All Fields are Required
            </div>';
    }
}
?>

<?php
// Include the footer file
include 'footer.php';
?>
