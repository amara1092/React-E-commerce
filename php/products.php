<?php

  // DB Details -- NB no exception handling included
  $db_name = 'amara-reactproducts';
  $db_user = 'react_amara1111';
  $db_pass = 'uzomaamara';

  try {

    $db = new PDO("mysql:host=localhost;dbname=$db_name;charset=utf8mb4", $db_user, $db_pass);

    // Get DB rows (all products)
    $stt = $db->prepare('SELECT id,name,price,description,image_href FROM amara-products');
    $stt->execute();

    // Associative array of all DB results
    $products = $stt->fetchAll(PDO::FETCH_ASSOC);

    // Render response as JSON (so it can be 'fetched' and parsed in in JS)
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    echo json_encode($products);
  } catch(Exception $e) {
    echo 'PDO error: ' . $e->getMessage();
  }

?>