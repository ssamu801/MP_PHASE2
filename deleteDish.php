<!DOCTYPE html>
<html>
<head>
    <title>Delete Dish</title>
    <?php include 'connect.php'; ?>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <?php include 'navbar.php'; ?>

    <main>
        <div>
		    <div id="title">
            
            <?php
                if ($_SERVER["REQUEST_METHOD"] === "POST") {
                    $id = $_POST['dishID'];
                    $name = $_POST['dishName'];
                    echo "Delete dish ".$name." ? <br>";

                    echo '
                        <form action="deleteDB.php" method="POST">
                            <input type="hidden" name="dishID" value="'.$id.'">
                            <input type="hidden" name="dishName" value="'.$name.'">
                            <input type="submit" value="Yes">
                            <br>
                        </form>
                    ';
                }
                else{
            ?>
			    <h2>Select a dish to delete</h2>
		    </div>
            <?php
                $dishQuery = mysqli_query($conn, "SELECT * FROM dish ");

                while ($dish = mysqli_fetch_assoc($dishQuery)) {
                    $id = $dish['dishID'];
                    $name = $dish['dishName'];
                    echo '
                        <form action="deleteDish.php" method="POST">
                            <input type="hidden" name="dishID" value="'.$id.'">
                            <input type="hidden" name="dishName" value="'.$name.'">
                            <input type="submit" value="' . $name . '" style="font-size: 16px;background-color: transparent; border: none;">
                            <br>
                        </form>
                    ';
                }
                }
            ?>    
                <br>
        </div>
    </main>
</body>
</html>