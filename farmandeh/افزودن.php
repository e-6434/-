


<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="main css/nav.css">
<link rel="stylesheet" href="main css/search.css">
<link rel="stylesheet" href="افزودن دانشجو/css/add.css">
<link rel="stylesheet" href="افزودن دانشجو/css/table.css">
<link rel="stylesheet" href="افزودن دانشجو/css/main.css">

</head>
<body>

   

    <div style="padding-left:16px">
      <div>
        <h1 id='title'> < سامانه  توانا ></h1>
      </div>
    </div>
    
    <div class="topnav">
      <a  href="../farmandeh.php">اصلی</a>
        <a href="سوابق.php">سوابق</a>
        <a class="active" href="افزودن.php">افزودن دانشجو</a>
        <a  href="کل دانشجویان.php">کل دانشجویان </a>
      </div>
</body>
<div class="main">
  <div class="right">
    
  </div>
  <div class="left">
    <div class="container">
      <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?> " method="post">
        <label for="fname">نام</label>
        <input type="text" id="fname" name="fname" placeholder="نام...">
    
        <label for="lname">نام خانوادگی</label>
        <input type="text" id="lname" name="lname" placeholder="نام خانوادگی...">

        <label for="shda">شماره دانشجویی</label>
        <input type="number" id="shda" name="shda" placeholder="شماره دانشجویی">

        <label for="pcode">شماره پرسنلی</label>
        <input type="number" id="pcode" name="pcode" placeholder="شماره پرسنلی">

        <label for="تخصص"> رسته دانشجوی مورد نظر را وارد کنید </label>
        <select id="raste" name="raste">

          <option value=" نامشخص"> --- </option>
          <option value=" کامپیوتر">مهندسی کامپیوتر</option>
          <option value="الکترونیک"> برق الکترونیک</option>
          <option value="جنگال">برق جنگال</option>
          <option value="تعمیرونگهداری">مهندسی تعمیر و نگه داری</option>
          <option value="هوافضا">مهندسی هوا و فضا</option>
          <option value="مدیریت"> مدیریت</option>
          <option value="جنگنده"> خلبان جنگنده</option>
          <option value="پهپاد"> خلبان پهپاد</option>
        </select>

        <label for="گروهان">  نام گروهان را وارد کنید</label>
        <select id="company" name="company">
          <option accesskey="---" value=" نامشخص"> --- </option>
          <option value=" کریمایی"> شهید کریمایی</option>
          <option value="فصیحی"> شهید فصیحی</option>
          <option value="جدی">شهید جدی</option>

        </select>
        <button onclick="document.getElementById('myTable').style.display='block'";  value="Submit" > ثبت</button>      
        </form>
        <table    class="w3-table-all w3-margin-top" id="myTable" >
        <!-- <tr>
          <th>نام </th>
          <th> نام خانوادگی </th>
          <th>رسته</th>
          <th>شماره پرسنلی</th>
          <th>شماره دانشجویی</th>
          <th> نام گروهان</th>
      </tr> -->
    </div> 
  </div>
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

$sql = "INSERT INTO  student (`row`, `name`, `last_name`, `personnal_id`, `student_number`, `Expertise`, `company`, `guard`, `uni_guard`, `exit`, `far_per`,`filename`)
                    VALUES (  null ,'$fname', '$lname',     '$pcode'     ,'$shda',    '$raste' , '$company',  'no' ,   'no'    , 'no','$inter' ,'no')";


if ($conn->query($sql) === TRUE) {
  echo "ثبت گردید";
  echo "<tr>";
  echo "<td>" . "نام" . "</td>";
  echo "<td>" .  "نام خانوادگی"           . "</td>";
  echo "<td>" .  "شماره پرسنلی"           . "</td>";
  echo "<td>" .  "شماره دانشجویی"    . "</td>";
  echo "<td>" .  "رسته"   . "</td>";
  echo "<td>" .  "گروهان"    . "</td>";
  echo "</tr>";
  echo "<tr>";
  echo "<td>" . $fname . "</td>";
  echo "<td>" .   $lname           . "</td>";
  echo "<td>" .   $pcode           . "</td>";
  echo "<td>" .  $shda    . "</td>";
  echo "<td>" .  $raste    . "</td>";
  echo "<td>" .  $company    . "</td>";
  echo "</tr>";
} else {
  echo "  دانشجوی با مشخصات زیر قبلا ثبت شده است  یا مشخصات وارد شده نادرست است";
  echo "<tr>";
  echo "<td>" . "نام" . "</td>";
  echo "<td>" .  "نام خانوادگی"           . "</td>";
  echo "<td>" .  "شماره پرسنلی"           . "</td>";
  echo "<td>" .  "شماره دانشجویی"    . "</td>";
  echo "<td>" .  "رسته"   . "</td>";
  echo "<td>" .  "گروهان"    . "</td>";
  echo "</tr>";
  echo "<tr>";
  echo "<td>" . $fname . "</td>";
  echo "<td>" .   $lname           . "</td>";
  echo "<td>" .   $pcode           . "</td>";
  echo "<td>" .  $shda    . "</td>";
  echo "<td>" .  $raste    . "</td>";
  echo "<td>" .  $company    . "</td>";
  echo "</tr>";
}
}
$conn->close();
?>
</table>

    </div>
</div>
<script src="افزودن دانشجو/js/d.js">

  </script>
  

</html>
