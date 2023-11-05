<?php
include 'connect.php';
$ID = $_GET['updateemp_ID'];
$sql = "Select * from employee where emp_ID='$ID'";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($result);
$name = $row['emp_name'];
$email = $row['emp_email'];
$mobile = $row['emp_mobile'];
$password = $row['password'];

if (isset($_POST['submit'])) {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $mobile = $_POST['mobile'];
  $password = $_POST['password'];

  $sql = "Update employee set emp_ID='$ID', emp_name='$name', emp_email='$email', emp_mobile='$mobile', password='$password' where emp_ID='$ID'";
  $result = mysqli_query($con, $sql);
  if ($result) {
    echo "Updated Successfully";
  } else {
    die(mysqli_error($con));
  }
}
?>

<!doctype html>
<html lang="en">
  <head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

   
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"  >

    <title>CRUD Application</title>
  </head>
  <body>
    <div class="container my-5">

    <form method="post">
      <div class="form-group">
        <label>Employee Name</label>
        <input type="text" class="form-control" placeholder="Enter your name" name="name" autocomplete="off" value="<?php echo $name ?>">
      </div>

      <div class="form-group">
        <label>Employee Email</label>
        <input type="email" class="form-control" placeholder="Enter your email" name="email" autocomplete="off" value="<?php echo $email ?>">
      </div>

      <div class="form-group">
        <label>Employee Mobile</label>
        <input type="text" class="form-control" placeholder="Enter your Mobile Number" name="mobile" autocomplete="off" value="<?php echo $mobile ?>">
      </div>

      <div class="form-group">
        <label>Password</label>
        <input type="password" class="form-control" placeholder="Enter your Password" name="password" autocomplete="off" value="<?php echo $password ?>">
      </div>

      <button type="submit" class="btn btn-primary" name="submit">Update</button>
    </form>

    
    <a href="display.php" class="btn btn-secondary mt-3">Back to Display</a>

    </div>
  </body>
</html>
