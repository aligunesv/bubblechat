<?php
    session_start();
    if(!isset($_SESSION['unique_id'])){
        header("location: login.php");
    }
?>

<?php include_once "header.php";?> <!--HEADERI KULLANMAK İÇİN YAZIYORUZ--> 
    <body>
        <div class="wrapper">
            <section class="chatScene">
                <header>
                    <?php 
                            include_once "php/config.php";
                            $user_id = mysqli_real_escape_string($conn, $_GET['user_id']);
                            $sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$user_id}");
                            if(mysqli_num_rows($sql) > 0){
                                $row = mysqli_fetch_assoc($sql);
                            }
                        ?>
                    <a href="user.php" class="backIcon"><i class="fas fa-arrow-left"></i></a>
                    <img src="php/images/<?php echo $row['img'] ?>" alt="">
                    <div class="details">
                        <span><?php echo $row['fname']. " " . $row['sname']?></span>
                        <p><?php echo $row['status'] ?></p>
                    </div>
                </header> 
                <div class="chatBox">

                </div>
                <form action="#" class="typingArea" autocomplete="off">
                    <input type="text" name="sending_id" value="<?php echo $_SESSION['unique_id']; ?>" hidden>
                    <input type="text" name="recieve_id" value="<?php echo $user_id; ?>" hidden>
                    <input class="inputField" name="message" type="text" placeholder="Type a message here.">
                    <button><i class="fab fa-telegram-plane"></i></button>
                </form>
            </section>
        </div>

        <script src="javascript/chat.js"></script>

    </body>
</html>