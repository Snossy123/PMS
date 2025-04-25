<?php
// Include required files: database configuration, model, and controller for Product
include_once "../config/database.php";
include_once "../models/Product.php";
include_once "../controllers/ProductController.php";

// Establish a database connection using the Database class
$db = (new Database())->connect();

// Instantiate the ProductController with the active database connection
$productController = new ProductController($db);

// Get the HTTP request method (e.g., GET, POST, PUT, DELETE)
$method = $_SERVER['REQUEST_METHOD'];

// Optionally get the 'id' parameter from the query string (e.g., ?id=5)
$id = $_GET['id'] ?? null;

// Delegate the request to the controller's handler method,
// passing the HTTP method and optional product ID
$productController->handleRequest($method, $id);
