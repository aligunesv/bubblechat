<?php
    session_start();
    if(isset($_SESSION['unique_id'])){
        include_once "config.php";
        $sending_id = mysqli_real_escape_string($conn, $_POST['sending_id']);
        $recieve_id = mysqli_real_escape_string($conn, $_POST['recieve_id']);
        $output = "";

        $sql = "SELECT * FROM messages 
                LEFT JOIN users ON users.unique_id = messages.recieve_message_id
                WHERE (sending_message_id = {$sending_id} AND recieve_message_id = {$recieve_id})
                OR (sending_message_id = {$recieve_id} AND recieve_message_id = {$sending_id}) ORDER BY message_id";

        $query = mysqli_query($conn, $sql);
        if(mysqli_num_rows($query) > 0){
            while($row = mysqli_fetch_assoc($query)){
                if($row['sending_message_id'] === $sending_id){ //if this is equal msg sender
                    $output .= '<div class="chat send">
                                    <div class="details">
                                        <p>'. $row['msg'] .'</p>
                                    </div>
                                </div>';
                }else{////if this is equal msg reciever
                    $output .= '<div class="chat recieve">
                                    <img src="php/images/'. $row['img'] .'" alt="">
                                    <div class="details">
                                        <p>'. $row['msg'] .'</p>
                                    </div>
                                </div>';
                }
            }
            echo $output;
        }

    }else{
        header("../login.php");
    }
?>