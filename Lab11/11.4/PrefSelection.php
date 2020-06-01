<?php 
  include_once('check_login.php');
?>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
  <head>
    <title>Set Your Preference</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  </head>
  <body>
    <form action="prefs.php" method="POST">
      Background:
      <select name="background">
        <option value="black">Black</option>
        <option value="white">White</option>
        <option value="red">Red</option>
        <option value="blue">Blue</option>
      </select>
      <br/>
      Foreground:
      <select name="foreground">
        <option value="black">Black</option>
        <option value="white">White</option>
        <option value="red">Red</option>
        <option value="blue">Blue</option>
      </select>
      <p />
      
      <input type="submit" value="Change Preferences" />
    </form>
  </body>
</html>
