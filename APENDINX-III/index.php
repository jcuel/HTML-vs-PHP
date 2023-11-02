<?php
require_once("config.php");
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta charset="utf-8">
		<title>PHP GURUKUL | DEMO</title>
		<meta name="generator" content="Bootply" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<!--[if lt IE 9]>
			<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<link href="css/styles.css" rel="stylesheet">
		  	
	</head>
	<body>
<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
	<div class="navbar-header">
        
		<h4 style="padding-left: 100px;padding-top: 20px;">PHP GURUKUL | Programming Blog</h4>
	</div>

</nav>

<div class="container-fluid">

  
  <!--center-->
  <div class="col-sm-8">
    <div class="row">
      <div class="col-xs-12">
        <h3 style="padding-left: 100px;">Search employee data from database on the basis of Name, Email, Mobile Number and Employee ID</h3>
		<hr >
		<form name="bwdatesdata" action="" method="post" action="">
  <table width="100%" height="117"  border="0">
<tr>
    <th width="27%" height="63" scope="row">Search :</th>
    <td width="73%">
<input id="searchdata" type="text" name="searchdata" required="true" class="form-control">
    	</td>
  </tr>

<tr>
    <th width="27%" height="63" scope="row"></th>
    <td width="73%">
    	<button class="btn-primary btn" type="submit" name="search">Submit</button>
  </tr>
 
</table>
     </form>
 
      </div>
    </div>
    <hr>
      <div class="row">
      <div class="col-xs-12">
      	 <?php
if(isset($_POST['search']))
{ 

$sdata=$_POST['searchdata'];
  ?>
        <h3 style="padding-left: 100px;color:blue">Result against "<?php echo $sdata;?>" keyword</h3>
		<hr >
		<div class="row">
                            <table class="table table-bordered" width="100%"  border="0" style="padding-left:40px">
                                <thead>
                                    <tr>
                                        <th scope="col">S.NO</th>
                                        <th scope="col">Employee Name</th>
                                        <th scope="col">Department</th>
                                        <th scope="col">Mobile Number</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Employee ID</th>
                                        <th scope="col">Joining Date</th>
                                      
                                    </tr>
                                </thead>
                                <?php
$ret=mysqli_query($con,"select * from  tblempdata where EmployeeName like '%$sdata%' || Email like '%$sdata%' || MobileNumber like '%$sdata%' || EmpID like '%$sdata%'");
$num=mysqli_num_rows($ret);
if($num>0){
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
                                <tbody>
                                    <tr data-expanded="true">
            <td><?php echo $cnt;?></td>
              
                  <td><?php  echo $row['EmployeeName'];?></td>
                  <td><?php  echo $row['Department'];?></td>
                  <td><?php  echo $row['MobileNumber'];?></td>
                  <td><?php  echo $row['Email'];?></td>
                  <td> <?php  echo $row['EmpID'];?></td>
                  <td><?php  echo $row['JoiningDate'];?></td>
                </tr>
                 <?php 
$cnt=$cnt+1;
} } else { ?>
  <tr>
    <td colspan="8"> No record found against this search</td>

  </tr>
   
<?php } }?>
                                    
                                    
                                   
                                   
                                </tbody>
                            </table>
                           
                        </div>
 
      </div>
    </div>  
   
  </div><!--/center-->

  <hr>
</div><!--/container-fluid-->
	<!-- script references -->
		<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
	</body>
</html>
