<?php
$con = mysqli_connect('localhost','root', '', 'crud_app');
if(isset($_GET['id']))
{
    $id = $_GET['id'];
    $sql = "SELECT * FROM student WHERE id = '$id'";
    $query = mysqli_query($con, $sql);
    $data = mysqli_fetch_assoc($query);

    $id = $data['id'];
    $email = $data['email'];
    $name = $data['name'];
    $dept = $data['dept'];
    $address = $data['address'];
}
$id = $_GET['id'];
if(isset($_POST['update']))
{
    $email = $_POST['email'];
    $name = $_POST['username'];
    $dept = $_POST['dept'];
    $address = $_POST['address'];

    $con = mysqli_connect('localhost','root', '', 'crud_app');
    $sql1 = "UPDATE student SET email='$email', name='$name', dept ='$dept',address='$address' WHERE id = '$id'";

    if(mysqli_query($con, $sql1)){
      header('location:index.php');
    }
    else
    {
      echo "<h1 class='bg-danger text-white'>Error Occured</h1>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Value of Crud App</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <h1 class="bg-success p-2 text-white text-center">Edit your Information</h1>
<div class="d-flex justify-content-center">
<form class="w-50 p-3 border border-1 rounded-3" method="POST">
  <div class="mb-2">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" value = "<?php echo $email ?>" required>
  </div>
  <div class="mb-2">
    <label for="exampleInputname" class="form-label">UserName</label>
    <input type="text" class="form-control" id="exampleInputname" aria-describedby="emailHelp" name="username" value = "<?php echo $name ?>" required>
  </div>
  <div class="mb-2">
    <label for="exampleInputdept" class="form-label">Department</label>
    <input type="text" class="form-control" id="exampleInputdept" aria-describedby="emailHelp" name="dept" value = "<?php echo $dept ?>" required>
  </div>
  <div class="mb-2">
    <label for="exampleInputaddress" class="form-label">Address</label>
    <input type="text" class="form-control" name="address" id="exampleInputaddress" value = "<?php echo $address ?>" required>
  </div>
 
  <button type="submit" class="btn btn-success" name="update">Update</button>

</form>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>