# How to Search Employee data from Database using PHP

In this tutorial, we will learn how to search employee records on the basis of their name, email, mobile number, and employee id in PHP from the database.

In this example, we will guide you a step-by-step procedure to search employee records.

Search employee data in PHP and MySQL will look as follows.

----
screnshot
----

## Step1: 

First create a database with name “betdb” where employee data is stored.

## Step2: 

Second is to create a table with the name “tblempdata” and insert the employee data.

Table Structure

```sql
CREATE TABLE `tblempdata` (
  `ID` int(5) NOT NULL,
  `EmployeeName` varchar(200) DEFAULT NULL,
  `Department` varchar(200) DEFAULT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `MobileNumber` varchar(200) DEFAULT NULL,
  `EmpID` varchar(200) DEFAULT NULL,
  `JoiningDate` date DEFAULT current_timestamp(),
  `PostingDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
```

$# Step3: 

Create a database connection file and save this file with the name “config.php”. Below is the code of the database connection.

```php
<?php
$con = mysqli_connect("localhost","root","","betdb");
// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
 }	
?>
```

## Step4: 

Create a form with one field which is “search”.

```php
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
```

## Step 5: 

PHP code for fetching data from the database on the basis of the search.

```php
<div class="row">
 <div class="col-xs-12">
<?php if(isset($_POST['search']))
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
<?php $ret=mysqli_query($con,"select * from  tblempdata where EmployeeName like '%$sdata%' || Email like '%$sdata%' || MobileNumber like '%$sdata%' || EmpID like '%$sdata%'");
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
```

# Here is the full code that we have written for this tutorial:

```php
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
<?php if(isset($_POST['search'])) { 
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
```
## note: added some JS Script & bootstrap for CSS.

# Creating Dockerfile to HOST the PHP Website.

## Solution Design:

This solution will require the following elements
 - A PostgreSQL Database
 - PHPMyAdmin to manage the database
 - An Apache webserver to host the PHP Website
(Note: Alternatively can replace with a webshoting like 000webhost.com that includes free php hosting and free mysql db)

## Step 1: Build Website image

Note: Don't forget to complete config.php with 
1. Create a Dockerfile for your website

```dockerfile
# Use the official PHP 7.4 runtime as a parent image
FROM php:7.4-apache

# Copy your index.php file into the Docker container at /var/www/html
COPY . /var/www/html/

# Set the permissions for the files to allow the Apache user to access them
RUN chown -R www-data:www-data /var/www/html

# Allow the apache user to access the directory
RUN chmod -R 755 /var/www/html

# Install any necessary extensions to connect postgresql
RUN docker-php-ext-install pdo pdo_pgsql

# Set the working directory to /var/www/html
WORKDIR /var/www/html

# Change the port to 80
EXPOSE 80

# Command to run Webserver
CMD ["apache2ctl", "-D", "FOREGROUND"]
```

2. Build the Image named as "my-php-web-server-01"

```powershell
docker build -t my-php-web-server-01 .
```

## Create the docker-compose.yml file to build the complete solution


