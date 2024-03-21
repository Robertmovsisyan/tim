<?php
      include_once "config.php";
      $sql = 'SELECT * FROM users';
      $result = mysqli_query($connect, $sql);
      
      if ($result) {
          while ($row = mysqli_fetch_assoc($result)) {
              echo '<a href="update.php?id=' . $row['id'] . '">' . $row['name'] .' '.$row['email']. '</a><br>';
          }
      } else {
          echo "Error executing the query: " . mysqli_error($connect);
      }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

      
        <form action="insert.php" method="post" enctype="multipart/form-data">

        <input type="text" name="name" placeholder="enter name" require><br><br>
        <input type="email" name="email" placeholder="enter email" require><br><br>
          <input type="file" name="image"><br><br>

        <input type="submit" name="submit" value="Submit">

      </form>
    
</body>
</html>