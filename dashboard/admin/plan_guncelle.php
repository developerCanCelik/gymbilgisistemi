<?php
require '../../include/db_conn.php';
page_protect();


   $id=$_POST['planid'];
   $pname=$_POST['planname'];
   $pdesc=$_POST['desc'];
   $pval=$_POST['planval'];
   $pamt=$_POST['amount'];


    $query1="update plan set planName='".$pname."',description='".$pdesc."',validity='".$pval."',amount='".$pamt."' where pid='".$id."'";

   if(mysqli_query($con,$query1)){

            echo "<html><head><script>alert('Başarılı');</script></head></html>";
            echo "<meta http-equiv='refresh' content='0; url=plan_goruntule.php'>";  
   }
   else{
    echo "<html><head><script>alert('Başarısız');</script></head></html>";
    echo "error".mysqli_error($con);
   }


?>
