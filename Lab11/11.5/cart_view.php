<?php session_start();
include "db_login.php";
$db_name = "lab11";
$conn = createConnection($server, $user, $password, $db_name);


/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
//print($_POST['ProductName']);
//$productName = $_POST['ProductName'];
////print($productName);
$productNamesAddedToCart = $_SESSION['ProductNamesAddedToCart'];
//array_push($productNamesAddedToCart, $productName);
print_r($productNamesAddedToCart);

$products = findAllProducts($conn);
while($product = $products->fetch_assoc()) {
//  print(str_replace(' ', '_', $product['ProductName']));
  if(isset($_POST[str_replace(' ', '_', $product['ProductName'])])) {
    print("added " . $product['ProductName']);
    array_push($productNamesAddedToCart, $product['ProductName']);
  }
  else {
//    print("222");
  }
  $_SESSION['ProductNamesAddedToCart'] = $productNamesAddedToCart;
}

?>
<html>
  <head>
    <title>Cart view</title>
  </head>
  <body>
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
          for($i = 0; $i < count($productNamesAddedToCart); $i++) {
            $product = findProductByName($conn, str_replace('_', ' ', $productNamesAddedToCart[$i]))->fetch_assoc();
            print("<tr>");
            print("<td>" . $product['ProductName'] . "</td>");
            print("<td>" . $product['Publisher'] . "</td>");
            print("<td>" . $product['SKU'] . "</td>");
            print("<td>" . $product['Platform'] . "</td>");
            print("<td>" . $product['Delivery'] . "</td>");
            print("<td>" . $product['Price'] . "</td>");
            print("</tr>");
          }
          ?>
        </tbody>
      </table>
    <form action='cart_shop.php' method='GET'>
      <input type='submit' value='continue buying' />
    </form>
    <form action='successful_payment.php' method='POST'>
      <input type='submit' name='buy' value='Buy!' />
    </form>
  </body>
</html>
