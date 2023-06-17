<?php
include 'header.php';
?>

<h2 class="fs-2 my-2 fw-bold text-center">
    Update Blog
</h2>

<?php

$id = $_GET['updateid'];
$sql = "SELECT * FROM blogs WHERE ID=$id";
$result = mysqli_query($mysqli, $sql);
$row = mysqli_fetch_assoc($result);
$blog_title = $row["blog_title"];
$blog_image = $row["blog_image"];
$blog_text = $row["blog_text"];
$author_name = $row["author_name"];
$author_email = $row["author_email"];


if (isset($_POST['update'])) {
    $blog_title = $_POST["blog_title"];
    $blog_image = $_POST["blog_image"];
    $blog_text = $_POST["blog_text"];
    $author_name = $_POST["author_name"];
    $author_email = $_POST['author_email'];

    $sql = "UPDATE blogs SET ID=$id, blog_title='$blog_title', blog_image='$blog_image', blog_text='$blog_text' , author_name='$author_name', author_email='$author_email' where ID=$id ";
    $run = mysqli_query($mysqli, $sql);
    if ($run) {
        if ($_SESSION['role'] == 'admin') {
            header("location: manageAllBlog.php");
        }else {
            header("location: manageMyBlog.php");
        }
    } else {
        echo "<h1> Data not Updated  </h1>";
    }

}

?>

<div class="d-md-flex flex-row-reverse justify-content-center align-items-center p-2 my-5">
    <div class="col-12 col-lg-6 text-center p-2">
        <img class="img-fluid rounded"
            src="https://images.unsplash.com/photo-1488190211105-8b0e65b80b4e?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=870&q=80"
            class="img-fluid" alt="">
    </div>
    <div class="card col-12 col-lg-6">
        <form class="card-body" method="POST">

            <input type="hidden" name="ID"/>

            <div class="mb-3">
                <label for="exampleInputblog_title" class="form-label fw-bold">Blog title</label>
                <input type="text" name="blog_title" value="<?php echo htmlspecialchars($blog_title); ?>" class="form-control" id="exampleInputblog_title"
                    aria-describedby="blog_titleHelp" placeholder="Blog Title" required>
            </div>

            <div class="mb-3">
                <label for="exampleInputblog_image" class="form-label fw-bold">Blog Image</label>
                <input type="text" name="blog_image" value="<?php echo htmlspecialchars($blog_image); ?>" class="form-control" id="exampleInputblog_image"
                    aria-describedby="course_imageHelp" placeholder="Blog Image" required>
            </div>

            <div class="mb-3">
                <label for="exampleInputcontent" class="form-label fw-bold">Content</label>
                <textarea name="blog_text" class="form-control" required><?php echo htmlspecialchars($blog_text); ?></textarea>
            </div>

            <div class="mb-3">
                <label for="exampleInputauthor_name" class="form-label fw-bold">Author Name</label>
                <input type="text" name="author_name" value="<?php echo htmlspecialchars($author_name); ?>" class="form-control" id="exampleInputauthor_name"
                    aria-describedby="teacher_emailHelp" placeholder="Author Email" required>
            </div>

            <div class="mb-3">
                <label for="exampleInputauthor_email" class="form-label fw-bold">Author Email</label>
                <input type="email" name="author_email" value="<?php echo htmlspecialchars($author_email); ?>" class="form-control" id="exampleInputauthor_email"
                    aria-describedby="author_emailHelp" placeholder="Author Email" required>
            </div>


            <input type="submit" name="update" value="Update Blog" class="btn btn-warning mb-2">

        </form>
    </div>
</div>


<?php
// Include the footer file
include 'footer.php';
?>