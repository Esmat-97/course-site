<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    
</body>
</html>

<a href="main.php">main</a>
<?php


$comming=$_COOKIE['username'];

$servername = "localhost";
$username = "root";
 $password ="";
  $dbname = "oop";

  if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['more'])) {
    $deletedUsername = $_POST['del'];
    echo $_POST['del'];


  try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $conn->prepare("SELECT * FROM courses where link_name=?  ");
    $stmt->execute([$deletedUsername]);
    $products=$stmt->fetchAll(PDO::FETCH_ASSOC);
    if($stmt->rowCount() > 0) {

        ?>


<div class="row row-cols-1 row-cols-md-3 g-4">

        <?php
        foreach ($products as $product) {
            ?>


<div class="col">
    <div class="card h-100">

      <img src="<?php echo "title:".$product['image_url']?>" class="card-img-top">
      <div class="card-body">
        <h5 class="card-title"><?php echo  $product['advertise']  ?></h5>
        <p class="card-text"><?php  echo "course: " . $product['link_name']; ?></p>
        <p class="card-text"><?php  echo "price: " . $product['retail_price'] ?></p>
        <p class="card-text"><?php  echo "price: " . $product['instructor'] ?></p>
        <p class="card-text"><?php  echo "price: " . $product['instructor_bio'] ?></p>
        <p class="card-text"><?php  echo "price: " . $product['description'] ?></p>
        <p class="card-text"><?php  echo "price: " . $product['duration'] ?></p>
        <p class="card-text"><?php  echo "price: " . $product['year'] ?></p>


            </div>


</div>
</div>
            <?php
        }
        
    }
    

    echo "data insertted successfully." ."<br>";
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}

  }
?>