<?php

$path=$_SERVER['DOCUMENT_ROOT'];
require_once $path."/attendanceapp/database/database.php";
function clearTable($dbo,$tabName)
{
    $c="delete from :tabname";
    $s=$dbo->conn->prepare($c);
    try{
    $s->execute([":tabname"=>$tabName]);
    }
    catch(PDOException $oo)
    {

    }
}
$dbo=new Database();
$c="create table student_details
(
    id int auto_increment primary key,
    roll_no varchar(20) unique,
    name varchar(50)
)";
$s=$dbo->conn->prepare($c);
try{
$s->execute();
echo("<br>student_details created");
}
catch(PDOException $o)
{
echo("<br>student_details not created");
}

$c="create table course_details
(
    id int auto_increment primary key,
    code varchar(20) unique,
    title varchar(50),
    credit int
)";
$s=$dbo->conn->prepare($c);
try{
$s->execute();
echo("<br>course_details created");
}
catch(PDOException $o)
{
echo("<br>course_details not created");
}


$c="create table faculty_details
(
    id int auto_increment primary key,
    user_name varchar(20) unique,
    name varchar(100),
    password varchar(50)
)";
$s=$dbo->conn->prepare($c);
try{
$s->execute();
echo("<br>faculty_details created");
}
catch(PDOException $o)
{
echo("<br>faculty_details not created");
}


$c="create table session_details
(
    id int auto_increment primary key,
    year int,
    term varchar(50),
    unique (year,term)
)";
$s=$dbo->conn->prepare($c);
try{
$s->execute();
echo("<br>session_details created");
}
catch(PDOException $o)
{
echo("<br>session_details not created");
}



$c="create table course_registration
(
    student_id int,
    course_id int,
    session_id int,
    primary key (student_id,course_id,session_id)
)";
$s=$dbo->conn->prepare($c);
try{
$s->execute();
echo("<br>course_registration created");
}
catch(PDOException $o)
{
echo("<br>course_registration not created");
}

$c="create table course_allotment
(
    faculty_id int,
    course_id int,
    session_id int,
    primary key (faculty_id,course_id,session_id)
)";
$s=$dbo->conn->prepare($c);
try{
$s->execute();
echo("<br>course_allotment created");
}
catch(PDOException $o)
{
echo("<br>course_allotment not created");
}

$c="create table attendance_details
(
    faculty_id int,
    course_id int,
    session_id int,
    student_id int,
    on_date date,
    status varchar(10),
    primary key (faculty_id,course_id,session_id,student_id,on_date)
)";
$s=$dbo->conn->prepare($c);
try{
$s->execute();
echo("<br>attendance_details created");
}
catch(PDOException $o)
{
echo("<br>attendance_details not created");
}

$c="insert into student_details
(id,roll_no,name)
values
  (1,'NNM22CS001','A SHREYA NAIR'),
  (2,'NNM22CS005','ABHIJITH P'),
  (3,'NNM22CS009','ADIB HARIS NEELAMBRA'),
  (4,'NNM22CS013','AISHWARYA K'),
  (5,'NNM22CS017','AMAN KUNDER'),
  (6,'NNM22CS021','AMOOLYA SHETTY'),
  (7,'NNM22CS025','ANANYA DASH'),
  (8,'NNM22CS029','ANSH VASHISHT'),
  (9,'NNM22CS033','ARKAL VARUN HEGDE'),
  (10,'NNM22CS037','B GAUTAM MOHAN'),
  (11,'NNM22CS041','BHUMA GNANA ADITYA VARDHAN REDDY'),
  (12,'NNM22CS045','CHARAN G'),
  (13,'NNM22CS049','CHIRAG H V'),
  (14,'NNM22CS053','CHITTA H V'),
  (15,'NNM22CS057','DEEKSHITH RAJ K'),
  (16,'NNM22CS061','DHANUSH SHERIGAR'),
  (17,'NNM22CS065','DISHA PRASANNA BUDALE'),
  (18,'NNM22CS069','FLIWAN MASCARENHAS'),
  (19,'NNM22CS073','HAMSA PRIYA H S'),
  (20,'NNM22CS077','HISHIT MOHAN MOOLYA'),
  (21,'NNM22CS081','JOVIAN RODRIGUES'),
  (22,'NNM22CS085','K PRATHAMESH PAI'),
  (23,'NNM22CS089','KEERTHAN SHETTY'),
  (24,'NNM22CS093','KUNDER VARUN MOHAN'),
  (25,'NNM22CS097','MEGHANA'),
  (26,'NNM22CS101','MOHAMMED SAAD SHARIEF'),
  (27,'NNM22CS105','N LIYA NANAIAH'),
  (28,'NNM22CS109','NIKHIL SHETTY'),
  (29,'NNM22CS113','NISHITH RAJ'),
  (30,'NNM22CS117','P GANAPATHI S KAMATH'),
  (31,'NNM22CS121','PRAVATHI MADYAL'),
  (32,'NNM22CS124','PRADYUTHI K S'),
  (33,'NNM22CS127','PRAJWAL K SAGAR'),
  (34,'NNM22CS130','PRANAV YN'),
  (35,'NNM22CS133','PRATEEK A SHETTY'),
  (36,'NNM22CS136','R RUSHIL SAI SRIVASTHSA'),
  (37,'NNM22CS139','RAKSHITH VIJAY'),
  (38,'NNM22CS142','REONA PINTO'),
  (39,'NNM22CS145','ROYAN J FERNANDES'),
  (40,'NNM22CS149','SAGAR KOTIYAN'),
  (41,'NNM22CS152','SAIF SHEIKH'),
  (42,'NNM22CS155','SANJANA SANTHOSH GUNAGA'),
  (43,'NNM22CS158','SATVIK P SHETTY'),
  (44,'NNM22CS161','SHAN PRADEEP R'),
  (45,'NNM22CS164','SHETTY SAKSHI SUJIT'),
  (46,'NNM22CS167','SHINJINI S SHETTY'),
  (47,'NNM22CS170','SHREEMADH B MALLI'),
  (48,'NNM22CS173','SHREYAS KUMAR M'),
  (49,'NNM22CS176','SIONA ANGELA RODRIGUES'),
  (50,'NNM22CS179','SRAJAN J POOJARY'),
   (51,'NNM22CS182','SUJAN J AMIN'),
   (52,'NNM22CS185','SURAJ N'),
   (53,'NNM22CS188','TANMAY SHETTY'),
   (54,'NNM22CS191','THASHVI S RAI'),
   (55,'NNM22CS194','V SHREEVASA NAVADA'),
   (56,'NNM22CS197','VAISHNAVI J KAMATH'),
   (57,'NNM22CS200','VARSHITH PAWAR H R'),
   (58,'NNM22CS203','VIGHNESH'),
   (59,'NNM22CS206','VIJETH'),
   (60,'NNM22CS209','YASHAS HEGDE')" ;

  $s=$dbo->conn->prepare($c);
  try{
    $s->execute();
  }
  catch(PDOException $o)
  {
    echo("<br>duplicate entry");
  }


  $c="insert into faculty_details
