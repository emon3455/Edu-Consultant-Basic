<?php
include 'header.php';
?>

<h2 class="fs-2 my-2 fw-bold text-center my-5">
    Manage Your Course
</h2>

<?php
$user_email = $_SESSION['email'];
$sql = "SELECT * FROM course where teacher_email='$user_email'";
$result = mysqli_query($mysqli, $sql);

echo '<table class="table  table-dark table-striped">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Course Name</th>
                <th scope="col">Course Image</th>
                <th scope="col">Teacher Name</th>
                <th scope="col">Teacher Image</th>
                <th scope="col">Price</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
            </tr>
        </thead>
        <tbody>
        ';

while ($row = mysqli_fetch_assoc($result)) {
    $ID = $row["ID"];
    $course_name = $row["course_name"];
    $course_image = $row["course_image"];
    $teacher_name = $row["teacher_name"];
    $teacher_email = $row["teacher_email"];
    $price = $row["price"];

    echo '
            <tr>
                <td>' . $ID . '</td>
                    
                <td>' . $course_name . '</td>              
                <td class="w-25"><img src=' . $course_image . ' class="rounded w-50" alt="class image"></td>               
                <td>' . $teacher_name . '</td>
                <td>' . $teacher_email . '</td>
                <td>$' . $price . '</td>
                <td>
                    <a class="btn btn-warning text-white" href="updateClass.php?updateid=' . $ID . '">Update</a>
                </td>
                <td>
                    <a class="btn btn-danger text-white" href="deleteClass.php?deleteid=' . $ID . '">Delete</a>
                </td>
            </tr>';
}

echo '
</tbody>
</table>';

mysqli_free_result($result);
$mysqli->close();
?>


<?php
// Include the footer file
include 'footer.php';
?>