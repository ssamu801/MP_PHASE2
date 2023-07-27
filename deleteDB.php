<?php include 'connect.php'; ?>
<?php
    if ($_SERVER["REQUEST_METHOD"] === "POST") {

        $id = $_POST['dishID'];
        $name = $_POST['dishName'];

        $query = "DELETE FROM dish WHERE dishID = '$id'";
        $result = mysqli_query($conn, $query);
    
        if ($result) {
            echo "Dish ". $name ." successfully deleted.<br>";
            echo '<a href="homePage.php">Home</a>';
        } else {
            echo "Error updating data: " . mysqli_error($conn);
        }
    }
?>