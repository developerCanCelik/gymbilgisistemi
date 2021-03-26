<?php
require '../../include/db_conn.php';
page_protect();

$msgid = $_POST['name'];
if (strlen($msgid) > 0) {
    mysqli_query($con, "update plan set active ='no' WHERE pid='$msgid'");
    echo "<html><head><script>alert('Başarılı');</script></head></html>";
    echo "<meta http-equiv='refresh' content='0; url=plan_goruntule.php'>";
} else {
    echo "<html><head><script>alert('Başarısız');</script></head></html>";
   echo "error".mysqli_error($con);
}

?>
