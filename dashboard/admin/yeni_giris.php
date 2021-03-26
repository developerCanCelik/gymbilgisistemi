<?php
require '../../include/db_conn.php';
page_protect();
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
    	.page-container .sidebar-menu #main-menu li#regis > a {
    	background-color: #0067A4;
    	color: #ffffff;
		}
       #boxx
	{
		width:220px;
	}</style>

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
									Çıkış <i class="entypo-logout right"></i>
								</a>
							</li>
						</ul>

					</div>

				</div>


        	<h3>Üye Kayıt</h3>

		<hr />

        <div class="a1-container a1-small a1-padding-32" style="margin-top:2px; margin-bottom:2px;">
        <div class="a1-card-8 a1-white" style="width:500px; margin:0 auto;">
		<div class="a1-container a1-white a1-center">
        	<h6>Bilgiler</h6>
        </div>
       <form id="form1" name="form1" method="post" class="a1-container" action="yeni_mesaj.php">
         <table width="100%" border="0" align="center">
         <tr>
           <td height="35"><table width="100%" border="0" align="center">
           	 <tr>
           	   <td height="35">Üye ID:</td>
           	   <td height="35"><input type="text" id="boxx" name="m_id" value=""  required/></td>
         	   </tr>

			   <tr>
               <td height="35">Ad:</td>
               <td height="35"><input name="u_name" id="boxx"  required/></td>
             </tr>
             <tr>
               <td height="35">Adres:</td>
               <td height="35"><input  name="street_name" id="boxx"   required/></td>
             </tr>
             <tr>
               <td height="35">Şehir:</td>
               <td height="35"><input <input type="text" name="city" id="boxx" required/ ></td>
             </tr>
             <tr>
               <td height="35">Posta Kodu:</td>
               <td height="35"><input type="number" name="zipcode" id="boxx" maxlength="6" required / ></td>
             </tr>
            <!--
			<tr>
               <td height="35">Eyalet:</td>
               <td height="35"><input type="text" name="state" id="boxx" required/ size="30"></td>
             </tr>
            <tr>
			-->
               <td height="35">Cinsiyet:</td>
               <td height="35"><select name="gender" id="boxx" required>

					<option value="">--Seçin--</option>
					<option value="Erkek">Erkek</option>
					<option value="Kadın">Kadın</option>
				</select></td>
             </tr>
            <tr>
               <td height="35">Doğum Tarihi:</td>
               <td height="35"><input type="date" name="dob" id="boxx" required/ size="30"></td>
             </tr>
			 <tr>
               <td height="35">Telefon:</td>
               <td height="35"><input type="number" name="mobile" id="boxx" maxlength="10" required/ size="30"></td>
             </tr>
			  <tr>
               <td height="35">Email ID:</td>
               <td height="35"><input type="email" name="email" id="boxx" required/ size="50"></td>
             </tr>
			 <tr>
               <td height="35">Kayıt Tarihi:</td>
               <td height="35"><input type="date" name="jdate" id="boxx" required size="30"></td>
             </tr>
             <tr>
               <td height="35">Ödeme Planı:</td>
               <td height="35"><select name="plan" id="boxx" required onchange="myplandetail(this.value)">
					<option value="">--Seçin--</option>
					<?php
						$query="select * from plan where active='yes'";
						$result=mysqli_query($con,$query);
						if(mysqli_affected_rows($con)!=0){
							while($row=mysqli_fetch_row($result)){
								echo "<option value=".$row[0].">".$row[1]."</option>";
							}
						}

					?>

				</select></td>
             </tr>

	    <tbody id="plandetls">

            </tbody>

             <tr>
             <tr>
               <td height="35">&nbsp;</td>
               <td height="35"><input class="a1-btn a1-blue" type="submit" name="submit" id="submit" value="Kayıt" >
                 <input class="a1-btn a1-blue" type="reset" name="reset" id="reset" value="Sil"></td>
             </tr>
           </table></td>
         </tr>
         </table>
       </form>
    </div>
    </div>

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


			<?php include('footer.php'); ?>
    	</div>

    </body>
</html>
