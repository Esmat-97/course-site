<div>
<?php

$servername = "localhost";
$username = "root";
 $password ="";
  $dbname = "oop";




try {
            
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);




            if(isset($_POST['filter'])) {



                $filter = $_POST['filter'];
                // SQL query to select products filtered by name
                $stmt = $conn->prepare("SELECT * FROM courses WHERE  advertiser LIKE ?");
                $stmt->execute(["%$filter%"]);
                // Fetch all filtered products as an associative array
                $products = $stmt->fetchAll(PDO::FETCH_ASSOC);


                if($stmt->rowCount() > 0) {

                    foreach ($products as $product) {
    
                        echo "advertiser: " . $product['advertiser'] ."<br>";
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
        <h5 class="card-title"><?php echo "advertise: " .$product['advertiser']  ?></h5>
        <div class="card-text"><?php  echo "course: " . $product['link_name']; ?></div>
        <div class="card-text"><?php  echo "price: " . $product['retail_price'] ?></div>
        <a href="<?php echo "url: " . $product['link'] ?>">link</a>
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