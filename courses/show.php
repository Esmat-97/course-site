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

<div>
<?php

$servername = "localhost";
$username = "root";
 $password ="";
  $dbname = "oop";

                  
  
  if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
      $deletedUsername = $_POST['del'];
      echo $_POST['del'];
  
      // Perform deletion operation based on $deletedUsername
      // Example:
      try {
          $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
          $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          
          $stmt = $conn->prepare("DELETE FROM courses WHERE link_name LIKE ?");
          $stmt->execute(["%$deletedUsername%"]);
  
          echo "Item deleted successfully.";
      } catch(PDOException $e) {
          echo "Error: " . $e->getMessage();
      }
  }



try {
            
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);




            if(isset($_POST['filter'])) {



                $filter = $_POST['filter'];
                // SQL query to select products filtered by name
                $stmt = $conn->prepare("SELECT * FROM courses WHERE  advertise LIKE ?");
                $stmt->execute(["%$filter%"]);
                // Fetch all filtered products as an associative array
                $products = $stmt->fetchAll(PDO::FETCH_ASSOC);


                if($stmt->rowCount() > 0) {

                    foreach ($products as $product) {
    
                        echo "advertiser: " . $product['advertise'] ."<br>";
                        echo "Username: " . $product['link_name'] . "<br>";
                        echo "id: " . $product['link_id'] . "<br>";
                        echo "price: " . $product['retail_price'] . "<br>";                    
                    }
    
                }
    
            }
        


else{
            $stmt = $conn->prepare("SELECT * FROM courses ");
            $stmt->execute();
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
        <div class="card-text"><?php  echo "course: " . $product['link_name']; ?></div>
        <div class="card-text"><?php  echo "price: " . $product['retail_price'] ?></div>

        <a href="<?php echo "url: " . $product['link'] ?>">link</a>
        <?php
          $comming=$_COOKIE['username'];
          if($comming == "mohamed"){
            ?>
        <form  method="post">
        <input type="hidden" name="del" value="<?php  echo $product['link_name']  ?>">
        <button type="submit" name="submit"  class="btn btn-info">delete</button>
        </form>
        <?php
          }
        ?>

<form  method="post" action="favorite.php">
        <input type="hidden" name="del" value="<?php  echo $product['link_name']  ?>">
        <button type="submit" name="favorite"  class="btn btn-warning">addto fav</button>
        </form>


        <form  method="post" action="more.php">
        <input type="hidden" name="del" value="<?php  echo $product['link_name']  ?>">
        <button type="submit" name="more"  class="btn btn-danger">more</button>
        </form>
      </div>


    </div>
  </div>
  
  
              <?php
                }
              }

            else {
                    echo "اسم المستخدم أو كلمة المرور غير صحيحة";
                } 
        }
           
}




         catch(PDOException $e) {
            echo "فشل الاتصال: " . $e->getMessage();
        }


        ?>
        </div>