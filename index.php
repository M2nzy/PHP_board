<?php require_once("./config.php"); ?>
<html>
<head></head>
<body>
<h2>-FREE BOARD-</h2>
<table>
<tr>
        <th>NO</th>
        <th>TITLE</th>
        <th>ID</th>
        <th>DATE</th>
        <th>HIT</th>
</tr>

<?php
$sql = "SELECT * FROM board ORDER BY no DESC";
$result = mysqli_query($conn, $sql);
if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
                $NO = $row['no'];
                $ID = $row['id'];
                $TITLE = $row['title'];
                $DATE = $row['date'];
                $HIT = $row['hit'];
                ?>
<tr>
        <td><?php echo $NO ?></td>
        <td><a href="./board.php?no=<?php echo $NO ?>"><?php echo $TITLE ?></td></a>
        <td><?php echo $ID ?></td>
        <td><?php echo $DATE ?></td>
        <td><?php echo $HIT ?></td>
</tr>
<?php
        }
} ?>
</table>
<a href="./main.php">MAIN</a>
<a href="./write.php">WRITE</a>
</body>
</html>