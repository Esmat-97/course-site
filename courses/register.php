<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Sign Up</title>
<style>

* {
box-sizing: border-box;
}

body {
display: flex;
justify-content: center;
align-items: center;
height: 100vh;
background-color: #f1f1f1;
margin: 0;
font-family: Arial, sans-serif;
}

.container {
width: 300px;
background-color: white;
padding: 20px;
border: 1px solid #ccc;
border-radius: 5px;
box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

h1 {
text-align: center;
margin-bottom: 30px;
}

.field {
margin-bottom: 20px;
}

label {
display: block;
margin-bottom: 5px;
font-size: 14px;
}

input[type="text"],
input[type="email"],
input[type="password"] {
width: 100%;
padding: 10px;
font-size: 16px;
border: 1px solid #ccc;
border-radius: 5px;
}

input[type="text"]:focus,
input[type="email"]:focus,
input[type="password"]:focus {
outline: none;
box-shadow: 0 2px 4px rgba(0, 120, 212, 0.1);
}

button {
background-color: #007bff;
color: white;
padding: 10px 20px;
font-size: 16px;
border: none;
border-radius: 5px;
cursor: pointer;
}

button:hover {
background-color: #0056b3;
}
</style>
</head>
<body>
<div class="container">
<h1>Sign Up</h1>
<form method="post">
<div class="field">
<label for="firstName">First Name</label>
<input type="text" id="firstName" name="name" required>
</div>

<div class="field">
<label for="email">Email</label>
<input type="email" id="email" name="email" required>
</div>
<div class="field">
<label for="password">Password</label>
<input type="password" id="password" name="password" required>
</div>
<button type="submit" name="submit">Get Started</button>
</form>
</div>
</body>
</html>
<?php
class Database {
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

    public function insertData($name, $email,$pass) {
        try {
            $stmt = $this->pdo->prepare("INSERT INTO client (title, email,`password`) VALUES (?, ?,?)");
            $stmt->execute([$name, $email,$pass]);
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
    $name = $_POST['name'];
    $email = $_POST['email'];
    $pass=$_POST['password'];
    // Database connection parameters
    $host = 'localhost';
    $dbname = 'oop';
    $username = 'root';
    $password = '';

    // Create a database object
    $db = new Database($host, $dbname, $username, $password);

    // Insert data into the database
    if ($db->insertData($name, $email,$pass)) {
        echo "Data inserted successfully.";
    } else {
        echo "Error inserting data.";
    }
}
?>
