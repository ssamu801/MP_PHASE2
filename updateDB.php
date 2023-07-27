<?php include 'connect.php'; ?>
<?php
    if ($_SERVER["REQUEST_METHOD"] === "POST") {

        $id = $_POST['dishID'];
        $name = $_POST['dishName'];
        $price = $_POST['dishPrice'];
        $category = $_POST['dishCategory'];
    
        $query = "UPDATE dish SET dishName = '$name', dishPrice = '$price', dishCategory = '$category' WHERE dishID = '$id'";
    
        $result = mysqli_query($conn, $query);
    
        // Check if the update was successful
        if ($result) {
            echo "Dish updated successfully with the following values: <br>.";
            echo "Dish Name: ".$name."<br>";
            echo "Dish Category: ".$category."<br>";
            echo "Dish Price: ".$price."<br>";

            echo '<a href="homePage.php">Home</a>';
        } else {
            echo "Error updating data: " . mysqli_error($conn);
        }
    }
?>