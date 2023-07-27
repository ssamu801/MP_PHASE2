<?php include 'connect.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Update/Modify Dish</title>
    <?php include 'connect.php'; ?>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <?php include 'navbar.php'; ?>

    <main>
        <div>
        <?php
            $id = $_GET['dish'];
            $name;
            $price;
            $category;
            $dishQuery = mysqli_query($conn, "SELECT * FROM dish WHERE dishID=$id");

            while ($dish = mysqli_fetch_assoc($dishQuery)) {
                $id = $dish['dishID'];
                $name = $dish['dishName'];
                $price =  $dish['dishPrice'];
                $dcategory = $dish['dishCategory'];

            }
            ?>    
		    <div id="title">
			    <h2>Modify <?php echo $name; ?></h2>
		    </div>

            <form action="updateDB.php" method="POST">

                <input type="hidden" name="dishID" value="<?php echo $id; ?>">

                <label for="dishName">Dish Name:</label>
                <input type='text' name='dishName' value='<?php echo $name; ?>'required><br><br>

                <label for="dishCategory">Dish Category:</label>
                <select name="dishCategory" class="dishCategory" required>
                <?php
                    $categQuery = mysqli_query($conn, "SELECT * FROM dish_category ");

                    while ($category = mysqli_fetch_assoc($categQuery)) {
                        $categoryName = $category['categoryName'];
                        if ($categoryName === $dcategory) {
                            echo '<option value="' . $categoryName . '" selected>' . $categoryName . '</option>';
                        } else {
                            echo '<option value="' . $categoryName . '">' . $categoryName . '</option>';
                        }
                    }
                 ?>
                </select>


                <br><br>

                <label for="dishPrice">Dish Price:</label>
                <input type='number' name='dishPrice' step="0.01" size='5' min="1" value='<?php echo $price; ?>' required>
        
                <input type="Submit" value="Update Dish">
                <br>
            </form>
            
                <br>
        </div>
    </main>
</body>
</html>