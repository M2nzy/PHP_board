<?php require_once("./config.php"); ?>

<html>
<head></head>
<body>
<?php
if ((empty($_POST['ID'])) || empty($_POST['PASSWORD'])) exit;

$ID = $_POST['ID'];
$PASSWORD = $_POST['PASSWORD'];

$sql = "SELECT * FROM member where id='$ID'";
$result = mysqli_query($conn, $sql) or die("query error");

if (mysqli_num_rows($result) == 0) {
    ?><script>
    alert("login fail! ID Not Found");
    history.back();
    </script>
    <?php

} else {
    while ($row = mysqli_fetch_assoc($result)) {
        if ($row['password'] === $PASSWORD) {
            session_start();
            $_SESSION['ID'] = $ID;
            $_SESSION['PASSWORD'] = $PASSWORD;

            ?><script> alert("login success!");
            window.location.href = "./main.php";
            </script>
            <?php

        } else {
            ?><script> alert("login fail! Incorrect Password");
            history.back();
            </script><?php
        }
    }
} ?>

<script>
setTimeout(function(){
    history.back();}, 5000);
</script>

</body>
</html>