<?php
include 'header.php';
?>

<h1 class="text-center fw-bold">Delete Blogs</h1>

<?php 
if(isset($_GET['deleteid']))
{
		$id= $_GET['deleteid']; 
		
        $sql = "DELETE FROM blogs WHERE ID='$id'";
        $run =mysqli_query($mysqli,$sql);
        if($run){
            echo '<h1 class="text-center text-success">Data Deleted</h1>';
            header("location:manageAllBlog.php");
        }
            else{
                echo '<h1 class="text-center text-danger"> Data not Deleted  </h1>';	
        }
	
	
}
$mysqli ->close();

?>

<?php
// Include the footer file
include 'footer.php';
?>