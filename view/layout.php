<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="css/reset.css">
  <link rel="stylesheet" href="css/style.css">
  <title>Bucketlist</title>
</head>
<body>
  <main>
    <header>
    <?php if(!empty($_SESSION["logged"])): ?>
    <span>logged in as</span>
    <span><?php echo $_SESSION["username"]; ?></span>
<?php endif; ?>
    </header>
    <?php echo $content; ?>
  </main>
  <script src="js/script.js"></script>
</body>
</html>
