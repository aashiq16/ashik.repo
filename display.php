
<?php

 include 'connect.php';

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE-edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Crud Application</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
  <style>
    .hidden-password {
      font-family: 'Courier New', monospace;
      color: black;
      letter-spacing: 0.3em;
    }

    .btn-update {
      background-color: #4CAF50; 
      color: white;
    }

    .btn-delete {
      background-color: #FF5733; 
      color: white;
    }

    .center-heading {
      text-align: center;
      margin-top: 50px; 
    }

    .ribbon {
      background-color: #3498db; 
      color: white;
      padding: 10px 20px;
      border-radius: 20px; 
    }
  </style>
</head>
<body>

<div class="container">
  <div class="center-heading">
    <div class="ribbon">
      <h1>CRUD APPLICATION</h1>
    </div>
  </div>

  <button class="btn btn-primary my-5">
    <a href="emp.php" class="text-light">Add Employee</a>
  </button>

  <table class="table">
    <thead class="thead-dark">
      <tr>
        <th scope="col">Employee ID</th>
        <th scope="col">Employee Name</th>
        <th scope="col">Employee Email</th>
        <th scope="col">Employee Mobile</th>
        <th scope="col">Password</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>

    <?php
    $sql = "Select * from employee";
    $result = mysqli_query($con, $sql);
    if ($result) {
      while ($row = mysqli_fetch_assoc($result)) {
        $ID = $row['emp_ID'];
        $name = $row['emp_name'];
        $email = $row['emp_email'];
        $mobile = $row['emp_mobile'];
        $password = $row['password'];
        
        $hidden_password = str_repeat('*', strlen($password));

        echo '<tr>
                <th scope="row">' . $ID . '</th>
                <td>' . $name . '</td>
                <td>' . $email . '</td>
                <td>' . $mobile . '</td>
                <td class="hidden-password">' . $hidden_password . '</td>
                <td>
                  <button class="btn btn-update"><a class ="text-light" href="update.php?updateemp_ID='.$ID.'">Update</a></button>
                  <button class="btn btn-delete"><a class ="text-light" href="delete.php?deleteemp_ID='.$ID.'">Delete</a></button>
                </td>
              </tr>';
      }
    }
    ?>

    </tbody>
  </table>
</div>
</body>
</html>
