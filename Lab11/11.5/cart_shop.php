<?php session_start();
include "db_login.php";
$db_name = "lab11";
$conn = createConnection($server, $user, $password, $db_name);

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
unset($_SESSION['ProductNamesAddedToCart']);
$username = $_SESSION['UserName'];
if(!isset($username)) {
  header("Location: http://localhost/20192-web-programming/Lab11/11.5/login.php");
  die();
}
else {
//  print('login successfully');
}

?>

<html>
  <head>
    <title>Cart shop</title>
  </head>
  <body>
    <div>
      <?php
        print('<p>Hi ' . $username . '!</p>');
      ?>
    </div>
    <form action='cart_view.php' method='POST'>
      <table border='1'>
        <thead>
          <tr>
            <td>Product name</td>
            <td>Publisher</td>
            <td>SKU</td>
            <td>Platform</td>
            <td>Delivery</td>
            <td>Price</td>
          </tr>
        </thead>
        <tbody>
          <?php
            $products = findAllProducts($conn);
            $_SESSION['ProductNamesAddedToCart'] = array();
            if($products->num_rows > 0) {
              while($product = $products->fetch_assoc()) {
                print("<tr>");
                print("<td>" . $product['ProductName'] . "</td>");
                print("<td>" . $product['Publisher'] . "</td>");
                print("<td>" . $product['SKU'] . "</td>");
                print("<td>" . $product['Platform'] . "</td>");
                print("<td>" . $product['Delivery'] . "</td>");
                print("<td>" . $product['Price'] . "</td>");
                $productName = str_replace(' ', '_', $product['ProductName']);
                print("<td> <input type='submit' name='$productName' value='Add to cart' /> </td>");
                print("</tr>");
              }
            }
          ?>
        </tbody>
      </table>
    </form>
  </body>
</html>

