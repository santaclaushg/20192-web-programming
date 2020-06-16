<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

if(isset($userName)) {
  $host = 'localhost';
  $user = 'root';
  $password = 'root';
  $database = 'Lab12';
  $table_name = 'users';
  $query = "SELECT * FROM $table_name WHERE UserName='$userName' AND Password='$password'";
  $connect = mysql_connect($host, $user, $password);
  
  $linkTo = $_REQUEST["LinkTo"];
  $userName = $_POST["UserName"];
  $password = $_POST["Password"];

  if($connect) {
    mysql_select_db($database);
    $result = mysql_query($query, $connect);
    
    $row = mysql_fetch_row($result);
    if($result && $row) {
      if($linkTo != "") {
        header("Location: " . $linkTo);
      }
      else {
        header("Location: http://gooogle.com.vn/");
        exit();
      }
    }
  }
}

?>

<html>
  <head>
    <title>Member, please login</title>
  </head>
  <script>
    function fCommit() {
      if(document.frmLogin.UserName.value == "") {
        alert("UserName must be enter!");
        document.frmLogin.UserName.focus();
        return false;
      }
      return true;
    }
    function fReset() {
      document.frmLogin.UserName.value = "";
      document.frmLogin.Password.value = "";
      document.frmLogin.UserName.focus();
    }
  </script>
  <body topmargin="0" leftmargin="0">
    <form method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>" name="frmLogin" onsubmit="return fCommit();">
      <table border="0" width="100%" height="100%" cellspacing="0" cellpadding="0">
        <tr valign="middle">
          <td align="center">
            <table>
              <tr>
                <td>
                  <p class="reporttitle">LOGIN TO THE SYSTEM</p>
                </td>
              </tr>
            </table>
            <table class="forumline" width="280" border="0" cellspacing="1" cellpadding="2"> 
              <tr class="formstyle">
                <td>
                  <table width="100%" border="0" cellpadding="2" cellspacing="0">
                    <tr class="formstyle">
                      <td class="th-caption" align="right" width="40%">User name: &nbsp;</td>
                      <td class="th-caption" width="60%">&nbsp;
                        <input class="edit" style="width: 97%" type="text" name="UserName" value="<?php echo $userName ?>" />
                        <input type="hidden" name="LinkTo" value="<?php echo $linkTo ?>" />
                      </td>
                    </tr>
                    <tr class="formstyle">
                      <td class="th-caption" align="right" width="40%">Password: &nbsp;</td>
                      <td class="th-caption" width="60%">&nbsp;
                        <input class="edit" style="width: 97%" type="password" name="Password" />
                      </td>
                    </tr>
                    <tr class="formstyle" height="30">
                      <td class="th-caption" align="center" colspan="2">
                        <input class="btn" style="width: 80%" type="submit" value="Login" />
                        <input class="btn" style="width: 80%" type="reset" value="Reset" onclick="fReset();" />
                        <input type="hidden" name="LinkTo" value="<?php echo $linkTo ?>" />
                      </td>
                    </tr>
                    <?php
                      if(isset($user) && !$row) {
                        echo '<tr align="center"><td colspan="2"><p class="error>Invalid name and/or password!</p></td></tr>';
                      }
                      mysql_free_result($result);
                      mysql_close($connect);
                    ?>
                  </table>
                </td>
              </tr>
            </table>
          </td>
        </tr>
      </table>
    </form>
    <script>
      document.frmLogin.UserName.focus();
    </script>
  </body>
</html>
