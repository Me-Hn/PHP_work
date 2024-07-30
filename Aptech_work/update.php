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
    <h2>update Form</h2>
    <form action="" method="post">

      <?php
     
      if (isset($_GET['id'])) {
        $up = $_GET['id'];
      
        $fet2 = mysqli_query($mysqli, "select * from demodata where id=$up");
        $excist = mysqli_fetch_assoc($fet2);
      }

      ?>
      <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" name="upname" id="name" placeholder="Enter your name" value="<?php echo  $excist['uname']?>">
      </div>
      <div class="form-group">
        <label for="email">Email address</label>
        <input type="email" class="form-control" name="upemail" id="email" placeholder="Enter your email" value="<?php echo  $excist['uemail']?>">
      </div>
      <div class="radio-container">
        <label>
          <input type="radio" name="upgender"  value="male" <?php if($excist['gender'] == 'male') echo 'checked'; ?>>
          Male
        </label>
        <label>
          <input type="radio" name="upgender"  value="female" <?php if($excist['gender'] == 'female') echo 'checked'; ?>>
          Female
        </label>
      </div>
      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" name="uppass" id="password" placeholder="Password" value="<?php echo $excist['pass'];?>">
      </div>
      <button type="submit" class="btn btn-primary" name="btn_update">Submit</button>
    </form>
  </div>

  <!-- Bootstrap JS and dependencies -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>


<?php

if (isset($_POST['btn_update'])) {
  $upname =  $_POST['upname'];
  $upemail = $_POST['upemail'];
  $upgender = $_POST['upgender'];
  $uppass =  $_POST['uppass'];


  $uprow = mysqli_query($mysqli, "UPDATE `demodata` SET `uname`='$upname',`uemail`='$upemail',`gender`='$upgender',`pass`='$uppass' WHERE id='$up' ");
if($uprow){
 echo "<script>alert ('Data Updated')
 window.location.href='select.php';</script>";
}else{
  echo "<script>alert ('Data Not Updated')</script>";
}

}

?>