<?php 
    session_start();
    if(isset($_SESSION['unique_id'])){ //Eğer kullanıcı giriş yaptıysa
        header("location: users.php"); 
    }
?>

<?php include_once "header.php";?>
    <body>
        <div class="wrapper">
            <section class="form signup">
                <header><h1>BUBBLE CHAT</h1></header>
                <form action="#" enctype="multipart/form-data">
                    <div class="errorMessage"></div>
                    <div class="nameDetail">
                        <div class="field input">
                            <label>First Name</label>
                            <input type="text" placeholder="Name" name="fname" required>
                        </div>
                        <div class="field input">
                            <label>Surname</label>
                            <input type="text" placeholder="Surname" name="sname" required>
                        </div>
                    </div>
                        <div class="field input">
                            <label>E-mail Adress</label>
                            <input type="text" placeholder="E-mail Adress" name="email" required>
                        </div>
                        <div class="field input">
                            <label>Password</label>
                            <input type="password" placeholder="Password" name="password" required>
                            <i class="fas fa-eye"></i>
                        </div>
                        <div class="field image">
                            <label>Select Image</label>
                            <input type="file" name="image" required>
                        </div>
                        <div class="field button">
                            <input type="submit" value="Continue">
                        </div>
                </form>
                <div class="link">You have an account? <a href="login.php">Login!</a></div>
            </section>
        </div>

        <script src="javascript/pass-show-hide.js"></script>
        <script src="javascript/signup.js"></script>

    </body>
</html>