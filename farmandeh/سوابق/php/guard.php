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
  $guard = $_POST["guard"];

  session_start();
  $inter = $_SESSION["inter"];

  $sql = "UPDATE `student` SET`guard`='YES' WHERE personnal_id = '$guard'";
  if ($conn->query($sql) === TRUE) {
    header("Location:../../سوابق.php");
  } else {
    echo "  آپدیت موفقیت آمیز نبود";


  }
}
$conn->close();
?>