<?php require_once("./config.php"); ?>
<html>
<head> </head>
<body>
<?php
if (empty($_GET['no'])) {
    ?><script> alert("Not Found!");
        window.location.href="./index.php";
</script><?php

    } else {
        $NO = $_GET['no'];
        $sql = "SELECT * FROM board WHERE no=$NO";
        $result = mysqli_query($conn, $sql) or die("query");
        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_assoc($result);
            echo "TITLE : " . $row['title']; ?> <br />
                <?php echo "DATE : " . $row['date']; ?> <br />
                <?php echo "ID : " . $row['id'];
                echo "\tHIT : " . $row['hit']; ?> <br />
                <?php echo $row['content']; ?> <br />
                        <a href="./index.php">BOARD</a>
                        <a href="./main.php">MAIN</a>
                        <a href="./write.php?no=<?php echo $NO; ?>">MODIFY</a>
                        <a href="./delete.php?no=<?php echo $NO; ?>">DELETE</a>
<?php $sql = "UPDATE board SET hit=hit+1 WHERE no=$NO";
$result = mysqli_query($conn, $sql);
} else {
    ?><script> alert("Not Found!");
                        window.location.href="./index.php";
</script><?php 
    }
} ?>
</body>
</html>