<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="css/reset.css">
  <link rel="stylesheet" href="css/style.css">
  <title>Motorsports Bucketlist</title>
</head>
<body>
  <main>
    <header>
      <h1 class="header__title">Motor<span class="red-bold">sports</span> Bucketlist</h1>
      <p class="header__undertitle">Your dreams starts here</p>
    </header>

    <nav class="navigation">
      <li><a href="index.php"><img src="./assets/icons/user.png"/></a></li>
      <?php if(!empty($_SESSION["logged"])): ?>
        <li><a href="index.php?page=create"><img src="./assets/icons/add.png"/></a></li>
        <li><a href="index.php?page=list&user=<?php echo $_SESSION["id"]; ?>"><img src="./assets/icons/bucket.png"/></a></li>
        <li><a href="index.php?page=saved"><img src="./assets/icons/saved.png"/></a></li>
        <li><a href=""><img src="./assets/icons/booking.png"/></a></li>
        <?php if($_SESSION["role"] === 3): ?>
          <li><a href="index.php?page=admin"><img src="./assets/icons/admin.png"/></a></li>
        <?php endif; ?>
        <form action="" method="POST">
          <input type="hidden" name="action" value="logout"/>
          <button class="btn logout" type="submit"><img src="./assets/icons/logout.png"/></button>
        </form>
      <?php endif; ?>
    </nav>

    <div class="main__container">
      <?php echo $content; ?>
    </div>
    <footer>
      <p class="footer__copy">Motorsports Bucketlist 2019. All Rights Reserved | <span><a href="">Terms & Conditions</a></span></p>
    </footer>
  </main>
  <script src="js/script.js"></script>
  </body>
</html>