<!DOCTYPE html>
<html>
<head>
    <title>View Dishes</title>
    <?php include 'connect.php'; ?>
    <link rel="stylesheet" type="text/css" href="style.css">
    <style>
        /* Create a flex container with flex-wrap set to wrap */
        .image-container {
            display: flex;
            flex-wrap: wrap;
        }

        /* Set a margin for each image to create spacing */
        .image-container img {
            width: 350px;
            margin: 10px; /* Adjust the margin as needed for spacing */
        }
    </style>
</head>
<body>
    <?php include 'navbar.php'; ?>

    <main>
        <div class="image-container">
            <?php
                $dishQuery = mysqli_query($conn, "SELECT * FROM dish ");

                while ($dish = mysqli_fetch_assoc($dishQuery)) {
                    $id = $dish['dishID'];
                    $name = $dish['dishName'];
                    $img = $dish['img'];
                    echo "<img src='$img'>";
                }
            ?>    
        </div>
    </main>
</body>
</html>
