<?php
require '../../include/db_conn.php';
page_protect();

	$planid =$_POST['planid'];
    $name = $_POST['planname'];
    $desc = $_POST['desc'];
    $planval = $_POST['planval'];
    $amount = $_POST['amount'];

   //Inserting data into plan table
    $query="insert into plan(pid,planName,description,validity,amount,active) values('$planid','$name','$desc','$planval','$amount','yes')";



	 if(mysqli_query($con,$query)==1){

        echo "<head><script>alert('Plan Eklendi ');</script></head></html>";
        echo "<meta http-equiv='refresh' content='0; url=yeni_plan.php'>";

      }

    else{
        echo "<head><script>alert('Başarısız');</script></head></html>";
        echo "error".mysqli_error($con);
      }

?>
