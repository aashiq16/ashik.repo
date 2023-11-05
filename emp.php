<?php
include 'connect.php';

if (isset($_POST['submit'])) {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $mobile = $_POST['mobile'];
  $password = $_POST['password'];

  // Check if any of the mandatory fields are empty
  if (empty($name) || empty($email) || empty($mobile) || empty($password)) {
    $error_message = "All fields are mandatory";
  } else {
    $sql = "INSERT INTO employee (emp_name, emp_email, emp_mobile, password) VALUES ('$name', '$email', '$mobile', '$password')";
    $result = mysqli_query($con, $sql);
    if ($result) {
      header("location: display.php");
    } else {
      die(mysqli_error($con));
    }
  }
}
?>

<!doctype html>
<html lang="en">

<head>
  
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">

  <style>
    .mandatory-label::after {
      content: ' *';
      color: red;
    }
  </style>

  <title>CRUD Application</title>
</head>

<body>
  <div class="container my-5">

    <form method="post">
      <div class="form-group">
        <label for="name" class="mandatory-label">Employee Name</label>
        <input type="text" class="form-control" id="name" placeholder="Enter your name" name="name" autocomplete="off">
      </div>

      <div class="form-group">
        <label for="email" class="mandatory-label">Employee Email</label>
        <input type="email" class="form-control" id="email" placeholder="Enter your email" name="email" autocomplete="off">
      </div>

      <div class="form-group">
        <label for="mobile" class="mandatory-label">Employee Mobile</label>
        <input type="text" class="form-control" id="mobile" placeholder="Enter your Mobile Number" name="mobile" autocomplete="off">
      </div>

      <div class="form-group">
        <label for="password" class="mandatory-label">Password</label>
        <input type="password" class="form-control" id="password" placeholder="Enter your Password" name="password" autocomplete="off">
      </div>

      <?php
      if (isset($error_message)) {
        echo '<p class="text-danger">' . $error_message . '</p>';
      }
      ?>

      <button type="submit" class="btn btn-primary" name="submit">Submit</button>
    </form>
    <a href="display.php" class="btn btn-secondary mt-3">Back to Display</a>
  </div>
</body>

</html>
