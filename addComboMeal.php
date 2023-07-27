<!DOCTYPE html>
<html>
<head>
    <title>Add Combo Meal</title>
    <?php include 'connect.php'; ?>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <?php include 'navbar.php'; ?>

    <main>
        <div>
		    <div id="title">
			    <h2>Add a New Combo Meal</h2>
		    </div>
            <form action="comboMealDB.php" method="POST">

            <label for="comboName">Combo Meal Name:</label>
            <input type='text' name='comboName' required>
            <br><br>

            <label for="dishCategory">Select a Main Dish:</label>
            <select name="mainDish" required>
            <option value="" disabled selected hidden></option>

            <?php
                 $mainQuery = mysqli_query($conn, "SELECT * FROM dish WHERE dishCategory='Mains'");

                    while ($dish = mysqli_fetch_assoc($mainQuery)) {
                        echo '<option value="' . $dish['dishID'] . '">' . $dish['dishName'] . '</option>';
                    }
                 
            ?>
            </select>

            <br><br>
            
            <label for="dishCategory">Select a Side Dish:</label>
            <select name="sideDish" required>
            <option value="" disabled selected hidden></option>

            <?php
                 $sideQuery = mysqli_query($conn, "SELECT * FROM dish WHERE dishCategory='Sides'");

                    while ($dish = mysqli_fetch_assoc($sideQuery)) {
                        echo '<option value="' . $dish['dishID'] . '">' . $dish['dishName'] . '</option>';
                    }
                 
            ?>
            </select>

            <br><br>
            
            <label for="dishCategory">Select a Drink:</label>
            <select name="drink" required>
            <option value="" disabled selected hidden></option>

            <?php
                 $drinkQuery = mysqli_query($conn, "SELECT * FROM dish WHERE dishCategory='Drinks'");

                    while ($dish = mysqli_fetch_assoc($drinkQuery)) {
                        echo '<option value="' . $dish['dishID'] . '">' . $dish['dishName'] . '</option>';
                    }
                 
            ?>
            </select>

            <br><br>

            <label for="discount">Combo Meal Discount (input in decimal):</label>
            <input type='text' name='discount' pattern="^\d+(\.\d{1,2})?$" title="Enter a valid decimal number (e.g., 0.50)" required>


                <br><br>    

            <input type="Submit" value="Add Combo Meal">
            </form>
        </div>
    </main>
</body>
</html>