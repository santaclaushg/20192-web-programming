<?php session_start(); ?>
<html>
  <head>
    <title>Front Color</title>
  </head>
  <?php
  $bg = $_SESSION['bg'];
  $fg = $_SESSION['fg'];
  
  ?>
  <body bgcolor="<?= $bg ?>" text="<?= $fg ?>">
    <h1>Welcome to the Store</h1>
    <p>We have many fine products for you to view. Please feel free to browse the aisles and stop an
    assistant at any time. But remember, you break you bought it!</p>
    Would you like to <a href="PrefSelection.html">change your preferences?</a>
  </body>
</html>