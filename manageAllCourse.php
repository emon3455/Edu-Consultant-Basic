<?php
include 'header.php';
?>

<h2 class="text-center my-2 font-eb-garamond fs-2 fw-bold">
    Manage All Course
</h2>

<?php
$sql = "SELECT * FROM course";
$result = mysqli_query($mysqli, $sql);

echo '<table class="table  table-success table-striped">
        <thead>
            <tr class="table-dark">
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
            <tr class="fw-semibold">
                <td>' . $ID . '</td>
                    
                <td>' . $course_name . '</td>              
                <td class="w-25"><img src=' . $course_image . ' class="rounded w-50" alt="class image"></td>               
                <td>' . $teacher_name . '</td>
                <td>' . $teacher_email . '</td>
                <td>$' . $price . '</td>
                <td>
                    <a class="btn btn-warning fw-semibold" href="updateClass.php?updateid=' . $ID . '">Update</a>
                </td>
                <td>
                    <a class="btn btn-danger text-white fw-semibold" href="deleteClass.php?deleteid=' . $ID . '">Delete</a>
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