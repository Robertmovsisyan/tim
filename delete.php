<?php 


if (isset($_POST["delete"])) {
    include_once "config.php";

    if (isset($_POST["id"])) {
        $id = mysqli_real_escape_string($connect, $_POST["id"]);

        $sql = "DELETE FROM users WHERE id = '$id'";
         mysqli_query($connect, $sql);
      
            header("Location: index.php");
        }
    }
?>