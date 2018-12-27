<?php require_once("./config.php"); ?>
<html>
<head> </head>
<body>
<?php
session_start();

#Login check
if ((empty($_SESSION['ID'])) || (empty($_SESSION['PASSWORD']))) {
    ?><script>alert("Login plz!");
                window.location.href="./login.php";
</script><?php

    } else {
        $ID = $_SESSION['ID'];
        $PASSWORD = $_SESSION['PASSWORD'];

#ID check
        if (isset($_GET['no'])) {
            $NO = $_GET['no'];
            $sql = "SELECT * FROM board WHERE no=$NO";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) == 1) {
                $row = mysqli_fetch_assoc($result);
                if ($row['id'] === $ID) {
                        #DELETE QUERY
                    $sql = "DELETE FROM board WHERE no=$NO";
                    $result = mysqli_query($conn, $sql);
                    if (mysqli_affected_rows($conn) == 1) {
                        ?><script>alert("DELETE SUCCESS!");
                                        window.location.href="./index.php";
                                </script><?php

                                    } else {
                                        ?><script>alert("DELETE FAIL!");
                                        window.location.href="./index.php";
                                </script><?php

                                    }
                                } else {
                                    ?><script> alert("Inaccessible!");
                                window.location.href="./board.php?no=<?php echo $NO; ?>";
</script><?php 
    }
} else {
    ?><script> alert("Not Found!");
                window.location.href="./index.php";
</script><?php 
    }
} else {
    ?><script> alert("Not Found!");
                        window.location.href="./index.php";
</script><?php

    }
} ?>

</body>
</html>