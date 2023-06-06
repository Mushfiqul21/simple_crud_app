<?php
$con = mysqli_connect('localhost','root', '', 'crud_app');
$id = $_GET['id'];

$sql = "DELETE FROM student WHERE id = '$id'";
if(mysqli_query($con, $sql))
{
    header('location:index.php');
}
else
{
    echo "<h1 class='bg-danger text-white'>Error Occured</h1>";
}
?>