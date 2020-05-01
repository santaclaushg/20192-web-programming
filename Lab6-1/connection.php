<?php

$server = '127.0.0.1';
$db_name = 'business_service';
$user = 'root';
$password = '12345';

function createConnection($server, $user, $password, $db_name) {
  $conn = new mysqli($server, $user, $password, $db_name);
  if($conn->connect_errno) {
    die("Cannot connect to $server by $user: $conn->error");
    return NULL;
  }
  else {
    return $conn;
  }
}

function selectData($conn, $table_name, $attributes_array = NULL, $limit = NULL) {
  if(is_null($attributes_array)){
    if(is_null($limit)){
      $selectQuery = "SELECT * FROM $table_name";
    }
    else {
      $selectQuery = "SELECT * FROM $table_name LIMIT 0, $limit";
    }
  }
  else {
    $attributes_array_string = implode(", ", $attributes_array);
    $selectQuery = "SELECT ($attributes_array_string) FROM $table_name";
  }
  $result = $conn->query($selectQuery);
  if(!$result){
    trigger_error('Invalid query: ' . $conn->error);
  }
  return $result;
}

function insertDataIntoBusinesses($conn, $fields_array, $data_array) {
  $fields_values_string = implode(',', $fields_array);
  [$business_name, $address, $city, $telephone, $url] = $data_array;
  print $fields_values_string;
  $insertQuery = "INSERT INTO businesses ($fields_values_string)
          VALUES ('$business_name', '$address', '$city', '$telephone', '$url')";
  $result = $conn->query($insertQuery);
  return $result;
}

function insertDataIntoBiz_Categories($conn, $fields_array, $data_array) {
  $fields_values_string = implode(',', $fields_array);
  [$businessID, $categoryID] = $data_array;
  print $fields_values_string;
  $insertQuery = "INSERT INTO biz_categories ($fields_values_string)
          VALUES ('$businessID', '$categoryID')";
  $result = $conn->query($insertQuery);
  return $result;
}

function findBusinessByName($conn, $business_name) {
  $selectQuery = "SELECT * FROM businesses WHERE name = '$business_name'";
  $result = $conn->query($selectQuery);
  if($result->num_rows == 1) {
    return $result->fetch_assoc();
  }
  else {
    return null;
  }
}

function findCategoryByTitle($conn, $category_title) {
  $selectQuery = "SELECT * FROM categories WHERE Title = '$category_title'";
  $result = $conn->query($selectQuery);
  if($result->num_rows == 1) {
    return $result->fetch_assoc();
  }
  else {
    return null;
  }
}

?>