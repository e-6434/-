<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="main css/nav.css">
<link rel="stylesheet" href="main css/search.css">
<link rel="stylesheet" href="کل دانشجویان/css/table.css">
<link rel="stylesheet" href="کل دانشجویان/css/main.css">


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
      <a  href="افزودن.php">افزودن دانشجو</a>
      <a class="active" href="کل دانشجویان.php">کل دانشجویان </a>
    </div>
    
</body>
<div class="main">
  <div class="right">
    
  </div>
  <div class="left">
      <div class="w3-container">
      <input class="w3-input w3-border w3-padding" type="text" placeholder="لطفا نام دانشجوی مورد نظر را وارد بفرمایید..." id="myInput" onkeyup="myFunction()">
      <table class="w3-table-all w3-margin-top" id="myTable">
      <tr>
          <th>نام </th>
          <th> نام خانوادگی </th>
          <th>رسته</th>
          <th>شماره پرسنلی</th>
          <th>شماره دانشجویی</th>
          <th>وضعیت نگهبانی</th>
          <th>وضعیت پاسداری</th>
          <th>وضعیت خروج</th>
          <th> نام گروهان</th>
          <th> برسی وضعیت </th>
      </tr>

    <?php

    $servername = "localhost";
    $username = "root";
    $password = "mysql";
    $dbname = "tavana";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }

    session_start();
    $a = $_SESSION["inter"];

    $sql = "SELECT * FROM student WHERE far_per = '$a' ";
    $result = $conn->query($sql);

      if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";

            echo "<td>" . $row["name"] . "</td>";
            echo "<td>" . $row["last_name"]             . "</td>";
            echo "<td>" . $row["Expertise"]             . "</td>";
            echo "<td>" . $row["personnal_id"]     . "</td>";
            echo "<td>" . $row["student_number"]   . "</td>";
            echo "<td>" . $row["guard"]            .  "</td>";
            echo "<td>" . $row["uni_guard"]        . "</td>";
            echo "<td>" . $row["exit"]             ."</td>";
            echo "<td>" . $row["company"]              . "</td>";
            echo "<td>" ."<a href=#> برسی  </a>"      . "</td>";
            echo "</tr>";
        }
      }
      else {
      }
      $conn->close();
      ?>
      </table>
    
    </div>
  </div>
    
     
</div>
<script>
  function myFunction() {
    var input, filter, table, tr, td, i;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    table = document.getElementById("myTable");
    tr = table.getElementsByTagName("tr");
    for (i = 0; i < tr.length; i++) {
      td = tr[i].getElementsByTagName("td")[0];
      if (td) {
        txtValue = td.textContent || td.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
          tr[i].style.display = "";
        } else {
          tr[i].style.display = "none";
        }
      }
    }
  }
  </script>
</html>
