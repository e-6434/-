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
$fname = $_POST["fname"];
$lname = $_POST["lname"];
$pcode = $_POST["pcode"];
$shda = $_POST["shda"];
$raste = $_POST["raste"];
$company =$_POST["company"];
session_start();
$inter = $_SESSION["inter"];

$sql = "INSERT INTO  student (`row`, `name`, `last_name`, `personnal_id`, `student_number`, `Expertise`, `company`, `guard`, `uni_guard`, `exit`, `far_per`)
                    VALUES (  null ,'$fname', '$lname',     '$pcode'     ,'$shda',    '$raste' , '$company',  'no' ,   'no'    , 'no','$inter')";

if ($conn->query($sql) === TRUE) {
  echo "با موفقیت ثبت گردید";
  header("");
} else {
  echo "خطا در.. " . $sql . "<br>" . $conn->error;
}
}

else {
 echo " خطا در ثبت ";
}
$conn->close();
?>