<?php
        $servername = "localhost";
        $username = "root";
        $password = "mysql";
        $dbname = "test";

        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("اتصال به پایگاه داده ناموفق بود: " . $conn->connect_error);
        }
        $pid = $_SESSION["username"];
        $sql = "SELECT * FROM user WHERE pid = '$pid'";

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";

                echo "<td>" . $row['faname'] . "</td>";
                echo "<td>" . $row['pid'] . "</td>";
                echo "<td>" . $row['name'] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='8'>هیچ رکوردی یافت نشد.</td></tr>";
        }
        $conn->close();
        ?>