<?php require_once("./config.php"); ?>

<html>
<head></head>
<body>
<?php
$ID = $_POST['ID'];
$PASSWORD = $_POST['PASSWORD'];
$sql = "SELECT * FROM member where id='$ID'";
$result = mysqli_query($conn, $sql) or die("sql error");

if (mysqli_num_rows($result) != 0) {
    ?>
    <script>alert("This ID already exists!");
    history.back();</script>
    <?php

} else {
    $sql = "INSERT INTO member (id, password) VALUES ('$ID', '$PASSWORD')";
    $result = mysqli_query($conn, $sql) or die("sql error");
    if ($result) {
        ?><script>alert("JOIN SUCCESS!");
        location.replace('./login.php');
        </script>
        <?php
    } else {
        ?><script>alert("JOIN FAIL!");
        location.replace('./login.php');
        </script>
<?php }
} ?>
</body>
</html>