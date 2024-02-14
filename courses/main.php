
<?php include 'head.php';?>

<?php include 'hero.php';?>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <form  method="post">
        <p><input type="text" name="filter"></p>
        <p><input type="submit" value="filter"></p>
    </form>



    
    <?php
        $comming=$_COOKIE['username'];

                         
                              // عرض المستخدمين


                              echo "wellcome"."<br>";
                              echo $comming."<br>";
                              echo $comming. "enjoy with your page"."<br>";
                     


        if($comming == "mohamed"){
      
            echo "you are Admin"."<br>";
       $servername = "localhost";
       $username = "root";
        $password ="";
         $dbname = "oop";


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



        } catch(PDOException $e) {
            echo "فشل الاتصال: " . $e->getMessage();
        }
    }
    else{
        echo $comming. "you are user"."<br>";
    }

        
   

    ?>


</body>
</html>
<?php include 'show.php';?>

<?php include 'counter.php';?>

<?php include 'foot.php';?>