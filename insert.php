<?php
    include_once "config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = mysqli_real_escape_string($connect, $_POST["name"]);
    $email = mysqli_real_escape_string($connect, $_POST["email"]);

    $image = $_FILES["image"];
    $imageName = $image["name"];
    $imageTmpName = $image["tmp_name"];
    $imageError = $image["error"];

    if ($imageError === UPLOAD_ERR_OK) {
        $imageDestination = "image/" . $imageName;

        if (move_uploaded_file($imageTmpName, $imageDestination)) {
            $sql = "INSERT INTO users (name, email, image) VALUES ('$name', '$email', '$imageDestination')";
            if (mysqli_query($connect, $sql)) {
                header('Location:index.php');
            } else {
                echo "Error: " . mysqli_error($connect);
            }
        } else {
            echo "Error uploading image.";
        }
    } else {
        echo "Error uploading image: " . $imageError;
    }

}
?>
