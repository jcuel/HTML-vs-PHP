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
