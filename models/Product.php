<?php
class Product {
    // Database connection and table name
    private $conn;
    private $table = "products";

    // Public properties representing product fields
    public $id, $barcode, $name, $details, $image, $purchase_price, $sale_price,
        $rating, $comments, $category, $type, $manufacturer, $origin_country,
        $colors, $stock_quantity, $sizes;

    // Constructor accepts a PDO database connection
    public function __construct($db) {
        $this->conn = $db;
    }

    // Retrieve all products, ordered by most recently created
    public function getAll() {
        $query = "SELECT * FROM {$this->table} ORDER BY created_at DESC";
        return $this->conn->query($query); // Direct execution without prepared statement
    }

    // Insert a new product into the database using prepared statements
    public function create() {
        $query = "INSERT INTO {$this->table} 
            SET barcode=:barcode, name=:name, details=:details, image=:image,
                purchase_price=:purchase_price, sale_price=:sale_price, rating=:rating,
                comments=:comments, category=:category, type=:type, manufacturer=:manufacturer,
                origin_country=:origin_country, colors=:colors, stock_quantity=:stock_quantity, sizes=:sizes";

        $stmt = $this->conn->prepare($query);

        // Bind class properties to query parameters
        $stmt->bindParam(":barcode", $this->barcode);
        $stmt->bindParam(":name", $this->name);
        $stmt->bindParam(":details", $this->details);
        $stmt->bindParam(":image", $this->image);
        $stmt->bindParam(":purchase_price", $this->purchase_price);
        $stmt->bindParam(":sale_price", $this->sale_price);
        $stmt->bindParam(":rating", $this->rating);
        $stmt->bindParam(":comments", $this->comments);
        $stmt->bindParam(":category", $this->category);
        $stmt->bindParam(":type", $this->type);
        $stmt->bindParam(":manufacturer", $this->manufacturer);
        $stmt->bindParam(":origin_country", $this->origin_country);
        $stmt->bindParam(":colors", $this->colors);
        $stmt->bindParam(":stock_quantity", $this->stock_quantity);
        $stmt->bindParam(":sizes", $this->sizes);

        // Execute and return true/false based on success
        return $stmt->execute();
    }

    // Get a single product by ID
    public function getById($id) {
        $query = "SELECT * FROM {$this->table} WHERE id = :id LIMIT 1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        return $stmt; // Caller will fetch result
    }

    // Update a product by ID
    public function update($id) {
        $query = "UPDATE {$this->table}
        SET barcode=:barcode, name=:name, details=:details, image=:image,
            purchase_price=:purchase_price, sale_price=:sale_price, rating=:rating,
            comments=:comments, category=:category, type=:type, manufacturer=:manufacturer,
            origin_country=:origin_country, colors=:colors, stock_quantity=:stock_quantity, sizes=:sizes
        WHERE id=:id";

        $stmt = $this->conn->prepare($query);

        // Bind the parameters to values
        $stmt->bindParam(":id", $id);
        $stmt->bindParam(":barcode", $this->barcode);
        $stmt->bindParam(":name", $this->name);
        $stmt->bindParam(":details", $this->details);
        $stmt->bindParam(":image", $this->image);
        $stmt->bindParam(":purchase_price", $this->purchase_price);
        $stmt->bindParam(":sale_price", $this->sale_price);
        $stmt->bindParam(":rating", $this->rating);
        $stmt->bindParam(":comments", $this->comments);
        $stmt->bindParam(":category", $this->category);
        $stmt->bindParam(":type", $this->type);
        $stmt->bindParam(":manufacturer", $this->manufacturer);
        $stmt->bindParam(":origin_country", $this->origin_country);
        $stmt->bindParam(":colors", $this->colors);
        $stmt->bindParam(":stock_quantity", $this->stock_quantity);
        $stmt->bindParam(":sizes", $this->sizes);

        return $stmt->execute(); // Execute and return result
    }

    // Delete a product by ID
    public function delete($id) {
        $query = "DELETE FROM {$this->table} WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $id);
        return $stmt->execute();
    }
}
