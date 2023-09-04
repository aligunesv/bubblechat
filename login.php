<?php include_once "header.php";?>
    <body>
        <div class="wrapper">
            <section class="form login">
                <header><h1>BUBBLE CHAT</h1></header>
                <form action="#">
                    <div class="errorMessage"></div>
                        <div class="field input">
                            <label>E-mail Adress</label>
                            <input type="text" placeholder="Please enter your E-Mail Adress..." name="email">
                        </div>
                        <div class="field input">
                            <label>Password</label>
                            <input type="password" placeholder="Please enter your password..." name="password">
                            <i class="fas fa-eye"></i>
                        </div>
                        <div class="field button">
                            <input type="submit" value="Continue">
                        </div>
                </form>
                <div class="link">You don't have an account? <a href="index.php">Sign Up!</a></div>
            </section>
        </div>

        <script src="javascript/pass-show-hide.js"></script>
        <script src="javascript/login.js"></script>


    </body>
</html>