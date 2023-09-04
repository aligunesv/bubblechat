<?php

    while($row = mysqli_fetch_assoc($sql)){
        $sql2 = "SELECT * FROM messages WHERE (recieve_message_id = {$row['unique_id']}
                 OR sending_message_id = {$row['unique_id']}) AND (sending_message_id = {$sending_id}
                 OR recieve_message_id = {$sending_id}) ORDER BY message_id DESC LIMIT 1";

        $query2 = mysqli_query($conn, $sql2);
        $row2 = mysqli_fetch_assoc($query2);
        if(mysqli_num_rows($query2) > 0){
            $result = $row2['msg'];
        }else{
            $result = "No message available";
        }

        //eğer gönderilen mesaj 28 karakterden fazla ise yanına üç nokta ekleyerek kesiyoruz;
        (strlen($result) > 28) ? $msg = substr($result, 0, 28).'...' : $msg = $result;
        //Mesajdan önce eğer gönderen kişiysen 'you' eklemek için;
        //($sending_id == $row2['sending_message_id']) ? $you = "You: " : $you = "";
        //kullanıcı online veya online değil olduğunu buradan öğreniyoruz;
        ($row['status'] == "Offline now") ? $offline = "offline" : $offline = "";


        $output .= '<a href="chat.php?user_id='.$row['unique_id'].'">
                    <div class="content">
                            <img src="php/images/'. $row['img'] .' " alt="">
                            <div class="details">
                                <span>'. $row['fname']. " " . $row['sname'] .'</span>
                                <p>' /*. $you*/. $msg . '</p>
                            </div>
                            </div>
                            <div class="status-dot '. $offline .'"><i class="fas fa-circle"></i></div>
                    </a>';
    }
?>