<?php
include 'connect.php';

if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $mobile = $_POST['mobile'];

    // Insert query to add data to the database
    $sql = "INSERT INTO `crud` (id, name, email, password, mobile) 
            VALUES ('$id', '$name', '$email', '$password', '$mobile')";
    $result = mysqli_query($con, $sql);

    if ($result) {
        header('location: display.php'); // Redirect to display page
        exit();
    } else {
        die(mysqli_error($con));
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add User</title>
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
                <input type="text" class="form-control" id="exampleInputid" name="id" required>
            </div>
            <div class="mb-4">
                <label for="exampleInputname" class="form-label">Name</label>
                <input type="text" class="form-control" id="exampleInputname" name="name" required>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail" class="form-label">Email</label>
                <input type="email" class="form-control" id="exampleInputEmail" name="email" required>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword" class="form-label">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword" name="password" required>
            </div>
            <div class="mb-3">
                <label for="exampleInputMobile" class="form-label">Mobile</label>
                <input type="tel" class="form-control" id="exampleInputMobile" name="mobile" required>
            </div>
            <button type="submit" class="btn btn-primary w-10 p-2" name="submit">Submit</button>
        </form>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
