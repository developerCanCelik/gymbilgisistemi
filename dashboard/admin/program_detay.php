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
	<link href="a1style.css" rel="stylesheet" type="text/css">
	<style>
    	.page-container .sidebar-menu #main-menu li#routinehassubopen > a {
    	background-color: #0067A4;
    	color: #ffffff;
		}

    </style>
	<script>
	function myFunction()
	{
		var prt=document.getElementById("print");
		var WinPrint=window.open('','','left=0,top=0,width=800,height=900,tollbar=0,scrollbars=0,status=0');
		WinPrint.document.write(prt.innerHTML);
		WinPrint.document.close();
		WinPrint.focus();
		WinPrint.print();
		WinPrint.close();
		setPageHeight("297mm");
		setPageWidth("210mm");
		setHtmlZoom(100);
		//window.location.replace("index.php?query=");
	}
	</script>

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
				<h2>Program Düzenle</h2>
				<hr/>

		<?php
		$id=$_GET['id'];
		$sql="Select * from timetable t Where t.tid=$id";
		$res=mysqli_query($con, $sql);
					 if($res){
						      	$row=mysqli_fetch_array($res,MYSQLI_ASSOC);

						      }

		?>


			<div class="a1-container a1-small a1-padding-32" style="margin-top:2px; margin-bottom:2px;">
        <div class="a1-card-8 a1-white" style="width:600px; margin:0 auto;">
		<div class="a1-container a1-white a1-center">
        	<h6>Bilgiler</h6>
        </div>
       <form id="form1" name="form1" method="post" class="a1-container" action="program_guncelle.php">
		<table width="619" height="673" border="0" align="center">
			<tr>
				<td><input type="hidden" name='tid' value='<?php echo $id?>'></td>
			</tr>
  <tr>
  	<td width='186' height='103'>Program Ad:</td>
    <td height="87" colspan="2"><input type="text" name='routinename' value='<?php echo $row['tname'] ?>'></td>
    </tr>
  <tr>
    <td width="186" height="103">Gün 1:</td>
    <td width="417"><textarea style="resize:none; margin: 0px; width: 230px; height: 53px;" name="day1" id="boxxe" ><?php echo $row['day1'] ?></textarea></td>
  </tr>
  <tr>
    <td height="96">Gün 2:</td>
    <td><textarea style="resize:none; margin: 0px; width: 230px; height: 53px;" name="day2" id="boxxe" ><?php echo $row['day2'] ?></textarea></td>
  </tr>
  <tr>
    <td height="87">Gün 3:</td>
    <td><textarea style="resize:none; margin: 0px; width: 230px; height: 53px;"  name="day3" id="boxxe" ><?php echo $row['day3'] ?></textarea></td>
  </tr>
  <tr>
    <td height="92">Gün 4:</td>
    <td><textarea style="resize:none; margin: 0px; width: 230px; height: 53px;"  name="day4" id="boxxe" ><?php echo $row['day4'] ?></textarea></td>
  </tr>
  <tr>
    <td height="84">Gün 5:</td>
    <td><textarea style="resize:none; margin: 0px; width: 230px; height: 53px;"  name="day5" id="boxxe" ><?php echo $row['day5'] ?></textarea></td>
  </tr>
  <tr>
    <td height="75">Gün 6:</td>
    <td><textarea style="resize:none; margin: 0px; width: 230px; height: 53px;"  name="day6" id="boxxe" ><?php echo $row['day6'] ?></textarea></td>
  </tr>
  <tr>
               <td height="35">&nbsp;</td>
               <td height="35">
			  <input class="a1-btn a1-blue" type="submit" name="submit" id="submit" value="Güncelle">
                 <input class="a1-btn a1-blue" type="reset" name="reset" id="reset" value="Sil"></td>
             </tr>
        </table>
    </form></div>
    </div>



    	</div>

    </body>
	<?php include('footer.php'); ?>
</html>
