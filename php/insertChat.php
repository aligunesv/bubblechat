<?php
    session_start();
    if(isset($_SESSION['unique_id'])){
        include_once "config.php";
        $sending_id = mysqli_real_escape_string($conn, $_POST['sending_id']);
        $recieve_id = mysqli_real_escape_string($conn, $_POST['recieve_id']);
        $message = mysqli_real_escape_string($conn, $_POST['message']);
        
        if(!empty($message)){
            $sql =  mysqli_query($conn, "INSERT INTO messages (sending_message_id, recieve_message_id, msg)
                                VALUES({$sending_id}, {$recieve_id}, '{$message}')") or die();
        }
        
    }else{
        header("../login.php");
    }
?>