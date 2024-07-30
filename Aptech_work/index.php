<?php
include('connection.php')
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bootstrap Form</title>
  <!-- Bootstrap CSS CDN -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

  <div class="container mt-5">
    <h2>Sample Form</h2>
    <form action="" method="post">
      <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" name="name" id="name" placeholder="Enter your name">
      </div>
      <div class="form-group">
        <label for="email">Email address</label>
        <input type="email" class="form-control" name="email" id="email" placeholder="Enter your email">
      </div>
      <div class="radio-container">
        <label>
          <input type="radio" name="gender" value="male">
          Male
        </label>
        <label>
          <input type="radio" name="gender" value="female">
          Female
        </label>
      </div>
      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" name="pass" id="password" placeholder="Password">
      </div>
      <button type="submit" class="btn btn-primary" name="btn">Submit</button>
    </form>
  </div>

  <!-- Bootstrap JS and dependencies -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>


<?php

if (isset($_POST['btn'])) {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $pass = $_POST['pass'];
  $gender = isset($_POST['gender']);



  $query = mysqli_query($mysqli, "INSERT INTO `demodata`(`uname`, `uemail`,`gender`, `pass`) VALUES ('$name','$email','$gender','$pass')");

  if ($query) {
    echo "<script>alert ('data inserted')</script>";
  } else {
    echo "<script>alert ('data not inserted')</script>";
  }
}

?>