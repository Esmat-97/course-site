

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Form Data</title>
    <style>
    
    .container {
  width: 300px;
  margin: 0 auto;
  display: flex;
  flex-direction: column;
  align-items: center;
  margin-top: 100px;
}

.login-form {
  display: flex;
  flex-direction: column;
  align-items: center;
}

.login-form label {
  display: block;
  margin-bottom: 10px;
}

.login-form input[type="text"],
.login-form input[type="password"] {
  width: 100%;
  padding: 10px;
  margin-bottom: 20px;
  border: 1px solid #ccc;
  border-radius: 5px;
}

.login-form button[type="submit"] {
  width: 100%;
  padding: 10px;
  background-color: #4CAF50;
  color: white;
  border: none;
  border-radius: 5px;
  cursor: pointer;
}

.login-form button[type="submit"]:hover {
  background-color: #45a049;
}

.login-form p {
  margin-top: 20px;
  font-size: 14px;
  text-align: center;
}

.login-form p a {
  color: #4CAF50;
  text-decoration: none;
}

.social-button {
  width: 50px;
  height: 50px;
  background-color: #333;
  color: white;
  border: none;
  border-radius: 50%;
  margin-top: 20px;
  cursor: pointer;
  display: flex;
  align-items: center;
  justify-content: center;
}

.social-button:hover {
  background-color: #444;
}
    
    
    </style>
</head>
<body>
<div class="container">
  <form class="login-form" method="post">
    <label for="username">Username</label>
    <input type="text" id="username" name="username" required>
    <label for="password">Password</label>
    <input type="password" id="password" name="password" required>
    <button type="submit" name="submit">Login</button>
    <p><a href="#">Forgot password?</a></p>
    <p>Or Sign Up Using</p>
    <button class="social-button">f</button>
  </form>
</div>


</body>
</html>

<?php
// معلومات الاتصال بقاعدة البيانات
$servername = "localhost";
$username = "root";
$password ="";
$dbname = "oop";

// بيانات المستخدم المدخلة
$user_input_username = $_POST['username'];
$user_input_password = $_POST['password'];

try {
    // إنشاء اتصال بقاعدة البيانات باستخدام PDO
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // تحديد وضع الاستعلام للتعامل مع الأخطاء
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // استعلام للتحقق من صحة اسم المستخدم وكلمة المرور
    $stmt = $conn->prepare("SELECT * FROM client   WHERE title = :x AND password = :y");
    $stmt->bindParam(':x', $user_input_username);
    $stmt->bindParam(':y', $user_input_password);
    $stmt->execute();

    // تحقق مما إذا كان هناك صف واحد أو أكثر يتطابق مع بيانات المستخدم
    if($stmt->rowCount() > 0) {

        setcookie('username',$user_input_username , time() + 60*60);

      header("location:main.php");
      
        echo "تم تسجيل الدخول بنجاح";
      
       
    } else {
        echo "اسم المستخدم أو كلمة المرور غير صحيحة";
    }
} catch(PDOException $e) {
    echo "فشل الاتصال: " . $e->getMessage();
}
?>