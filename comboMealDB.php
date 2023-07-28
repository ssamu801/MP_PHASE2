<?php include 'connect.php'; ?>
<?php
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
   
        //for contentID in table combo_content
        $maxIDQuery = "SELECT MAX(contentid) AS max_value FROM combo_content";
        $result = mysqli_query($conn, $maxIDQuery);    
        $row = mysqli_fetch_assoc($result);
        $contentid = $row['max_value'] + 1;

        //for comboID in table combo_content
        $maxIDQuery = "SELECT MAX(comboID) AS max_value FROM combo_content";
        $result = mysqli_query($conn, $maxIDQuery);    
        $row = mysqli_fetch_assoc($result);
        $holder = $row['max_value'];
        $comboID = $row['max_value'] + 1;


        $mainID = $_POST['mainDish'];
        $sideID = $_POST['sideDish'];
        $drinkID = $_POST['drink'];
        $discount = $_POST['discount'];
        $comboName = $_POST['comboName'];

        echo $mainID;
        echo $sideID;
        echo $drinkID;
        echo $discount;
        $combo = [];

        $mainQuery = mysqli_query($conn, "SELECT * FROM dish WHERE dishID=$mainID");
            while ($dish = mysqli_fetch_assoc($mainQuery)) {
                $combo[] = $dish['dishName'];
            }

        $sideQuery = mysqli_query($conn, "SELECT * FROM dish WHERE dishID=$sideID");
            while ($dish = mysqli_fetch_assoc($sideQuery)) {
                $combo[] = $dish['dishName'];
            }

        $drinkQuery = mysqli_query($conn, "SELECT * FROM dish WHERE dishID=$drinkID");
            while ($dish = mysqli_fetch_assoc($drinkQuery)) {
                $combo[] = $dish['dishName'];
            }

        /*
        for loop max value of combo ID then nested loop to check each dish and counter. if count == 3 then combo already exists 
        */    

        $comboLength = count($combo);

        // check if combo already exists
        $counter = 0;
        for ($i = 1; $i <= $holder; $i++) {
            $sql = "SELECT * FROM combo_content WHERE comboID=$i";
            $result = mysqli_query($conn, $sql); 
        
            while ($res = mysqli_fetch_assoc($result)) {
                for ($j = 0; $j < $comboLength; $j++) {
                    if ($combo[$j] == $res['foodName']) {
                        $counter++;
                    }
                }
            }
        }
        

        if($counter == 3){
            echo "meron na nyan teh";
        }
        else{
            $query = "INSERT INTO food_combo (comboID, comboName, discount) VALUES($comboID, '$comboName', $discount);";
            $result = mysqli_query($conn, $query);
            echo "combo name: ".$comboName."<br>";

            for($i = 0; $i < $comboLength; $i++){
                echo "combo id: ".$comboID."<br>";
                echo "content id: ".$contentid."<br>";
                echo "dish: ".$combo[$i]."<br>";
            
                $contentQuery = "INSERT INTO combo_content (contentID, comboID, foodName) VALUES($contentid, $comboID, '$combo[$i]');";
                $result = mysqli_query($conn, $contentQuery);
                $contentid++;
            }   
        }

        /*
        $query = "INSERT INTO food_combo (comboID, comboName, discount) VALUES($comboID, '$comboName', $discount);";
        $result = mysqli_query($conn, $query);
        echo "combo name: ".$comboName."<br>";
        for($i = 0; $i < $comboLength; $i++){
            echo "combo id: ".$comboID."<br>";
            echo "content id: ".$contentid."<br>";
            echo "dish: ".$combo[$i]."<br>";
            
            $contentQuery = "INSERT INTO combo_content (contentID, comboID, foodName) VALUES($contentid, $comboID, '$combo[$i]');";
            $result = mysqli_query($conn, $contentQuery);
            $contentid++;
        }
        */
        echo '<a href="homePage.php">Home</a>';
    
        /*
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
        

        */
    }
?>