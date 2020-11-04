<?php include("path.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

   <!--Font Awesome-->
   <script src="https://kit.fontawesome.com/c6b78effb2.js" crossorigin="anonymous"></script>

   <!--Google Fonts-->
   <link href="https://fonts.googleapis.com/css2?family=Candal&family=Libre+Caslon+Display&family=Lora:ital@1&display=swap" rel="stylesheet">



   <!--Css-->
   <link rel="stylesheet" href="assets/css/style.css">

  <title>Login</title>
</head>
<body>

  <?php include(ROOT_PATH . "/app/includes/header.php"); ?>

  <div class="auth-content">

    <form action="app/function.php?action=login" method="post">
        <h1 class="form-title">Login</h1>

         <!--Error message-->
        
        <!--<div class="msg success error">
            <li>Username required</li>
        </div>-->

        <div>
            <label>Username</label>
            <input type="text" name="username" class="text-input">
        </div>
        
        <div>
            <label>Password</label>
            <input type="text" name="password" class="text-input">
        </div>
        
        <div><button type="submit" name="login-btn" class="btn btn-big">Login</button></div>

        <p>Don't have an account? <a href="<?php echo BASE_URL . '/register.php'?>">Register/Sign Up</a></p>
    </form>

  </div>


  <!-- JQuery -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
   

  <!-- Custom Script-->
  <script src="assets/js/scripts.js"></script>

</body>

</html>