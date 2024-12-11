<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="main css/nav.css">
  <link rel="stylesheet" href="main css/search.css">
  <link rel="stylesheet" href="سوابق/css/body.css">
  <link rel="stylesheet" href="سوابق/css/table.css">
  <link rel="stylesheet" href="سوابق/css/select.css">



</head>

<body>


  <div style="padding-left:16px">
    <div>
      <h1 id='title'>
        < سامانه توانا>
      </h1>
    </div>
  </div>

  <div class="topnav">
    <a href="../farmandeh.php">اصلی</a>
    <a class="active" href="سوابق.html">سوابق</a>
    <a href="افزودن.php">افزودن دانشجو</a>
    <a href="کل دانشجویان.php">کل دانشجویان </a>
  </div><!--top nav-->
</body>

<div class="main">
  <div class="right">
    right
  </div>
  <div class="left">
    <div class="leftup">
      <button onclick="topFunction()" id="ttt" title="Go to top">کل نگهبانان </button>
      <div style="background-color:lightgrey;padding: 1px">
        <form action="سوابق/php/guard.php" method="post">
          <div class="w3-container">
            <input class="w3-input w3-border w3-padding" type="text"
              placeholder="لطفا نام دانشجوی مورد نظر را وارد بفرمایید..." id="myInput" onkeyup="myFunction()">
            <table class="w3-table-all w3-margin-top" id="myTable">
              <tr>
                <th>نام </th>
                <th> نام خانوادگی </th>
                <th>رسته</th>
                <th> نام گروهان</th>
                <th> وضعیت نگهبانی</th>
                <th> انتخاب نگهبانی</th>
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
                  $ss = $row["personnal_id"];
                  echo "<tr>";
                  echo "<td>" . $row["name"] . "</td>";
                  echo "<td>" . $row["last_name"] . "</td>";
                  echo "<td>" . $row["Expertise"] . "</td>";
                  echo "<td>" . $row["company"] . "</td>";
                  echo "<td>" . $row["guard"] . "</td>";
                  echo "<td>" . "<input type='radio' id='guard' name='guard' value='$ss'>
      <label >  انتخاب </label><br>    " . "</td>";
                  echo "</tr>";
                }
              } else {
              }
              $conn->close();
              ?>
            </table>

          </div>
          <button class="button" style="background-color:cornflowerblue;"><span>ثبت </span></button>
        </form>

      </div>

    </div>
    <div class="leftdown">
      <form id="regForm" action="سوابق/php/del_guard.php" method="post">
        <!-- One "tab" for each step in the form: -->
        <div class="tab">
          <h1>لیست کل نگهبانان:</h1>
          <div class="w3-container">
            <table class="w3-table-all w3-margin-top" id="myTable">
              <tr>
                <th>نام </th>
                <th> نام خانوادگی </th>
                <th>رسته</th>
                <th>حذف دانشجو</th>
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

              $a = $_SESSION["inter"];
              $sql = "SELECT * FROM student WHERE far_per = '$a' and  guard ='YES' ";
              $result = $conn->query($sql);
              if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                  $ss = $row["personnal_id"];
                  echo "<tr >";
                  echo "<td>" . $row["name"] . "</td>";
                  echo "<td>" . $row["last_name"] . "</td>";
                  echo "<td>" . $row["Expertise"] . "</td>";
                  echo "<td>" . "<input type='radio' id='guard' name='guard' value='$ss'>
                <label >  انتخاب  </label><br>  " . "</td>";
                  echo "</tr>";
                }
              }
              $conn->close();
              ?>
            </table>

          </div>
          <button class="button"><span>حذف </span></button>
        </div>
      </form>
      <form id="regForm" action="سوابق/php/del_guard2.php" method="post">
        <div class="tab">
          <h1>مشخصات نگهبانان :</h1>
          <form>
            <div class="w3-container">
              <table class="w3-table-all w3-margin-top" id="myTable">
                <tr>
                  <th>نام </th>
                  <th> نام خانوادگی </th>
                  <th>رسته</th>
                  <th>وظیفه دانشجوی مورد نظر را وارد کنید </th>
                  <th>روز:</th>

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

                $a = $_SESSION["inter"];

                $sql = "SELECT * FROM student WHERE far_per = '$a' and  guard ='YES' and guard_ok = 0 ";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {

                  while ($row = $result->fetch_assoc()) {

                    $ss = $row["personnal_id"];
                    $_SESSION["pe_code"] = $ss;

                    echo "<tr >";
                    echo "<td>" . $row["name"] . "</td>";
                    echo "<td>" . $row["last_name"] . "</td>";
                    echo "<td>" . $row["Expertise"] . "</td>";
                    echo "<td> 
                    <select id='vazif' name='vazif'>
                      <option value='none' > ---  </option>
                      <option value='( گروهبان نگهبان گردان )' > گروهبان نگهبان گردان </option>
                      <option value='( معاون گروهبان نگهبان گردان )' > معاون گروهبان نگهبان گردان </option>
                      <option value='( گروهبان نگهبان گروهان )' > گروهبان نگهبان گروهان </option>
                      <option value='( معاون گروهبان نگهبان گروهان )' > معاون گروهبان نگهبان گروهان </option>
                      <option value='( پاس سرویس )' > پاس سرویس </option>
                      <option value='( پاس حمام )' > پاس حمام </option>
                      <option value='( پاس یک )' > پاس یک </option>
                      <option value='( پاس دو )' > پاس دو </option>
                      <option value='( پاس سه )' > پاس سه </option>
                    
                    </select>";
                    echo "<td> 
                    <select id='day' name='day'>
                      <option value='none' > ---  </option>
                      <option value='( شنبه )' >  شنبه   </option>
                      <option value='( یک شنبه )' >  یکشنبه   </option>
                      <option value='( دوشنبه )' >  دوشنبه  </option>
                      <option value='( سه شنبه )' >  سه شنبه   </option>
                      <option value='( چهارشنبه )' >  چهارشنبه </option>
                      <option value='( پنج شنبه )' >  پنجشنبه </option>
                      <option value='( چمعه )' >  جمعه </option>

                    </select>";
                    echo "</tr>";
                  }
                } else {
                  echo " <h1>وظیفه تمامی دانشجویان ثبت گردیده است </h1>";
                  echo "<br>
                  <br>
                  <a href='سوابق/php/guard_print.php'> برای پرینت کلیک کنید </a>
                  <br>
                  <br>";
                }
                $conn->close();
                ?>
              </table>

            </div>
            <button class="button"><span>ثبت </span></button>

        </div>
        
       
      </form>

      <form id="regForm" action="سوابق/php/del_guard3.php" method="post">
        <div class="tab">
          <h1>لوحه نگهبانی </h1>
          <form>

            <div class="w3-container">
              <table class="w3-table-all w3-margin-top" id="myTable">
                <tr>
                  <th>نام </th>
                  <th> نام خانوادگی </th>
                  <th>وظیفه </th>
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

                $a = $_SESSION["inter"];

                $sql = "SELECT
                student.name,
                student.last_name, 
                guard.vazifeh,
                guard.day,
                guard.date
                FROM student RIGHT JOIN guard ON guard.pers_code = student.personnal_id
                WHERE student.far_per = '$a'";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {

                  while ($row = $result->fetch_assoc()) {
                    echo "<tr >";
                    echo "<td>" . $row["name"] . "</td>";
                    echo "<td>" . $row["last_name"] . "</td>";
                    echo "<td>" . $row["vazifeh"] . "</td>";
                    echo "<td>" . $row["day"] . "</td>";
                    echo "<td>" . $row["date"] . "</td>";
                    echo "</tr>";
                  }

                } else {
                  echo " <h1> نگهبانی وجود ندارد</h1>";

                }

                $conn->close();
                ?>
              </table>
              <a id="rr" href="سوابق/php/guard_print.php"> برای پرینت کلیک کنید </a>

            </div>



        </div>

      </form>
      </form>
      <div style="margin-right: 60px;">
        <button type="button" id="prevBtn" onclick="nextPrev(-1)">قبلی</button>
        <button type="button" id="nextBtn" onclick="nextPrev(1)"> بعدی </button>
        <button id="myBtn">راهنما  </button>
        <div id="myModal" class="modal">

          <div  class="modal-content">
            <div  class="modal-header">
              <span class="close">&times;</span>
              <h2>راهنمای  وارد کردن وظیفه</h2>
            </div>
            <div class="modal-body">
              <p>توجه !</p>
              <p>برای وارد کردن وظیفه نگهبان حتما باید یک  به یک و از پایین وارد کنید</p>
              <img style="width: 70%;" src="img/eror/eror1.png" alt="تصویر یافت نشد">
            </div>
            <div   class="modal-footer">
              <h3>درصورت بی توجهی  به نحوه پر کردن مقادیر،  سیستم به صورت خودکار یک عبارت وارد خواهد کرد</h3>
              
            </div>
            <img style="width: 70%; "; src="img/eror/eror2.png" alt="تصویر یافت نشد">
          </div>

        </div>
      </div>
    </div>
    <!-- Circles which indicates the steps of the form: -->
    <div style="text-align:center;margin-top:40px;">
      <span class="step">1</span>
      <span class="step">2</span>
      <span class="step">3</span>
    </div>
  </div>
