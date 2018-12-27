<?php require_once("./config.php"); ?>
<html>
<head></head>
<body>
<?php
session_start();

if (empty($_SESSION['ID'])) {
    ?><script>alert("login plz!");
    window.location.href="./login.php";</script><?php
}

$ID = $_SESSION['ID'];

?><h2>-MAIN-</h2>
<h3><?php echo "Hello, [$ID]!"; ?></h3>
<a href="./index.php">BOARD</a>
<a href="./logout.php">LOGOUT</a>
</body>
</html>