<?php
    $conn = mysqli_connect("localhost", "root", "p@ssword") or die ("Unable to connect!". mysqli_error());
    mysqli_select_db($conn, "dbclient_side");
?>