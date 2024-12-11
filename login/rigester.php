<!DOCTYPE html>
<html lang="fa">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>صفحه ورود</title>
    <link rel="stylesheet" href="bot/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h3 class="text-center">ورود</h3>
                    </div>
                    <div class="card-body">
                        <form method="post" action=" <?php echo $_SERVER['PHP_SELF']; ?>">
                            <div class="mb-3">
                                <label for="name" class="form-label">نام و نام خوانوادگی</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    placeholder="نام کاربری خود را وارد کنید">
                            </div>
                            <div class="mb-3">
                                <label for="pid" class="form-label">شماره پرسنلی</label>
                                <input type="text" class="form-control" id="pid" name="pid"
                                    placeholder="شماره پرسنلی خود را وارد کنید">
                            </div>
                            <div class="mb-3">
                                <label for="pas" class="form-label">رمز عبور</label>
                                <input type="password" class="form-control" id="pas" name="pas"
                                    placeholder="رمز عبور خود را وارد کنید">
                            </div>
                            <div class="mb-3">
                                <label for="faname" class="form-label">نام پدر</label>
                                <input type="text" class="form-control" id="faname" name="faname"
                                    placeholder="نام پدر خود را وارد کنید">
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">ثبت نام</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="bot/bootstrap.bundle.min.js"></script>
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "mysql";
    $dbname = "tavana";
    
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST["name"];
        $pid = $_POST["pid"];
        $faname = $_POST["faname"]; 
        $pas = hash(sha256, $_POST["pas"]);

        $sql = "INSERT INTO login (name,last_name, password, personnal_code) VALUES ('$name', '$faname', '$pas', '$pid')";
        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
            header("Location: index.php");
            exit;
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    $conn->close();
    ?>
</body>

</html>