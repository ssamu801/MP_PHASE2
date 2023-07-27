<?php include 'connect.php'; ?>

<?php
    $maxIDQuery = "SELECT MAX(dishID) AS max_value FROM dish";
    $result = mysqli_query($conn, $maxIDQuery);    
    $row = mysqli_fetch_assoc($result);
    $id = $row['max_value'] + 1;

?>

<?php
    $dishName = $_POST['dishName'];
    $dishCategory = $_POST['dishCategory'];
    $dishPrice = $_POST['dishPrice'];

    echo  $dishName;
    echo $dishCategory;
    echo $dishPrice;
    
    if(file_exists("dishes_xmldata.xml")){
        $dishes = simplexml_load_file('dishes_xmldata.xml');
        $dish = $dishes->addChild("dish");
        $dish->addChild('id', $id);
        $dish->addChild('name', $dishName);
        $dish->addChild('category', $dishCategory);
        $dish->addChild('price', $dishPrice);
        file_put_contents('dishes_xmldata.xml', $dishes->asXML());

        header("Location: XMLtoDB.php");
        exit();
    }
    else{
        $dishes = new SimpleXMLElement('<dishes></dishes>');

        $dishes->addAttribute("xmlns:xsi", "http://www.w3.org/2001/XMLSchema-instance");
        $dishes->addAttribute("xsi:noNamespaceSchemaLocation", "dishes.xsd");

        $dish = $dishes->addChild("dish");
        $dish->addChild('id', $id);
        $dish->addChild('name', $dishName);
        $dish->addChild('category', $dishCategory);
        $dish->addChild('price', $dishPrice);

        $dishes->asXML("dishes_xmldata.xml");

        header("Location: XMLtoDB.php");
        exit();
    }
    
?>