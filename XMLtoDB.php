<?php include 'connect.php'; ?>

<?php

$xml = simplexml_load_file("dishes_xmldata.xml") or die("Error: Cannot create object");


foreach ($xml->children() as $row) {
    $id = $row->id;
    $name = $row->name;
    $category = $row->category;
    $price = $row->price; 
    $img = $row->img; 

    $query = "SELECT * FROM dish WHERE dishID=$id ";
    $result = mysqli_query($conn, $query);    
 
    if (mysqli_num_rows($result) == 0) {
      $sql = "INSERT INTO dish(dishID, dishName, dishCategory, dishPrice, img) VALUES ('" . $id . "','" . $name . "','" . $category . "','" . $price . "','" . $img . "')";
      $result = mysqli_query($conn, $sql);
    }
      

  }

  echo '<a href="addDish.php">Add another dish</a><br>';
  echo '<a href="homePage.php">Home</a>';


?>