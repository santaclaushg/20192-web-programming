<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

  $colors = array('black' => '#000000',
      'white' => '#ffffff',
      'red' => '#ff000000',
      'blue' => '#0000ff'
      );

  $bg_name = $_POST['background'];
  $fg_name = $_POST['foreground'];
  
  setcookie('bg', $colors[$bg_name]);
  setcookie('fg', $colors[$fg_name]);
  
?>

<html>
  <head>
    <title>Preferences Set</title>
  </head>
  <body>
    Thank you. Your preferences have been changed to: <br/>
    Background: <?= $bg_name ?> <br/>
    Foreground: <?= $fg_name ?> <br/>
    
    Click a <a href="prefs-demo.php">Here</a> to see the preferences in action.
  </body>
</html>
