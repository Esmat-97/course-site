<a href="main.php">main</a>
<?php


$comming=$_COOKIE['username'];

$servername = "localhost";
$username = "root";
 $password ="";
  $dbname = "oop";



  if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delfav'])) {
    $deletedUsername = $_POST['del'];
    echo $_POST['del'];
    
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        $stmt = $conn->prepare("DELETE FROM $comming WHERE link_name = ?");
        $stmt->execute([$deletedUsername]);

        echo "DELETED successfully."."<br>";
    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

  }
                  
  
  if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['favorite'])) {
      $deletedUsername = $_POST['del'];
      echo $_POST['del'];
  
      // Perform deletion operation based on $deletedUsername
      // Example:
      try {
          $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
          $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          
          $stmt = $conn->prepare("CREATE TABLE $comming ( link_name VARCHAR(255))");
          $stmt->execute();
  
          echo "table created successfully."."<br>";
      } catch(PDOException $e) {
          echo "Error: " . $e->getMessage();
      }


      try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $conn->prepare("INSERT INTO $comming (link_name) VALUES (?) ");
        $stmt->execute([$deletedUsername]);

        echo "data insertted successfully."."<br>";
    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage() . "<br>";
    }




  }


  try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $conn->prepare("SELECT * FROM $comming ");
    $stmt->execute();
    $products=$stmt->fetchAll(PDO::FETCH_ASSOC);
    if($stmt->rowCount() > 0) {

        foreach ($products as $product) {

            echo "Username: " . $product['link_name'] . "<br>";
            ?>


            <form  method="post" action="favorite.php">
            <input type="hidden" name="del" value="<?php  echo $product['link_name']  ?>">
            <button type="submit" name="delfav"  class="btn btn-info">del</button>
            </form>

            <?php
        }
    }
    

    echo "data insertted successfully." ."<br>";
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}

?>