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
      $guard = $_POST["guard"];
      $sql3="DELETE FROM guard WHERE pers_code = '$guard'";
     if ($conn->query($sql3) === TRUE){  
      $sql2 = "UPDATE `student` SET`guard_ok`= 0 WHERE personnal_id = '$guard'";
      if ($conn->query($sql2) === TRUE){
          $sql = "UPDATE `student` SET`guard`='no' WHERE personnal_id = '$guard'";
            if ($conn->query($sql) === TRUE) {
                header("Location:../../سوابق.php");
          } else {
                 echo "ریکورد مورد نظر آپدیت نشد";
                 }
       }else {
          echo "نتوانستیم مقدار guard_ok را برابر 0کنیم  ";
       }           
      }else {
        echo " حذف  از جدول نا موفق بود";
      }
    }

$conn->close();
?>