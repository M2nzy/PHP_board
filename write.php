<?php 
require_once("./config.php");

session_start();
if (empty($_SESSION['ID'])) {
    ?> <script> alert("Login plz!");
        window.location.href="./login.php";
</script>
<?php 
} 

else {
    $ID = $_SESSION['ID'];

    if (isset($_GET['no'])) {
        $NO = $_GET['no'];

        $sql = "SELECT * FROM board WHERE no=$NO";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_assoc($result);
            if ($ID === $row['id']) {
                $TITLE = $row['title'];
                $CONTENT = $row['content'];
            } else {
                ?><script> alert("inaccessible!");
                                history.back();
                </script><?php 
            }
        } else {
                ?><script> alert("Not Found!");
                window.location.href="./index.php";
                </script><?php 
        }
    } ?>

        <form method="POST" action="./write_result.php<?php if (isset($NO)) echo '?no=' . $NO ?> ">

        <?php echo "TITLE " ?>
        <input type="text" name="TITLE" value="<?php if (isset($TITLE)) echo $TITLE; ?>"><br />

        <strong><?php echo "ID : " . $ID ?><br /></strong>

        <?php echo "CONTENT " ?><br />
        <textarea name="CONTENT" rows="10" cols="60"><?php if (isset($CONTENT)) echo $CONTENT; ?></textarea><br />

        <input type="submit" value="WRITE">
        </form>
        <a href="./index.php">BOARD</a>
        <a href="./main.php">MAIN</a>
<?php 
} ?>

</body>
</html>