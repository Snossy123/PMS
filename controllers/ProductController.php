<?php
// Set response headers for CORS and content type
header("Access-Control-Allow-Origin: *"); // Allow requests from any origin
header("Content-Type: application/json"); // Return responses in JSON format
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE"); // Allow these HTTP methods
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

// Include database connection, Product model, and file upload helper
include_once "../config/database.php";
include_once "../models/Product.php";
include_once "../helpers/upload.php"; // Helper for handling image uploads

/**
 * ProductController class handles CRUD operations for products.
 */
class ProductController {
    private $product;

    // Constructor initializes the Product model with a database connection
    public function __construct($db) {
        $this->product = new Product($db);
    }

    /**
     * Handles incoming requests based on HTTP method and optional product ID.
     */
    public function handleRequest($method, $id) {
        switch ($method) {
            case 'GET':
                $this->getProducts($id); // Fetch one or all products
                break;
            case 'POST':
                if ($id) {
                    $this->updateProduct($id); // Update product if ID is provided
                } else {
                    $this->createProduct(); // Otherwise, create new product
                }
                break;
            case 'DELETE':
                $this->deleteProduct($id); // Delete product by ID
                break;
            default:
                http_response_code(405); // Method not allowed
                echo json_encode(["message" => "Method not allowed"]);
        }
    }

    /**
     * Retrieves product(s) from the database.
     * - If ID is provided, fetch single product.
     * - Otherwise, fetch all products.
     */
    private function getProducts($id) {
        if ($id) {
            $stmt = $this->product->getById($id);
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            echo json_encode($result ?: ["message" => "Product not found"]);
        } else {
            $stmt = $this->product->getAll();
            $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
            echo json_encode($products);
        }
    }

    /**
     * Creates a new product using POST data.
     * - Also handles optional image upload.
     */
    private function createProduct() {
        $input = $_POST;

        // Handle image upload if provided
        if (isset($_FILES['image'])) {
            $imagePath = uploadImage($_FILES['image']);
            if ($imagePath) {
                $input['image'] = $imagePath;
            } else {
                echo json_encode(["message" => "Image upload failed."]);
                return;
            }
        }

        // Assign input values to product model
        foreach ($input as $key => $value) {
            $this->product->$key = $value;
        }

        // Create product and return response
        echo json_encode([
            "message" => $this->product->create() ? "Product created." : "Failed to create."
        ]);
    }

    /**
     * Updates an existing product.
     * - Uses POST data and handles image upload if provided.
     */
    private function updateProduct($id) {
        $input = $_POST;

        // Handle image upload if new image is provided
        if (isset($_FILES['image'])) {
            $imagePath = uploadImage($_FILES['image']);
            if ($imagePath) {
                $input['image'] = $imagePath;
            } else {
                echo json_encode(["message" => "Image upload failed."]);
                return;
            }
        }

        // Assign input values to product model
        foreach ($input as $key => $value) {
            $this->product->$key = $value;
        }

        // Update product and return response
        echo json_encode([
            "message" => $this->product->update($id) ? "Product updated." : "Failed to update."
        ]);
    }

    /**
     * Deletes a product by ID.
     */
    private function deleteProduct($id) {
        echo json_encode([
            "message" => $this->product->delete($id) ? "Product deleted." : "Failed to delete."
        ]);
    }
}
