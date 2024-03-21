<?php
    include_once "config.php";
    include_once "config.php";
    $sql = 'SELECT * FROM users WHERE id="'.$_GET['id'].'"';
    $result = mysqli_query($connect, $sql);
    $row=mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

      
        <form action="updateAction.php" method="post" enctype="multipart/form-data">
        
        <input type="hidden" name="id" value="<?= $row['id'] ?>">

        <input type="text" name="name" placeholder="enter name" value="<?= $row['name']?>" require><br><br>
        <input type="email" name="email" placeholder="enter email" value="<?=$row['email']?>" require><br><br>

         <img src="<?= $row['image']?>" alt=" "  style="with:200px; height: 200px;" ><br><br>
          <input type="file" name="image"><br><br>

        <input type="submit" name="update" value="update"><br><br>

      </form>

      <form action="delete.php" method="post">
          <input type="hidden" value="<?= $row['id']?>" name="id">
        <input type="submit" name="delete" value="Delete">

      </form>    
</body>
</html>