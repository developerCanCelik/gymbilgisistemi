<?php
require '../../include/db_conn.php';
page_protect();
if (isset($_POST['userID']) && isset($_POST['planID'])) {
    $uid  = $_POST['userID'];
    $planid=$_POST['planID'];
    $query1 = "select * from users WHERE userid='$uid'";

    $result1 = mysqli_query($con, $query1);

    if (mysqli_affected_rows($con) == 1) {
        while ($row1 = mysqli_fetch_array($result1, MYSQLI_ASSOC)) {

            $name = $row1['username'];
            $query2="select * from plan where pid='$planid'";

            $result2=mysqli_query($con,$query2);
            if($result2){
               $planValue=mysqli_fetch_array($result2,MYSQLI_ASSOC);
               $planName=$planValue['planName'];
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>

    <title>Spor Salonu Bilgi Sistemi</title>
     <link rel="stylesheet" href="../../css/style.css"  id="style-resource-5">
    <script type="text/javascript" src="../../js/Script.js"></script>
    <link rel="stylesheet" href="../../css/dashMain.css">
    <link rel="stylesheet" type="text/css" href="../../css/entypo.css">
    <link href="a1style.css" type="text/css" rel="stylesheet">
    <style>
    	.page-container .sidebar-menu #main-menu li#paymnt > a {
    	background-color: #0067A4;
    	color: #ffffff;
		}
	#boxx
	{
		width:220px;
	}
   </style>
</head>
   <body class="page-body  page-fade" onload="collapseSidebar()">

    	<div class="page-container sidebar-collapsed" id="navbarcollapse">

		<div class="sidebar-menu" style="background-color:#212A39;">

			<header class="logo-env">

			<!-- logo -->
			<div class="logo">
				<a href="main.php">

				</a>
			</div>

					<!-- logo collapse icon -->
					<div class="sidebar-collapse" onclick="collapseSidebar()">
				<a href="#" class="sidebar-collapse-icon with-animation"><!-- add class "with-animation" if you want sidebar to have animation during expanding/collapsing transition -->
					<i class="entypo-menu"></i>
				</a>
			</div>



			</header>
    		<?php include('nav.php'); ?>
    	</div>


    		<div class="main-content">

				<div class="row">

					<!-- Profile Info and Notifications -->
					<div class="col-md-6 col-sm-8 clearfix">

					</div>


					<!-- Raw Links -->
					<div class="col-md-6 col-sm-4 clearfix hidden-xs">

						<ul class="list-inline links-list pull-right">



							<li>
								<a href="cikis.php">
									????k???? <i class="entypo-logout right"></i>
								</a>
							</li>
						</ul>

					</div>

				</div>

		<h3>??deme Yap</h3>

		<hr />






		<div class="a1-container a1-small a1-padding-32" style="margin-top:2px; margin-bottom:2px;">
        <div class="a1-card-8 a1-light-gray" style="width:500px; margin:0 auto;">
		<div class="a1-container a1-dark-gray a1-center">
        	<h6>Bilgiler</h6>
        </div>
       <form id="form1" name="form1" method="post" class="a1-container" action="odeme_guncelle.php">
         <table width="100%" border="0" align="center">
         <tr>
           <td height="35"><table width="100%" border="0" align="center">
           	 <tr>
           	   <td height="35">??ye ID:</td>
           	   <td height="35"><input type="text" name="m_id" id="boxx" value="" /></td>
         	   </tr>

			   <tr>
               <td height="35">??sim:</td>
               <td height="35"><input type="text" name="u_name" id="boxx" value="" placeholder="" maxlength="30" />

             </tr>
             <tr>
               <td height="35">??deme Plan??</td>
               <td height="35"><input type="text" name="prevPlan" id="boxx" value="" ></td></td>
             </tr>
             <tr>
               <td height="35">Yeni Plan:</td>
               <td height="35"><select name="plan" id="boxx" required onchange="myplandetail(this.value)">
							<option value="">-- Se??in --</option>
							<?php

							    $query = "select * from plan where active='yes'";

							    //echo $query;
							    $result = mysqli_query($con, $query);

							    if (mysqli_affected_rows($con) != 0) {
							        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
							            echo "<option value=" . $row['pid'] . ">" . $row['planName'] . "</option>";

							        }
							    }

							?>
						</select></td></td>
             </tr>



             <tr>
			  <table id="plandetls">
             </table>


           </table></td>

         </tr>
		  <tr>
               <td height="35">&nbsp;</td>
               <td height="35">&ensp;&ensp;&ensp;&ensp;&ensp;&ensp; &ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp; &ensp;&ensp;&ensp;&ensp;&ensp; &ensp;&ensp;&ensp;&ensp;&ensp;&ensp; <input class="a1-btn a1-blue" type="submit" name="submit" id="submit" value="Ekle" >
                 <input class="a1-btn a1-blue" type="reset" name="reset" id="reset" value="Sil"></td>
             </tr>
         </table>
       </form>
    </div>
    </div>





		<?php include('footer.php'); ?>

		</div>


    </body>
</html>


 <script>
        	function myplandetail(str){

        		if(str==""){
        			document.getElementById("plandetls").innerHTML = "";
        			return;
        		}else{
        			if (window.XMLHttpRequest) {
           		 // code for IE7+, Firefox, Chrome, Opera, Safari
           			 xmlhttp = new XMLHttpRequest();
       				 }
       			 	xmlhttp.onreadystatechange = function() {
            		if (this.readyState == 4 && this.status == 200) {
               		 document.getElementById("plandetls").innerHTML=this.responseText;

            			}
        			};

       				 xmlhttp.open("GET","plan_detay.php?q="+str,true);
       				 xmlhttp.send();
        		}

        	}
        </script>

<?php
} else {

}
?>
