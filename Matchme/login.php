<?php
  //Check for form values
  session_start();
  $form_values=$_SESSION['form values'] ?? null;

  // Clear form values
  unset($_SESSION['form_values']);
  
?>



<body>
<?php 
    require('header.php');
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
<body>
    <?php include_once('notification.php') ?>
    <section>  
        <h1 class="display-5">Log In</h1>
        <p>
          Make dressing easier!
        </p>
        <hr class="my-4">
      </section>

      <section class="mb-5">
        <form action="./authenticate.php" method="post">
            <div class="form-group">
                <label for="email">Email</label>
                <input class="form-control" type="email" name="email" placeholder="example@gmail.com" required value="<?= $form_values['email'] ?? null ?>">
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input class="form-control" type="password" name="password" required>
            </div>

          <!-- Add the recaptcha field -->
          <input type="hidden" name="recaptcha_response" id="recaptchaResponse">

          <button class="btn btn-primary" href="register.php">Register</button>
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