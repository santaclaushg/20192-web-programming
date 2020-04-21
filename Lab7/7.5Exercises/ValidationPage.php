<!doctype html>
<html>
  <head>
    <title>Validation result page</title>
  </head>
  <body>
    <?php
    $email = $_POST['email'];
    $url = $_POST['url'];
    $phoneNumber = $_POST['phoneNumber'];

    if (isset($email) || isset($url) || isset($phoneNumber)) {
      if (preg_match("/^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$/", $email)) {
        print "Valid email=$email";
      } else {
        print "Invalid email=$email";
      }
      print "<br />";
      if (preg_match("/^(http:\/\/www\.|https:\/\/www\.|http:\/\/|https:\/\/)?[a-z0-9]+([\-\.]{1}[a-z0-9]+)*\.[a-z]{2,5}(:[0-9]{1,5})?(\/.*)?$/", $url)) {
        print "Valid url=$url";
      } else {
        print "Invalid url=$url";
      }
      print "<br />";
      if (preg_match("/^[+]*[(]{0,1}[0-9]{1,4}[)]{0,1}[-\s\./0-9]*$/", $phoneNumber)) {
        print "Valid phone number = $phoneNumber";
      } else {
        print "Invalid phone number = $phoneNumber";
      }
    }
    ?>
  </body>
</html>
