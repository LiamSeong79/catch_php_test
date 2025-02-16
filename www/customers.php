<?php
    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Methods: GET');
    header('Access-Control-Allow-Headers: X-Requested-With');
    header('Content-Type: application/json');

    include_once 'dbCustomers.php';
    include_once './api/customerAPI.php';

    // check request method
    $apiMethod = $_SERVER['REQUEST_METHOD'];
    
    $customerAPI = new CustomerAPI(new DBCustomers());
    $customerAPI->handleRequest($apiMethod);
?>
