<?php
session_start();
if (!$_SESSION['admin_id'] ||  !($_SESSION['type'] =='Supervisor')) {
  header("location: logout.php");
}
else{


$con = mysqli_connect("localhost","root","","meskel_flower_production") or die("Connection could not be Established");
?>
<!DOCTYPE HTML>
<html>
<head>
<title>Ethio Gambia | Production </title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Ethio Gambia" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
<!--<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />-->
<!-- Custom Theme files -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link href="css/font-awesome.css" rel="stylesheet">
<script src="js/jquery.min.js"> </script>
<script src="js/bootstrap.min.js"> </script>

<!-- Mainly scripts -->
<script src="js/jquery.metisMenu.js"></script>
<script src="js/jquery.slimscroll.min.js"></script>
<!-- Custom and plugin javascript -->
<link href="css/custom.css" rel="stylesheet">
<script src="js/custom.js"></script>
<script>
$(document).ready(function(){$('[data-toggle="tooltip"]').tooltip();});
</script>
<script src="js/screenfull.js"></script>
		<script>
		$(function () {
			$('#supported').text('Supported/allowed: ' + !!screenfull.enabled);

			if (!screenfull.enabled) {
				return false;
			}



			$('#toggle').click(function () {
				screenfull.toggle($('#container')[0]);
			});



		});
		</script>

<!----->

</head>
<body>
<div id="wrapper">
        <!----->
        <nav class="navbar-default navbar-static-top" role="navigation">
             <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
               <h1> <a class="navbar-brand" href="super_dashboard.php">Ethio Gambia</a></h1>
			   </div>
			 <div class=" border-bottom">
        	<div class="full-left">
        	  <section class="full-top">
				<button id="toggle"><i class="fa fa-arrows-alt"></i></button>
			</section>

           </div>


            <!-- Brand and toggle get grouped for better mobile display -->

		   <!-- Collect the nav links, forms, and other content for toggling -->
		    <div class="drop-men" >
		        <ul class=" nav_1">
					<li class="dropdown">
		              <a href="#" class="dropdown-toggle dropdown-at" data-toggle="dropdown"><span class=" name-caret">
		              <?php
                      $sel = "SELECT * FROM admin WHERE admin_id=".$_SESSION['admin_id'];
                      $run = mysqli_query($con,$sel);
                        #echo $_SESSION['employee_id'];
                        while($row = mysqli_fetch_assoc($run)) {
                        echo   $row["username"];
                    }
                      ?>

		              	<i class="caret"></i></span><img src="images/usersm.png"></a>
		              <ul class="dropdown-menu " role="menu">
		                <li><a href="logout.php"><i class="fa fa-user"></i>Log Out</a></li>
		              </ul>
		            </li>

		        </ul>
		     </div><!-- /.navbar-collapse -->
			<div class="clearfix">

     </div>

		    <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                <?php include 'super_nav.php'; ?>
            </div>
			</div>
        </nav>
		 <div id="page-wrapper" class="gray-bg dashbard-1">
       <div class="content-main">

 	<!--banner-->
		   <div class="banner" style="padding-bottom: 1em;">
		    	<h3>
				Blow Production Entries
				</h3>
		    <hr>

        <form action="#" method="GET">
                <div class="input-group input-group-in" style="padding-bottom: 0em;">
                    <input name="search" class="form-control2 input-search" placeholder="Search..." type="text">
                    <span class="input-group-btn">
                       <button  type="submit" class="btn btn-success" type="button"><i class="fa fa-search"></i></button>
                    </span>
                </div><!-- Input Group -->
            </form>
        </div>

		<!--//banner-->
 	<!--grid-->
 	<div class="validation-system">

 		<div class="validation-form">
 	<!---->

  <?php
  if (isset($_GET['search'])) {
    $search = mysqli_real_escape_string($con,$_GET['search']);
      $sel = "SELECT * from production_entry WHERE employee_name LIKE '%$search%' OR machine_id LIKE '%$search%' OR product_code LIKE '%$search%' OR shift LIKE '%$search%' OR preform_id LIKE '%$search%'  AND type='blow' ORDER BY activity_date DESC" ;

      $run = mysqli_query($con, $sel);
  $check = mysqli_num_rows($run);
  if ($check ==0 || empty($search)) {
    echo'<br><div class="alert alert-danger" role="danger"><strong>Sorry!</strong> 0 results found....Please try again</div>';
  } else{
    ?>

      <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">Employee Name</th>
      <th scope="col">Shift</th>
      <th scope="col">Date</th>
      <th scope="col">Machine Id</th>
      <th scope="col">Preform Id</th>
      <th scope="col">Product Code</th>
      <th scope="col">Produced</th>
      <th scope="col">Damaged</th>
      <th scope="col">Edit</th>

    </tr>
  </thead>
  <?php

      $i = 0;

  while ($row=mysqli_fetch_array($run)) {
       $id =$row['production_id'];
      $employee_name = $row['employee_name'];
      $shift = $row['shift'];
      $activity_date = $row['activity_date'];
      $machine_id = $row['machine_id'];
      $preform_id = $row['preform_id'];
      $product_code = $row['product_code'];
      $product_qty = $row['product_qty'];
      $damaged_qty = $row['damaged_qty'];
      $edit = $row['edit'];
      $i++;
  ?>
  <tr>
   <td><?php echo $employee_name;?></td>
      <td><?php echo $shift;?></td>
      <td><?php echo $activity_date;?></td>
      <td><?php echo $machine_id;?></td>
      <td><?php echo $preform_id;?></td>
      <td><?php echo $product_code;?></td>
      <td><?php echo $product_qty;?></td>
      <td><?php echo $damaged_qty;?></td>
      <?php if ($edit==1) {
        echo '<td><a class="btn btn-xs btn-success warning_4" disabled="" data-toggle="tooltip" title="already edited" href="super_edit_entry.php?id=<?php echo $id;?>">Edit</a></td>';
      }else {
        echo "<td><a class='btn btn-xs btn-success warning_4' href='super_edit_entry.php?id=$id'>Edit</a></td>";
      } ?>
  <?php }}
    }else{
  $sel = "SELECT * from production_entry WHERE type='blow' ORDER BY activity_date DESC ";
  $run = mysqli_query($con, $sel); ?>
 <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">Employee Name</th>
      <th scope="col">Shift</th>
      <th scope="col">Date</th>
      <th scope="col">Machine Id</th>
      <th scope="col">Preform Id</th>
      <th scope="col">Product Code</th>
      <th scope="col">Produced</th>
      <th scope="col">Damaged</th>
      <th scope="col">Edit</th>
    </tr>
  </thead>
  <?php

  $i = 0;

  while ($row=mysqli_fetch_array($run)) {
      $id =$row['production_id'];
      $employee_name = $row['employee_name'];
      $shift = $row['shift'];
      $activity_date = $row['activity_date'];
      $machine_id = $row['machine_id'];
      $preform_id = $row['preform_id'];
      $product_code = $row['product_code'];
      $product_qty = $row['product_qty'];
      $damaged_qty = $row['damaged_qty'];
      $edit = $row['edit'];
      $i++;

  ?>
  <tbody>
    <tr>


      <td><?php echo $employee_name;?></td>
      <td><?php echo $shift;?></td>
      <td><?php echo $activity_date;?></td>
      <td><?php echo $machine_id;?></td>
      <td><?php echo $preform_id;?></td>
      <td><?php echo $product_code;?></td>
      <td><?php echo $product_qty;?></td>
      <td><?php echo $damaged_qty;?></td>
      <?php if ($edit==1) {
        echo '<td><a class="btn btn-xs btn-success warning_4" disabled="" data-toggle="tooltip" title="already edited" href="super_edit_entry.php?id=<?php echo $id;?>">Edit</a></td>';
      }else {
        echo "<td><a class='btn btn-xs btn-success warning_4' href='super_edit_entry.php?id=$id'>Edit</a></td>";
      } ?>

    </tr>
   <?php }} ?>
  </tbody>
</table>


 </div>

</div>
 	<!--//grid-->
		<!---->
<div class="copy">
            <p> &copy;  Ethio Gambia.</p>	    </div>
		</div>
		</div>
		<div class="clearfix"> </div>
       </div>

<!---->
<!--scrolling js-->
	<script src="js/jquery.nicescroll.js"></script>
	<script src="js/scripts.js"></script>
	<!--//scrolling js-->
</body>
</html>
<?php
}
?>
