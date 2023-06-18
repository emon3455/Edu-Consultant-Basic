<?php
include 'header.php';
?>

<h1 class="text-center my-5 font-eb-garamond display-6 fw-bold">Delete Selected Course</h1>

<?php 
if(isset($_GET['deleteid']))
{
		$id= $_GET['deleteid']; 
		
        $sql = "DELETE FROM selectedCourse WHERE ID='$id'";
        $run =mysqli_query($mysqli,$sql);
        if($run){
            echo '<h1 class="text-center text-success">Data Deleted</h1>';
            header("location:selectedCourse.php");
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