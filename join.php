<?php require_once("./config.php"); ?>

<html>
<head></head>
<body>

<h2>-JOIN-</h2>

<form action="join_result.php" method="POST">
<?php echo "ID " ?><input type="text" name="ID">
<input type="submit" value="JOIN"><br />
<?php echo "PASSWORD " ?><input type="password" name="PASSWORD">

<a href="./login.php">HOME</a>
</form>

</body>
</html>