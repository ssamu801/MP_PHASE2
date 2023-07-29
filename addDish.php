<!DOCTYPE html>
<html>
<head>
    <title>New Dish</title>
    <?php include 'connect.php'; ?>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <?php include 'navbar.php'; ?>

    <main>
        <div class>
		    <div id="title">
			    <h2>Add a New Dish</h2>
		    </div>
            <form action="addDishToXML.php" method="POST" enctype="multipart/form-data">

            <label for="dishName">Dish Name:</label>
            <input type='text' name='dishName' required><br><br>

            <label for="dishCategory">Dish Category:</label>
            <select name="dishCategory" class="dishCategory" required>
            <option value="" disabled selected hidden></option>

            <?php
                 $categQuery = mysqli_query($conn, "SELECT * FROM dish_category ");

                    while ($category = mysqli_fetch_assoc($categQuery)) {
                        echo '<option value="' . $category['categoryName'] . '">' . $category['categoryName'] . '</option>';
                    }
                 
            ?>
            </select>

                <br><br>

                <label for="dishPrice">Dish Price:</label>
                <input type='number' name='dishPrice' step="0.01" size='5' min="1" required>

                <br><br>
                <label for="image">Select an image:</label>
                <input type="file" name="image" required />
                <br><br>
        
                <input type="Submit" value="Add Dish">
                <br>
            </form>
        </div>
    </main>
</body>
</html>