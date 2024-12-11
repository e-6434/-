<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
table, th, td {
  border: 1px solid black;

}
table th {
  border: 4px solid black;
  border-collapse: collapse;

}
table td {
  border:2px solid black;
  border-collapse: separate;

}
table{
  direction: rtl;
  width: 82%;
  height: 100px;
  text-align: center;
  font-size: 16px;
}
table.center {
  margin-left: auto; 
  margin-right: auto;
}

.e{
  margin-left: 45%;
}
.kkk{
  margin-left:50px;
  background-color: none;
  border: 1px dashed;
  font-size: 25px;
  border-radius: 12px;
}
</style>
</head>
<body>

<table class="center">
  <tr>
    <th>نام </th>
    <th>نام خانوادگی</th> 
    <th>وظیفه</th>
    <th>روز</th>
    <th>تاریخ</th>
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
                $sql = "SELECT
                student.name,
                student.company,
                student.last_name, 
                guard.vazifeh,
                guard.day,
                guard.date
                FROM student RIGHT JOIN guard ON guard.pers_code = student.personnal_id
                WHERE student.far_per = 1";
                $result = $conn->query($sql);
                $comp =' ';
                if ($result->num_rows > 0) {
                  
                  while ($row = $result->fetch_assoc()) {
                     $comp = $row["company"];
                    echo "<tr >";
                    echo "<td>" . $row["name"] . "</td>";
                    echo "<td>" . $row["last_name"] . "</td>";
                    echo "<td>" . $row["vazifeh"] . "</td>";
                    echo "<td>" . $row["day"] . "</td>";
                    echo "<td>" . $row["date"] . "</td>";
                    echo "</tr>";

                  }
                }else{ 
                  echo " <h1 > نگهبانی وجود ندارد</h1>";

                 }
                  echo "<h1 class='e'> گروهان شهید $comp  </h1>";
                $conn->close();
                ?>
              
</table>
<br>
            <br>
            <p style="margin-left:25%;font-size: 20px;"> امضا</p>
            <button class="kkk" onclick="window.print()">پرینت</button>
            <br>
            <br>

</body>
</html>
