CREATE TABLE products (
                          id INT AUTO_INCREMENT PRIMARY KEY,
                          barcode VARCHAR(50),
                          name VARCHAR(255),
                          details TEXT,
                          image VARCHAR(255),
                          purchase_price DECIMAL(10,2),
                          sale_price DECIMAL(10,2),
                          rating DECIMAL(2,1),
                          comments TEXT,
                          category VARCHAR(100),
                          type VARCHAR(100),
                          manufacturer VARCHAR(100),
                          origin_country VARCHAR(100),
                          colors TEXT,
                          stock_quantity INT,
                          sizes TEXT,
                          created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE product_batches (
                                 id INT AUTO_INCREMENT PRIMARY KEY,
                                 product_id INT NOT NULL,
                                 quantity INT NOT NULL,
                                 expiry_date DATE NOT NULL,
                                 created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                                 FOREIGN KEY (product_id) REFERENCES products(id) ON DELETE CASCADE
);

