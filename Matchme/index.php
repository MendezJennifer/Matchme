<?php 
    require('header.php'); 
    
    //Check for form values
    session_start();
    $form_values=$_SESSION['form values'] ?? null;

    // Clear form values
    unset($_SESSION['form_values']);

    include_once('notification.php'); 
?>
    <header>
        <section>
            <div>
                <h1> Matchme</h1>
                <h2> Welcome to your virtual closet! </h2>
            </div>    
        </section>
    </header>
        <section>
            <h2> <strong>Log In </strong></h2>
            <h3>Revolutionalize your closet!</h3>
        </section>

        <section class="mb-5">
            <form action="./authenticate.php" method="post">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input class="form-control" type="email" name="email" placeholder="example@gmail.com" value="<?= $form_values['email'] ?? null ?>" required>
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input class="form-control" type="password" name="password" required>
                </div>

                <!-- Add the recaptcha field -->
                <input type="hidden" name="recaptcha_response" id="recaptchaResponse">

                <a class="btn btn-primary" href="register.php">Register</a>
                <button class="btn btn-primary" type="submit">Login</button>
            </form>
      </section>

        <!-- Add the recaptcha scripts -->
        <?php include_once('recaptcha.php') ?>

        <script src="https://www.google.com/recaptcha/api.js?render=<?= SITEKEY ?>"></script>
        <script>
            grecaptcha.ready(() => 
            {
                grecaptcha.execute("<?= SITEKEY ?>", { action: "register" })
                .then(token => document.querySelector("#recaptchaResponse").value = token)
                .catch(error => console.error(error));
            });
        </script>      
    </body>
</html>
<?php  require('footer.php'); ?>