<?php
include 'connect.php';

// Fetch the current record details for pre-population
if (isset($_GET['updateid'])) {
    $id = $_GET['updateid'];
    $sql = "SELECT * FROM `crud` WHERE id=$id";
    $result = mysqli_query($con, $sql);

    if (!$result || mysqli_num_rows($result) == 0) {
        die("No record found for ID: $id");
    }

    $row = mysqli_fetch_assoc($result);

    $name = $row['name'] ?? '';
    $email = $row['email'] ?? '';
    $password = $row['password'] ?? '';
    $mobile = $row['mobile'] ?? '';
}

// Update the record
if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $mobile = $_POST['mobile'];

    $sql = "UPDATE `crud` 
            SET name='$name', email='$email', password='$password', mobile='$mobile' 
            WHERE id=$id";

    $result = mysqli_query($con, $sql);

    if ($result) {
        header('location:display.php'); // Redirect to display page
        exit();
    } else {
        die("Error updating record: " . mysqli_error($con));
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(to right, #6a11cb, #2575fc);
            color: #fff;
        }
        .form-container {
            background: linear-gradient(to bottom, #f9f9f9, #e6e6e6);
            border-radius: 15px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
            padding: 30px;
        }
        .form-label {
            color: #6a11cb;
            font-weight: bold;
        }
        .btn-primary {
            background-color: #2575fc;
            border-color: #2575fc;
        }
        .btn-primary:hover {
            background-color: #6a11cb;
            border-color: #6a11cb;
        }
    </style>
</head>
<body>
<div class="container p-4 mt-5">
    <div class="form-container">
        <form method="post" action="">
            <div class="mb-4">
                <label for="exampleInputid" class="form-label">ID</label>
                <input type="text" class="form-control" id="exampleInputid" name="id" value="<?php echo $id; ?>" readonly>
            </div>
            <div class="mb-4">
                <label for="exampleInputname" class="form-label">Name</label>
                <input type="text" class="form-control" id="exampleInputname" name="name" value="<?php echo $name; ?>" required>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail" class="form-label">Email</label>
                <input type="email" class="form-control" id="exampleInputEmail" name="email" value="<?php echo $email; ?>" required>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword" class="form-label">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword" name="password" value="<?php echo $password; ?>" required>
            </div>
            <div class="mb-3">
                <label for="exampleInputMobile" class="form-label">Mobile</label>
                <input type="tel" class="form-control" id="exampleInputMobile" name="mobile" value="<?php echo $mobile; ?>" required>
            </div>
            <button type="submit" class="btn btn-primary w-10 p-2" name="submit">Update</button>
        </form>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
