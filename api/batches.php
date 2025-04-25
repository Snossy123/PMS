<?php
// Set the response header to return JSON data
header("Content-Type: application/json");

// Include required files for database connection, models, and controller logic
require_once "../config/database.php";
require_once "../models/Batch.php";
require_once "../controllers/BatchController.php";

// Initialize database connection and controller
$db = (new Database())->connect();
$controller = new BatchController($db);

// Get the HTTP request method (GET, POST, DELETE, etc.)
$method = $_SERVER['REQUEST_METHOD'];

// Get the optional query parameters from the URL
$id = $_GET['id'] ?? null;
$product_id = $_GET['product_id'] ?? null;

// Handle the request based on the method type
switch ($method) {
    case 'POST':
        // If ID is present, update an existing batch
        // Otherwise, create a new batch
        if ($id) {
            $response = $controller->update($id, $_POST);
        } else {
            $response = $controller->create($_POST);
        }
        echo json_encode($response); // Return the response as JSON
        break;

    case 'GET':
        // Retrieve batches based on product_id
        echo json_encode($controller->get($product_id));
        break;

    case 'DELETE':
        // DELETE requires an ID to delete the specific batch
        if (!$id) {
            echo json_encode(["error" => "ID is required for delete."]);
            break;
        }
        echo json_encode($controller->delete($id));
        break;

    default:
        // Respond with 405 if the method is not allowed
        http_response_code(405);
        echo json_encode(["error" => "Method not allowed"]);
        break;
}
