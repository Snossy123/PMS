![image](https://github.com/user-attachments/assets/69dd608d-6004-4a00-8c0e-a9e14c416815)

# 🤩 Product Management API - PHP & MySQL

This is a RESTful API built with **pure PHP** and **MySQL** to manage products and their batches for a store.  
It supports full CRUD operations and follows the **MVC pattern** for clean and maintainable code.

---

## 📚 Features

- Create, retrieve, update, and delete products
- Manage product batches with expiry dates
- Clean & modular MVC structure
- Uses JSON for input/output
- Secure database access with PDO

---

## 🛠 Technologies Used

- PHP (vanilla)
- MySQL
- PDO for secure DB access
- MVC (Model - Controller - API)
- REST architecture

---

## ☁️ Image Upload via Local Storage

- In the `POST` method of `/api/products.php`, the uploaded image (as a file) is sent to Local Storage, and the returned `secure_url` is saved as the product image.

---

## 📦 Product Fields

Each product in the API includes the following fields:

| Field             | Description                    |
|------------------|--------------------------------|
| `id`              | Unique product ID              |
| `barcode`         | Product barcode                |
| `name`            | Product name                   |
| `details`         | Product description            |
| `image`           | Image URL                      |
| `purchase_price`  | Purchase cost                  |
| `sale_price`      | Selling price                  |
| `rating`          | Product rating                 |
| `comments`        | Comments or notes              |
| `category`        | Product category               |
| `type`            | Product type                   |
| `manufacturer`    | Company name                   |
| `origin_country`  | Country of origin              |
| `colors`          | Available colors               |
| `stock_quantity`  | Items in stock                 |
| `sizes`           | Available sizes                |

---

## 📦 Product Endpoints

### ➕ Create Product with Image
```
POST /api/products.php
Content-Type: multipart/form-data
```

Form Fields:
- barcode
- name
- details
- image (file)
- purchase_price
- sale_price
- ...

Cloudinary will handle the image upload, and the returned URL will be saved in the database.

### 📄 Get All Products
```
GET /api/products.php
```

### 🔍 Get Product by ID
```
GET /api/products.php?id=5
```

### ✏️ Update Product
```
POST /api/products.php?id=5
Content-Type: application/json
```

### 🗑 Delete Product
```
DELETE /api/products.php?id=5
```

---

## 🧺 Task 2: Product Batches (Expiry Tracking)

Each product can have multiple batches (lots) with different expiry dates and quantities.

### 🗃️ Table: `product_batches`

| Field         | Description                         |
|---------------|-------------------------------------|
| `id`          | Unique batch ID                     |
| `product_id`  | Linked product ID                   |
| `quantity`    | Quantity in the batch               |
| `expiry_date` | Expiration date of this batch       |

### 🔌 Batch API Endpoints

| Action        | Method | Endpoint                    | Parameters / Body                          |
|---------------|--------|-----------------------------|--------------------------------------------|
| Add Batch     | POST   | `/api/batches.php`          | `product_id`, `quantity`, `expiry_date`    |
| Get Batches   | GET    | `/api/batches.php`          | `product_id` as query parameter            |
| Update Batch  | PUT    | `/api/batches.php`          | `id`, `quantity`, `expiry_date`            |
| Delete Batch  | DELETE | `/api/batches.php`          | `id` in request body or query              |

### 🧪 Sample Request

```http
POST /api/batches.php
Content-Type: application/json

{
  "product_id": 3,
  "quantity": 50,
  "expiry_date": "2025-12-01"
}
```

---

## 📁 Folder Structure

```
.
├── api/
│   ├── products.php         # Product API
│   └── batches.php          # Batch API
├── config/
│   └── database.php         # DB connection
├── models/
│   ├── Product.php          # Product model
│   └── Batch.php            # Batch model
└── README.md
```

---

## ✅ Requirements

- PHP 8.0+
- MySQL
- Apache / XAMPP / LAMP / Laravel Valet (local server)

---

## 🚀 Usage

1. Import the SQL schema for `products` and `product_batches` tables.
2. Configure your DB credentials in `config/database.php`.
3. Set up Cloudinary credentials.
4. Use Postman or a REST client to interact with the API.
5. Ensure `POST` and `DELETE` methods are supported by your environment.

---

## 📌 Notes

- All communication is via JSON or multipart/form-data (for image upload).
- Frontend design is not included in this phase.
- Next: Optimize UI and implement frontend.
- [API Documentation](https://documenter.getpostman.com/view/41777324/2sB2izCYSC)

---

## 👨‍💻 Author

**Solieman Snossy**  
Backend Developer | PHP & JS Stack  
[LinkedIn](https://linkedin.com/in/solieman-snossy) | [GitHub](https://github.com/Snossy123)

