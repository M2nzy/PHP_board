<?php require_once("./config.php"); ?>

<html>
<head></head>
<body>
<h2>-LOGIN-</h2>

<form action="./login_result.php" method="POST">
<?php echo "ID" ?><input type="text" name="ID">
<input type="submit" value="login"><br>
<?php echo "PASSWORD" ?><input type="password" name="PASSWORD">
<a href="./join.php">JOIN</a>
</form>

</body>
</html>