(id,user_name,password,name)
values
(1,'kum','123','DR.KUMUDAKSHI N'),
(2,'pal','123','DR.PALLAVI K N'),
(3,'ros','123','DR.ROSHAN FERNANDES'),
(4,'pun','123','MR.PUNEETH R.P'),
(5,'jay','123','MS.JAYAPADMINI KANCHAN'),
(6,'sam','123','MR.SAMPATH KINI'),
(7,'ras','123','PROF.RASHMI HEGDE'),
(8,'son','123','MS.SONIA LOBO')";

  $s=$dbo->conn->prepare($c);
  try{
    $s->execute();
  }
  catch(PDOException $o)
  {
    echo("<br>duplicate entry");
  }


  $c="insert into session_details
(id,year,term)
values
(1,2023,'3rd SEMESTER'),
(2,2024,'4th SEMESTER')";

  $s=$dbo->conn->prepare($c);
  try{
    $s->execute();
  }
  catch(PDOException $o)
  {
    echo("<br>duplicate entry");
  }


  $c="insert into course_details
(id,title,code,credit)
values
  (1,'LINEAR ALGEBRA AND ITS APPLICATIONS','MA2005-1',3),
  (2,'DESIGN AND ANALYSIS OF ALGORITHMS','CS3004-1',3),
  (3,'MICROPROCESSORS AND EMBEDDED SYSTEMS','CS3005-1',4),
  (4,'SOFTWARE ENGINEERING AND PROJECT MANAGEMENT','CS2103-1',3),
  (5,'DATABASE MANAGEMENT SYSTEMS ','CS2102-1',3),
  (6,'PYTHON PROGRAMMING WITH DATA SCIENCE','CS1551-1',1),
  (7,'ENCGANCING SELF COMPETENCE','HU2001-1',3),
  (8,'ESSENCE OF INDIAN CULTURE','HU1005-1',0)";
  $s=$dbo->conn->prepare($c);
  try{
    $s->execute();
  }
  catch(PDOException $o)
  {
    echo("<br>duplicate entry");
  }

  //if any record already there in the table delete them
  clearTable($dbo,"course_registration");
  $c="insert into course_registration
  (student_id,course_id,session_id)
  values
  (:sid,:cid,:sessid)";
  $s=$dbo->conn->prepare($c);
  //iterate over all the 24 students
  //for each of them chose max 3 random courses, from 1 to 6

  for($i=1;$i<=60;$i++)
  {
    for($j=0;$j<8;$j++)
    {
        $cid=$j;
        //insert the selected course into course_registration table for 
        //session 1 and student_id $i
        try{
           $s->execute([":sid"=>$i,":cid"=>$cid,":sessid"=>1]); 
        }
        catch(PDOException $pe)
        {

        }

        //repeat for session 2
        $cid=$j;
        //insert the selected course into course_registration table for 
        //session 2 and student_id $i
        try{
           $s->execute([":sid"=>$i,":cid"=>$cid,":sessid"=>2]); 
        }
        catch(PDOException $pe)
        {

        }
    }
  }


  //if any record already there in the table delete them
  clearTable($dbo,"course_allotment");
  $c="insert into course_allotment
  (faculty_id,course_id,session_id)
  values
  (:fid,:cid,:sessid)";
  $s=$dbo->conn->prepare($c);
  //iterate over all the 6 teachers
  //for each of them chose max 2 random courses, from 1 to 6

  for($i=1;$i<=8;$i++)
  {
    for($j=0;$j<1;$j++)
    {
        $cid=rand(1,8);
        //insert the selected course into course_allotment table for 
        //session 1 and fac_id $i
        try{
           $s->execute([":fid"=>$i,":cid"=>$cid,":sessid"=>1]); 
        }
        catch(PDOException $pe)
        {

        }

        //repeat for session 2
        $cid=rand(1,8);
        //insert the selected course into course_allotment table for 
        //session 2 and student_id $i
        try{
           $s->execute([":fid"=>$i,":cid"=>$cid,":sessid"=>2]); 
        }
        catch(PDOException $pe)
        {

        }
    }
  }