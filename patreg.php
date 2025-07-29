<html>

<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<style>
#adlog{
margin: 0 auto;
background-color:limegreen;
width: 750px;
height: 250px;
border-radius: 10px;
font-size:20px;
padding-top: 5px;
box-shadow: 5px 5px 10px 5px rgba(0,0,0,0.3);
}

.top { background-color:#04b861;
;overflow: hidden; }

.top a { float:left;
color: black;
text-align: center;
padding: 14px 16px;
text-decoration: none;
font-size:17px; }

.top a:hover {
background-color: #302d2d;
color: white; }

.dropdown-content {
display: none;
position: absolute;
}

.dropdown {
float:left;
overflow:hidden;
}


.dropdown .dropbtn {
  font-size: 16px;  
  border: none;
  outline: none;
  color: black;
  padding: 14px 16px;
  background-color: inherit;
  font-family: inherit;
  margin: 0;
}

.dropdown-content {
  display: none;
  position: absolute;
  
  min-width: 160px;
  box-shadow: 5px 5px 10px 5px rgba(0,0,0,0.3);
  z-index: 1;
}

.dropdown-content a {
  float: none;
  color: black;
  background-color:#029950;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
  text-align: left;
}

.dropdown:hover .dropdown-content {
display: block;
}

</style>
<body style="background-color: rgb(10,100,40); background-image: url(https://img.freepik.com/free-vector/clean-medical-background_53876-97927.jpg?w=2000); background-repeat: repeat; background-size: 100%">
<div class="top">
		  <nav>
		  <img src="hmslogo2.png" height="50px" align="left">
		  <a href="home.html"><b>Home</b></a>
		  <a href="about.html"><b>About</b></a>
		  <a href="contact.html"><b>Contact</b></a>
		  
		  <div  class="dropdown">
		  <button type="button" class="dropbtn"><b>Login</b>
		  <i class="fa fa-caret-down"></i>
		  </button>
		  <div class="dropdown-content">
		  <a href="docLog.html">Doctor's Portal</a>
		  <a href="patLog.html">Patient's Portal</a>
		  <a href="adLog.html">Admin's Portal</a>
		  <a href="reg.html">New Patient Registration</a>
		  </div>
		  </div>
		  
		  </nav>
		  </div>
		  <hr color="black">
		  
<div id="adlog">
<!--To Do...-->

<?php

$name = $_POST['name'];
$fatname = $_POST['fathername'];
$gender = $_POST['gender'];
$age = $_POST['age'];
$bg = $_POST['blood'];
$add = $_POST['address'];
$mobile = $_POST['mnum'];
$email = $_POST['email'];
$pass = $_POST['password'];

$conn = new mysqli("localhost","root","","hms");

if(mysqli_connect_error())
{
die('connect error('. mysqli_connect_errno().')'. mysqli_connect_error());
}
else{
$sql = "INSERT INTO patient (name,fathername,gender,age,bloodg,address,mobile,email,password) values('$name','$fatname','$gender','$age','$bg','$add','$mobile','$email','$pass')";
if($conn->query($sql))
{
    $sql2 = "SELECT pat_id,name from patient where name = '$name' and fathername = '$fatname' and mobile = '$mobile'";
    $result = $conn->query($sql2);
    $row = $result-> fetch_assoc();
    $N=$row['pat_id'];
    $o = "INSERT INTO oldappoint (pid) values('$N')";
    $conn->query($o);

    echo "Your PATIENT ID is ".$row['pat_id']." and NAME is ".$row['name'];
    echo nl2br("\r\nRemember the above detail. This help you to login in your profile.");
}
else{
    echo "error: ". $sql . "<br>" . $conn->error;
}
$conn -> close();
}

?>


</div>
</body>
</html>