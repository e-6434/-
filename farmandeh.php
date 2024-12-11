<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="farmandeh/main css/nav.css">
  <link rel="stylesheet" href="farmandeh/main css/search.css">
  <link rel="stylesheet" href="farmandeh/فرمانده/main css/section.css">

</head>

<body  >
  <div style="padding-left:16px">
    <div class="tavana">
      <h1 id='title'>
        <سامانه توانا>
      </h1>
    </div>
  </div>

  <div class="topnav">
    <a class="active" href="farmandeh.php">اصلی</a>
    <a href="farmandeh/سوابق.php"><abbr title=" مشاهده سابقه  دانشجویان">سوابق</abbr></a>
    <a href="farmandeh/افزودن.php"> <abbr title="افزودن دانشجو به لیست کلی خودتان">اضافه کردن دانشجو</abbr></a>
    <a href="farmandeh/کل دانشجویان.php"><abbr title="تمام دانشجویان زیر مجموعه شما">کل دانشجویان</abbr></a>
  </div>
</body>
<section class="main" >
  <div class="right">


    <!-- <span> خوش آمدید </span> -->


    <div class="top">
      <div class="card">

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

        $sql = "SELECT * FROM login WHERE personnal_code = '$a' ";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        $name = $row["name"];
        $lname = $row["last_name"];
        $img = $row["img"];
        if ($result == true) {



          echo "<img src= '$img'  style='width:100%'>";
          echo "<h1> $name   $lname</h1>";
          echo "<h4>  آخرین ورود شما:  </h4>";
          echo "<h4> آخرین تغیرات :</h4>";
          // echo"<p class='title' > </p>";
        


        } else if ($result == false) {
          echo " کاربر با مشخصات شما یافت نشد";
        }
        $conn->close();
        ?>
        <!-- <p><button>Contact</button></p> -->
      </div>
    </div>
    <div class="down">
    </div>
  </div>
  <!-- **************************************************************************************** -->

  <div class="left">
    <div class="open">
      <div id="mySidenav" class="sidenav">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <a href="#">About</a>
        <a href="#">Services</a>
        <a href="#">Clients</a>
        <a href="#">Contact</a>
      </div>
      <span style="font-size:10px;cursor:pointer ;margin-right: 10px;" onclick="openNav()" >&#9776; open</span>
    </div>
  </div>
</section>
<script>
  function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
  }

  function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
  }
</script>
</div>
</div>

</html>