<?php

class Batch {
    // PDO instance to interact with the database
    private $pdo;

    // Constructor that receives a PDO database connection
    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    /**
     * Create a new batch record for a product.
     *
     * @param int $product_id - The ID of the associated product
     * @param int $quantity - Quantity of the batch
     * @param string $expiry_date - Expiry date in YYYY-MM-DD format
     * @return bool - True on success, False on failure
     */
    public function create($product_id, $quantity, $expiry_date) {
        $stmt = $this->pdo->prepare("INSERT INTO product_batches (product_id, quantity, expiry_date) VALUES (?, ?, ?)");
        return $stmt->execute([$product_id, $quantity, $expiry_date]);
    }

    /**
     * Retrieve all batches for a specific product.
     *
     * @param int $product_id - The ID of the product
     * @return array - An associative array of batch records
     */
    public function getByProductId($product_id) {
        $stmt = $this->pdo->prepare("SELECT * FROM product_batches WHERE product_id = ?");
        $stmt->execute([$product_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Update a specific batch's quantity and expiry date.
     *
     * @param int $id - The ID of the batch to update
     * @param int $quantity - The new quantity
     * @param string $expiry_date - The new expiry date (YYYY-MM-DD)
     * @return bool - True on success, False on failure
     */
    public function update($id, $quantity, $expiry_date) {
        $stmt = $this->pdo->prepare("UPDATE product_batches SET quantity = ?, expiry_date = ? WHERE id = ?");
        return $stmt->execute([$quantity, $expiry_date, $id]);
    }

    /**
     * Delete a batch by its ID.
     *
     * @param int $id - The ID of the batch to delete
     * @return bool - True on success, False on failure
     */
    public function delete($id) {
        $stmt = $this->pdo->prepare("DELETE FROM product_batches WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