</div><!--left-->

</div> <!--main-->



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
<!-- برای هشدار است -->
<script>
  // Get the modal
  var modal = document.getElementById("myModal");

  // Get the button that opens the modal
  var btn = document.getElementById("myBtn");

  // Get the <span> element that closes the modal
  var span = document.getElementsByClassName("close")[0];

  // When the user clicks the button, open the modal 
  btn.onclick = function () {
    modal.style.display = "block";
  }

  // When the user clicks on <span> (x), close the modal
  span.onclick = function () {
    modal.style.display = "none";
  }

  // When the user clicks anywhere outside of the modal, close it
  window.onclick = function (event) {
    if (event.target == modal) {
      modal.style.display = "none";
    }
  }
</script>
<!-- *********************************************************************************** -->
<script>
  var currentTab = 0; // Current tab is set to be the first tab (0)
  showTab(currentTab); // Display the current tab

  function showTab(n) {
    // This function will display the specified tab of the form...
    var x = document.getElementsByClassName("tab");
    x[n].style.display = "block";
    //... and fix the Previous/Next buttons:
    if (n == 0) {
      document.getElementById("prevBtn").style.display = "none";
    } else {
      document.getElementById("prevBtn").style.display = "inline";
    }
    if (n == (x.length - 1)) {
      document.getElementById("nextBtn").innerHTML = "تمام";
    } else {
      document.getElementById("nextBtn").innerHTML = "بعدی";
    }
    //... and run a function that will display the correct step indicator:
    fixStepIndicator(n)
  }

  function nextPrev(n) {
    // This function will figure out which tab to display
    var x = document.getElementsByClassName("tab");
    // Exit the function if any field in the current tab is invalid:
    if (n == 1 && !validateForm()) return false;
    // Hide the current tab:
    x[currentTab].style.display = "none";
    // Increase or decrease the current tab by 1:
    currentTab = currentTab + n;
    // if you have reached the end of the form...
    if (currentTab >= x.length) {
      // ... the form gets submitted:
      document.getElementById("regForm").submit();
      return false;
    }
    // Otherwise, display the correct tab:
    showTab(currentTab);
  }

  function validateForm() {
    // This function deals with validation of the form fields
    var x, y, i, valid = true;
    x = document.getElementsByClassName("tab");
    y = x[currentTab].getElementsByTagName("input");
    // A loop that checks every input field in the current tab:
    for (i = 0; i < y.length; i++) {
      // If a field is empty...
      if (y[i].value == "") {
        // add an "invalid" class to the field:
        y[i].className += " invalid";
        // and set the current valid status to false
        valid = false;
      }
    }
    // If the valid status is true, mark the step as finished and valid:
    if (valid) {
      document.getElementsByClassName("step")[currentTab].className += " finish";
    }
    return valid; // return the valid status
  }

  function fixStepIndicator(n) {
    // This function removes the "active" class of all steps...
    var i, x = document.getElementsByClassName("step");
    for (i = 0; i < x.length; i++) {
      x[i].className = x[i].className.replace(" active", "");
    }
    //... and adds the "active" class on the current step:
    x[n].className += " active";
  }
</script>
<script>
  // Get the button
  let mybutton = document.getElementById("ttt");

  // When the user scrolls down 20px from the top of the document, show the button
  window.onscroll = function () { scrollFunction() };

  function scrollFunction() {
    if (document.body.scrollTop > 0 || document.documentElement.scrollTop > 0) {
      mybutton.style.display = "block";
    } else {
      mybutton.style.display = "none";
    }
  }

  // When the user clicks on the button, scroll to the top of the document
  function topFunction() {
    document.body.scrollTop = 2100;
    document.documentElement.scrollTop = 2100;
  }
</script>

</script>


</html>