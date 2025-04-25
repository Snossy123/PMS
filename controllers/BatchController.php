<?php
/**
 * Controller class for managing product batches.
 * Handles creation, retrieval, update, and deletion of batches.
 */
class BatchController {
    private $batch;

    /**
     * Constructor initializes Batch model with a database connection.
     */
    public function __construct($db) {
        $this->batch = new Batch($db);
    }

    /**
     * Creates a new batch entry.
     * Requires: product_id, quantity, and expiry_date in the input data.
     */
    public function create($data) {
        // Check for all required fields
        if (isset($data['product_id'], $data['quantity'], $data['expiry_date'])) {
            $product_id = $data['product_id'];
            $quantity = $data['quantity'];
            $expiry_date = $data['expiry_date'];

            // Validate non-empty fields
            if (empty($product_id) || empty($quantity) || empty($expiry_date)) {
                http_response_code(400); // Bad Request
                return ["error" => "Missing required fields."];
            }

            // Attempt to create batch and return appropriate response
            return $this->batch->create($product_id, $quantity, $expiry_date)
                ? ["message" => "Batch added successfully"]
                : ["error" => "Failed to add batch"];
        }

        // Return error if required fields are missing
        http_response_code(400);
        return ["error" => "Missing product_id, quantity, or expiry_date."];
    }

    /**
     * Retrieves all batches for a specific product by its ID.
     */
    public function get($product_id) {
        if ($product_id) {
            return $this->batch->getByProductId($product_id);
        }

        http_response_code(400); // Bad Request
        return ["error" => "Product ID is required"];
    }

    /**
     * Updates an existing batch record by ID.
     * Requires: product_id, quantity, and expiry_date in the input data.
     */
    public function update($id, $data) {
        // Check for all required fields
        if (isset($data['product_id'], $data['quantity'], $data['expiry_date'])) {
            $product_id = $data['product_id'];
            $quantity = $data['quantity'];
            $expiry_date = $data['expiry_date'];

            // Validate non-empty fields
            if (empty($product_id) || empty($quantity) || empty($expiry_date)) {
                http_response_code(400); // Bad Request
                return ["error" => "Missing required fields."];
            }

            // Attempt to update the batch
            return $this->batch->update($id, $quantity, $expiry_date)
                ? ["message" => "Batch updated successfully"]
                : ["error" => "Failed to update batch"];
        }

        // Return error if fields are missing
        http_response_code(400);
        return ["error" => "Missing product_id, quantity, or expiry_date."];
    }

    /**
     * Deletes a batch by its ID.
     */
    public function delete($id) {
        return $this->batch->delete($id)
            ? ["message" => "Batch deleted successfully"]
            : ["error" => "Failed to delete batch"];
    }
}
