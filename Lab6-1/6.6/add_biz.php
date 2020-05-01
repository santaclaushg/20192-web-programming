<!doctype html>
<html>
  <head>
    <title>Business Registration</title>
    <link rel="stylesheet" href="./add_biz.css" />
  </head>
  <body>
    <form action="add_biz.php" method="GET">
      <h1>Business Registration</h1>
      <?php
      require "../connection.php";
      // handle the submit event
      if (isset($_GET['is_submitted'])) {
        $conn = createConnection($server, $user, $password, $db_name);
        $table_name = "businesses";
        $fields_array = ["Name", "Address", "City", "Telephone", "URL"];
        ["business_name" => $business_name, "address" => $address,
                "city" => $city, "telephone" => $telephone, "url" => $url] = $_GET;
        $data_array = [$business_name, $address, $city, $telephone, $url];
        $resultBusiness = insertDataIntoBusinesses($conn, $fields_array, $data_array);
        $businessID = findBusinessByName($conn, $business_name)['BusinessID'];
        print $businessID;
        $category_titles = $_GET["title_cats"];
        $categoriesID = array();
        foreach ($category_titles as $category_title) {
          $category = findCategoryByTitle($conn, $category_title);
          if (!is_null($category)) {
            array_push($categoriesID, $category["CategoryID"]);
          }
        }
        $resultBiz_categories_arr = array();
        foreach ($categoriesID as $categoryID) {
          $fields_array = ["BusinessID", "CategoryID"];
          $data_array = [$businessID, $categoryID];
          $resultBiz_categories = insertDataIntoBiz_Categories($conn, $fields_array, $data_array);
          if (!$resultBiz_categories) {
            print $conn->error;
          } else {
            array_push($resultBiz_categories_arr, $resultBiz_categories);
          }
        }
        if (!array_search(False, $resultBiz_categories_arr)) {
          $successful = False;
          print "<input type='hidden' name='successful' value='$successful'/> ";
          print $conn->error;
        } else {
          $successful = True;
          print "<input type='hidden' name='successful' value='$successful'/> ";
        }
        if (isset($successful)) {
          print "<p>Record inserted as shown below</p>";
        } else {
          print "<p>Record failed</p>";
        }
      }
      ?>
      <table>
        <tr>
          <td class="w40">
            <?php
            if (isset($_GET['successful'])) {
              print "<p>Selected category values are highlighted</p>";
            } else {
              print "<p>Click on one, or control-click on multiple categories:</p>";
            }
            ?>
            <select class="w100" name="title_cats[]" size="4" multiple="multiple">
              <?php
              // get the titles of categories
              $conn = createConnection($server, $user, $password, $db_name);
              if (!is_null($conn)) {
                $table_name = "categories";
                $attributes_array = ['Title'];
                $result = selectData($conn, $table_name, $attributes_array);
                if ($result->num_rows > 0) {
                  while ($row = $result->fetch_assoc()) {
                    print "<option>" . $row['Title'] . "</option>";
                  }
                }
              }
              ?>
            </select>
          </td>
          <td class="w60">
            <table>
              <tr>
                <td style="width: 120px">
                  Business Name:
                </td>
                <td style="width: 100%">

                  <input type="text" name="business_name" class="input_form" />
                </td>
              </tr>
              <tr>
                <td>

                  Address:
                </td>
                <td>
                  <input type="text" name="address" class="input_form" />
                </td>
              </tr>
              <tr>
                <td>

                  City:
                </td>
                <td>

                  <input type="text" name="city" class="input_form" />
                </td>
              </tr>
              <tr>
                <td>

                  Telephone:
                </td>
                <td>

                  <input type="text" name="telephone" class="input_form" />
                </td>
              </tr>
              <tr>
                <td>

                  URL:
                </td>
                <td>

                  <input type="text" name="url" class="input_form" />
                </td>
              </tr>
            </table>
          </td>
        </tr>
      </table>
      <?php
      if (!isset($successful)) {
        print "<input class=\"submit_btn\" type=\"submit\" name=\"is_submitted\" value=\"Add Business\" />";
      } else {
        print "<input class=\"submit_btn\" type=\"submit\" name=\"is_add_another\" value=\"Add Another Busniess\" /> ";
      }
      ?>
    </form>
  </body>
</html>
