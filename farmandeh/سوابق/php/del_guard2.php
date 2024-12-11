<?php
session_start();
$servername = "localhost";
$dbusername = "root";
$dbpassword = "mysql";
$dbname = "tavana";

$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);
if ($conn->connect_error) {
  die("اتصال به پایگاه داده ناموفق بود: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
          $a = $_SESSION["inter"];
          $pe_code = $_SESSION["pe_code"];
          $day= $_POST["day"];
          $vazif = $_POST["vazif"];

          $sql2 = "UPDATE `student` SET`guard_ok`= 1 WHERE personnal_id = '$pe_code'";
          if ($conn->query($sql2) === TRUE){
          // echo"$a";
          // echo"$pe_code";
          // echo"$day";
          // echo"$vazif";
          $sql ="INSERT INTO `guard` (`row`, `pers_code`, `date`, `far_per`, `vazifeh`, `day`) VALUES (NULL, '$pe_code', CURRENT_TIMESTAMP, '$a', '$vazif', '$day')";
          if ($conn->query($sql) === TRUE) {
             header("Location:../../سوابق.php");
            
            } 
             else {
              echo " مشکلی پیش آمد:نمیتوان مقادیر را ثبت کرد ";
             }
            }
          else{
            echo "آپدیت موفقیت آمیز بود";
          }                      
}
$conn->close();
?>