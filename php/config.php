<?php
    $conn = mysqli_connect("localhost", "root", "", "chatappdatabase");
    if(!$conn){
        echo "Database connected" . mysqli_connect_error();
    }

?>