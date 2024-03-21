<?php
session_start();
include_once "config.php"; 

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $name = mysqli_real_escape_string($connect, $_POST['name']);
    $email = mysqli_real_escape_string($connect, $_POST['email']);

    if ($_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $uploadDir = "image/"; 
        $imageTmpName = $_FILES['image']['tmp_name'];
        $imageType = $_FILES['image']['type'];

        $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
        if (!in_array($imageType, $allowedTypes)) {
            exit("Error: Only JPG, PNG, and GIF images are allowed.");
        }

        $imageName = uniqid('image_') . '.' . pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
        $targetPath = $uploadDir . $imageName;

        if (move_uploaded_file($imageTmpName, $targetPath)) {
            $sql = "UPDATE users SET name='$name', email='$email', image='$targetPath' WHERE id=$id";
        } else {
            exit("Error uploading image.");
        }
    } else {
        $sql = "UPDATE users SET name='$name', email='$email' WHERE id=$id";
    }

    $result = mysqli_query($connect, $sql);

    if ($result) {
        header('Location: index.php'); 
        exit();
    } else {
        echo "Error updating user information: " . mysqli_error($connect);
    }
}
?>
