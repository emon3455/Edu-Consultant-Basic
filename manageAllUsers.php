<?php
include 'header.php';
?>

<h2 class="fs-2 my-2 fw-bold text-center my-5">
    Manage All Users
</h2>

<?php
$sql = "SELECT * FROM users";
$result = mysqli_query($mysqli, $sql);

echo '<table class="table  table-dark table-striped">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">User Name</th>
                <th scope="col">User Email</th>
                <th scope="col">User Password</th>
                <th scope="col">Role</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
            </tr>
        </thead>
        <tbody>
        ';

while ($row = mysqli_fetch_assoc($result)) {
    $ID = $row["id"];
    $name = $row["name"];
    $email = $row["email"];
    $password = $row["password"];
    $role = $row["role"];

    echo '
            <tr>
                <td>' . $ID . '</td>
                    
                <td>' . $name . '</td>              
                <td>' . $email . '</td>
                <td>' . $password . '</td>
                <td>' . $role . '</td>
                <td>
                    <a class="btn btn-info text-white" href="updateUser.php?updateid=' . $ID . '">Update</a>
                </td>
                <td>
                    <a class="btn btn-danger text-white" href="deleteUser.php?deleteid=' . $ID . '">Delete</a>
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