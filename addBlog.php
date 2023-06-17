<?php
include 'header.php';
?>



<h2 class="fs-2 my-2 fw-bold text-center">
    Add Blog Here
</h2>

<div class="d-md-flex flex-row-reverse justify-content-center align-items-center p-2 my-5">
    <div class="col-12 col-lg-6 text-center p-2">
        <img class="img-fluid rounded"
            src="https://images.unsplash.com/photo-1488190211105-8b0e65b80b4e?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=870&q=80"
            class="img-fluid" alt="">
    </div>
    <div class="card col-12 col-lg-6">
        <form class="card-body" method="POST">

            <div class="mb-3">
                <label for="exampleInputblog_title" class="form-label fw-bold">Blog title</label>
                <input type="text" name="blog_title" class="form-control" id="exampleInputblog_title"
                    aria-describedby="blog_titleHelp" placeholder="Blog Title" required>
            </div>

            <div class="mb-3">
                <label for="exampleInputblog_image" class="form-label fw-bold">Blog Image</label>
                <input type="text" name="blog_image" class="form-control" id="exampleInputblog_image"
                    aria-describedby="course_imageHelp" placeholder="Blog Image" required>
            </div>

            <div class="mb-3">
                <label for="exampleInputcontent" class="form-label fw-bold">Content</label>
                <textarea name="blog_text" class="form-control" required></textarea>
            </div>

            <div class="mb-3">
                <label for="exampleInputauthor_name" class="form-label fw-bold">Author Name</label>
                <input type="text" name="author_name" class="form-control" id="exampleInputauthor_name"
                    aria-describedby="teacher_emailHelp" placeholder="Author Email" required>
            </div>

            <div class="mb-3">
                <label for="exampleInputauthor_email" class="form-label fw-bold">Author Email</label>
                <input type="email" name="author_email" class="form-control" id="exampleInputauthor_email"
                    aria-describedby="author_emailHelp" placeholder="Author Email" required>
            </div>


            <input type="submit" name="submit" value="Add Blog" class="btn btn-info mb-2">

        </form>
    </div>
</div>

<?php
if (isset($_POST['submit'])) {
    if (!empty($_POST['blog_title']) && !empty($_POST['blog_image']) && !empty($_POST['blog_text']) && !empty($_POST['author_name']) && !empty($_POST['author_email'])) {

        $blog_title = $_POST['blog_title'];
        $blog_image = $_POST['blog_image'];
        $blog_text = $_POST['blog_text'];
        $author_name = $_POST['author_name'];
        $author_email = $_POST['author_email'];

        // Prepare the SQL statement
        $stmt = $mysqli->prepare("INSERT INTO blogs(blog_title, blog_image, blog_text, author_name, author_email) VALUES(?, ?, ?, ?, ?)");

        // Bind the parameters
        $stmt->bind_param("sssss", $blog_title, $blog_image, $blog_text, $author_name, $author_email);

        // Execute the query
        if ($stmt->execute()) {
            echo '<div class="alert alert-success text-center fs-4" role="alert">
                    Blog SuccessFully Added
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
                All Field are Required
            </div>';
    }
}

?>

<?php
// Include the footer file
include 'footer.php';
?>