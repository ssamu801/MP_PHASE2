<?php include 'connect.php'; ?>

<?php

$xml = simplexml_load_file("dishes_xmldata.xml") or die("Error: Cannot create object");


foreach ($xml->children() as $row) {
    echo $id = $row->id;
    echo $name = $row->name;
    echo $category = $row->category;
    echo $price = $row->price;
    echo "<br />";  
      $sql = "INSERT INTO dish(dishID, dishName, dishCategory, dishPrice) VALUES ('" . $id . "','" . $name . "','" . $category . "','" . $price . "')";
      
      $result = mysqli_query($conn, $sql);

  }


?>