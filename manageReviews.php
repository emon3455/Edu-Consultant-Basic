<?php
include 'header.php';
?>

<h2 class="text-center my-2 font-eb-garamond fs-2 fw-bold">
    Manage All Reviews
</h2>

<?php
$sql = "SELECT * FROM reviews";
$result = mysqli_query($mysqli, $sql);

echo '<table class="table table-success table-striped">
        <thead>
            <tr class="table-dark">
                <th scope="col">ID</th>
                <th scope="col">User Name</th>
                <th scope="col">User Email</th>
                <th scope="col">Message</th>
                <th scope="col">Delete</th>
            </tr>
        </thead>
        <tbody>
        ';

while ($row = mysqli_fetch_assoc($result)) {
    $ID = $row["ID"];
    $name = $row["name"];
    $email = $row["email"];
    $message = $row["message"];

    echo '
            <tr class="fw-semibold">
                <td>' . $ID . '</td>
                    
                <td>' . $name . '</td>
                <td>' . $email . '</td>
                <td class="w-50 text-justify">' . $message . '</td>
                <td>
                    <a class="btn btn-danger text-white fw-semibold" href="deleteReviews.php?deleteid=' . $ID . '">Delete</a>
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