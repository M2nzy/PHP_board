<?php require_once("./config.php"); ?>
<html>
<head> </head>
<body>
<?php session_start();

#SESSION NOT FOUND
if (empty($_SESSION['ID']) || empty($_SESSION['PASSWORD'])) {
    ?><script> alert("Login plz!");
        window.location.href="./login.php";
</script><?php

    }

#SESSION exist
    else {
        if (isset($_GET['no'])) {
            $NO = $_GET['no'];
        }
        $ID = $_SESSION['ID'];
        $PASSWORD = $_SESSION['PASSWORD'];
        $TITLE = $_POST['TITLE'];
        $CONTENT = $_POST['CONTENT'];

        if (isset($NO)) {
            $sql = "SELECT * from board WHERE no=$NO";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);
                #ID check, correct -> update / incorrect -> not found
            if ($row['id'] === $ID) {
                $sql = "UPDATE board SET title='$TITLE', content='$CONTENT' WHERE no=$NO";
            } else {
                ?><script>              alert("Not Found!");
                        window.location.href="./index.php";
</script><?php 
    }
} else {
                #LAST NO check
    $sql = "SELECT max(no)+1 FROM board";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    if ($row['max(no)+1'] == null)
        $NO = 1;
    else
        $NO = $row['max(no)+1'];

    $sql = "INSERT INTO board (no, id, password, title, content, date) VALUES ($NO,'$ID','$PASSWORD','$TITLE','$CONTENT',now())";
}
$result = mysqli_query($conn, $sql) or die("query error");
if ($result) {
    ?><script> alert("WRITE SUCCESS!");
                window.location.href="./index.php";
</script><?php

    }
} ?>
</body>
</html>