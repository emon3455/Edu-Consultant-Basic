<?php
include 'header.php';
?>

<!-- main start -->
<main class="">

    <h2 class="text-center fw-bold my-3">Manage Blogs</h2>

    <div class="row row-cols-1 mb-3 row-cols-md-3 g-4">
        <?php
        $sql = "SELECT * FROM blogs";
        $result = mysqli_query($mysqli, $sql);

        while ($row = mysqli_fetch_assoc($result)) {
            $ID = $row["ID"];
            $blog_title = $row["blog_title"];
            $blog_image = $row["blog_image"];
            $blog_text = $row["blog_text"];
            $author_name = $row["author_name"];
            $author_email = $row["author_email"];

            echo '
                <div class="col">
                    <div class="card h-100">
                        <div class="h-75">
                            <img src=' . $blog_image . ' class="img-fluid h-100" alt="...">
                        </div>
                        <div class="card-body d-flex flex-column ">
                            <h5 class="card-title"> ' . $blog_title . ' </h5>
                            <h6>Author Name: ' . $author_name . ' </h6>
                            <p class="card-text">
                                ' . $blog_text . '
                            </p>
                            <div class="mt-auto">
                                <div class="d-flex justify-content-end">
                                    <a class="btn btn-info text-white me-1" href="updateBlog.php?updateid=' . $ID . '">Update</a>
                                    <a class="btn btn-danger text-white" href="deleteBlog.php?deleteid=' . $ID . '">Delete</a>
                                </div>
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
    // Include the footer file
    include 'footer.php';
    ?>