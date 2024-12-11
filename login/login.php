<?php
$servername = "localhost";
$dbusername = "root";
$dbpassword = "mysql";
$dbname = "tavana";

$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);
if ($conn->connect_error) {
  die("اتصال به پایگاه داده ناموفق بود: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = $_POST["pid"];
  $password = $_POST["pas"]; 
  $sql = "SELECT * FROM login WHERE personnal_code = $username ";
  $result = $conn->query($sql);

  if (true == $result) {
    $row = $result->fetch_assoc();
    $storedPassword = $row["password"];
    $access = $row["access"];

 
    if ($password == $storedPassword) {
      if($access == "F") {
        header("Location:../farmandeh.php");
        session_start();
        $personnal_code = $row["personnal_code"];
        $_SESSION["inter"] = $personnal_code;
        
      }
      elseif($access == "A"){
        header("Location:../admin.html");
      }
      elseif($access == "D"){
        header("Location:../dezhban.html");
      }
      else{
        echo"دسترسی برای شما تعریف نشده است ";
      };

     
    } else {
  
      echo "احراز هویت ناموفق بود";
    }
  }
}

$conn->close();
?>