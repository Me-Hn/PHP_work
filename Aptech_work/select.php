<?php
include('connection.php');

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Panel</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- fontawosome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <!-- Custom CSS -->

    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Arial', sans-serif;
        }

        .panel-container {
            max-width: 1000px;
            margin: 50px auto;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .panel-header {
            background-color: #007bff;
            color: #ffffff;
            padding: 15px 20px;
            text-align: center;
            font-size: 24px;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 1.2px;
        }

        .table-container {
            padding: 20px;
        }

        .table th {
            background-color: #007bff;
            color: #ffffff;
            font-weight: 600;
            text-align: center;
            text-transform: uppercase;
            letter-spacing: 1.2px;
        }

        .table td {
            text-align: center;
            vertical-align: middle;
        }

        .table-hover tbody tr:hover {
            background-color: #f1f1f1;
        }

        .table thead th {
            border-bottom: 2px solid #dee2e6;
        }

        .btn-action {
            display: inline-block;
            margin-right: 5px;
        }

        i {
            margin-left: 10px;
        }

        .demo {
            background-color: yellow;
        }
    </style>
</head>

<body>
    <div class="panel-container">
        <div class="panel-header">
            User Information
        </div>
        <div class="table-container">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Gender</th>
                        <th>Password</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Data rows will be populated here -->
                    <?php
                    $fet = mysqli_query($mysqli, "select * from demodata");
                    while ($row = mysqli_fetch_assoc($fet)) {

                    ?>
                        <tr>
                            <td><?php echo $row['id'] ?></td>
                            <td><?php echo $row['uname'] ?></td>
                            <td><?php echo $row['uemail'] ?></td>
                            <td><?php echo $row['gender'] ?></td>
                            <td><?php echo $row['pass'] ?></td>
                            <td>
                                <a href="update.php?id=<?php echo $row['id']; ?>" class="btn btn-sm btn-info btn-action">Edit</a>
                                <a href="select.php?id=<?php echo $row['id']; ?>" onclick="return confirm ('Are you sure you want to delete this record?')" class="btn btn-sm btn-danger btn-action" name="delt"> Delete<i class="fas fa-trash-alt"></i></a>
                            </td>
                        </tr>
                    <?php
                    } ?>
                    <!-- More data rows -->
                </tbody>
            </table>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>

<?php
if (isset($_GET['id'])) {

    $del = $_GET['id'];
    $del_row = mysqli_query($mysqli, "DELETE FROM `demodata` WHERE id='$del' ");

    if ($del_row) {
        echo "<script>
                alert('The Row has been deleted');
                window.location.href = 'select.php'; 
              </script>";
    } else {
        echo "<script>alert('The Row has NOT been deleted');</script>";
    }
}
?>