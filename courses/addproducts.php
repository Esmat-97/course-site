<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Products Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .form-container {
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            box-sizing: border-box;
        }
        .form-group {
            margin-bottom: 20px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
        }
        .form-group input,
        .form-group select,
        .form-group textarea {
            width: 100%;
            padding: 10px;
            box-sizing: border-box;
        }
        .form-group button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
            width: 100%;
        }
        .form-group button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="form-container">

        <form  method="post">
            <div class="form-group">
                <label for="product-name">advertise Name:</label>
                <input type="text" id="product-name" name="advertise" required>
            </div>
            <div class="form-group">
                <label for="product-description"> Course:</label>
                <textarea id="product-description" name="course" rows="4" required></textarea>
            </div>
        
            <div class="form-group">
                <label for="product-price"> Price:</label>
                <input type="number" id="product-price" name="price" step="0.01" required>
            </div>
            
            <div class="form-group">
                <button type="submit" name="submit">Add Product</button>
            </div>
        </form>
    </div>
</body>
</html>

<?php

class siteProducts {
    private $host;
    private $dbname;
    private $username;
    private $password;
    private $pdo;

    public function __construct($host, $dbname, $username, $password) {
        $this->host = $host;
        $this->dbname = $dbname;
        $this->username = $username;
        $this->password = $password;

        try {
            $dsn = "mysql:host=$this->host;dbname=$this->dbname;charset=utf8mb4";
            $this->pdo = new PDO($dsn, $this->username, $this->password);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Connection failed: " . $e->getMessage());
        }
    }

    public function insertData($x, $y,$z) {
        try {
            $stmt = $this->pdo->prepare("INSERT INTO courses (advertiser, link_name,retail_price) VALUES (?, ?,?)");
            $stmt->execute([$x,$y,$z]);
            return true;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }
}
?>

<?php


if (isset($_POST['submit'])) {
    $x = $_POST['advertise'];
    $y = $_POST['course'];
    $z=$_POST['price'];
    // Database connection parameters
    $host = 'localhost';
    $dbname = 'oop';
    $username = 'root';
    $password = '';

    // Create a database object
    $db = new siteProducts($host, $dbname, $username, $password);

    // Insert data into the database
    if ($db->insertData($x, $y,$z)) {
        echo "Data inserted successfully.";
    } else {
        echo "Error inserting data.";
    }
}
?>