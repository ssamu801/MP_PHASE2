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
		    <div id="title">
			    <h2>Select a dish to update/modify</h2>
		    </div>
            <?php
                $dishQuery = mysqli_query($conn, "SELECT * FROM dish ");

                while ($dish = mysqli_fetch_assoc($dishQuery)) {
                    $id = $dish['dishID'];
                    $name = $dish['dishName'];
                    echo "<a href='modify.php?dish=$id'>$name</a> <br>";
                }
            ?>    
                <br>
        </div>
    </main>
</body>
</html>