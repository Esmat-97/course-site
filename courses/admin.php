<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

   



    
    <?php
        $comming=$_COOKIE['username'];



        $servername = "localhost";
       $username = "root";
        $password ="";
         $dbname = "oop";

                         
         
         if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
             $deletedUsername = $_POST['del'];
         
             // Perform deletion operation based on $deletedUsername
             // Example:
             try {
                 $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                 $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                 
                 $stmt = $conn->prepare("DELETE FROM client WHERE title = :username");
                 $stmt->bindParam(':username', $deletedUsername);
                 $stmt->execute();
         
                 echo "Item deleted successfully.";
             } catch(PDOException $e) {
                 echo "Error: " . $e->getMessage();
             }
         }
         
         


                              // عرض المستخدمين


                              echo "wellcome"."<br>";
                              echo $comming."<br>";
                              echo $comming. "enjoy with your page"."<br>";
                     


        if($comming == "mohamed"){
      
            echo "you are Admin"."<br>";
       

         try {
          
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password); 
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
            $stmt = $conn->prepare("SELECT * FROM client ");
            $stmt->execute();
            $members=$stmt->fetchAll(PDO::FETCH_ASSOC);
           
            if($stmt->rowCount() > 0) {
                ?>
<div class="row row-cols-1 row-cols-md-3 g-4">

          <?php
     foreach ($members as $member) {
          ?>
<div class="col">

    <div class="card h-100">
        <h5 class="card-title"><?php   echo "Username: " . $member['title'] . "<br>"; ?></h5>
        <div class="card-text"><?php echo "Password: " . $member['password'] . "<br>"; ?></div>
        <form  method="post">
        <input type="hidden" name="del" value="<?php   echo  $member['title'] ?>">
        <button type="submit" name="submit" class="btn btn-danger">delete</button>
        </form>
        
        


      </div>
    </div>
       <?php
                   
                }
       ?>

</div>

              <?php

               
                echo "تم تسجيل الدخول بنجاح";
            } else {


                echo "اسم المستخدم أو كلمة المرور غير صحيحة";
            }



        } 
        


        
        catch(PDOException $e) {
            echo "فشل الاتصال: " . $e->getMessage();
        }
    }
    else{
        echo $comming. "you are user"."<br>";
    }

        
   

    ?>


</body>
</html>