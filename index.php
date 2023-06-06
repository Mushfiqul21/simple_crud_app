<?php
$con = mysqli_connect('localhost','root', '', 'crud_app');
if(isset($_POST['submit']))
{
    $email = $_POST['email'];
    $name = $_POST['username'];
    $dept = $_POST['dept'];
    $address = $_POST['address'];

    $sql = "INSERT INTO student (email, name, dept, address) VALUES ('$email','$name','$dept','$address')";

    if(mysqli_query($con, $sql)){
      echo "<h1 class='bg-success text-white'>Data Inserted Successfully</h1>";
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>CRUD APP</title>
</head>
<body>
    <h1 class="bg-primary text-white text-center p-2">CRUD APP</h1>
<div class="d-flex justify-content-center">
<form class="w-50 p-3 border border-1 rounded-3" method="POST">
  <div class="mb-2">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" required>
  </div>
  <div class="mb-2">
    <label for="exampleInputname" class="form-label">UserName</label>
    <input type="text" class="form-control" id="exampleInputname" aria-describedby="emailHelp" name="username" required>
  </div>
  <div class="mb-2">
    <label for="exampleInputdept" class="form-label">Department</label>
    <input type="text" class="form-control" id="exampleInputdept" aria-describedby="emailHelp" name="dept" required>
  </div>
  <div class="mb-2">
    <label for="exampleInputaddress" class="form-label">Address</label>
    <input type="text" class="form-control" name="address" id="exampleInputaddress" required>
  </div>
  <button type="submit" class="btn btn-primary" name="submit">Submit</button>

</form>
</div>
<?php
$show = "SELECT * FROM student";
$query = mysqli_query($con, $show);
?>
<div class="container">
<table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Email</th>
      <th scope="col">Username</th>
      <th scope="col">Department</th>
      <th scope="col">Address</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    
      <?php
      while($data = $query->fetch_assoc()){
      echo "
      <tr>
      <th> $data[id]</th>
      <td> $data[email] </td>
      <td> $data[name] </td>
      <td> $data[dept] </td>
      <td> $data[address] </td>
      <td>
      <a href='edit.php?id=$data[id]' class='btn btn-success mx-2'>Edit</a>
      <a href='delete.php?id=$data[id]' class='btn btn-danger'>Delete</a>
      </td>
      </tr>";
      }
      ?>
          
  </tbody>
</table>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>