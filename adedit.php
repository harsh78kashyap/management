<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>

    


<style>

#submit{
 background-color: #4CAF50;
 color: black;
 border: none;
 cursor: pointer;
 margin: 4px 2px;
 font-size:17px;
 border-radius: 5px;
 box-shadow: 5px 5px 10px 5px rgba(0,0,0,0.3);
 }
 #submit:hover{
 background-color: #302d2d;
 color: white;
 box-shadow: none;
 } 


/*
.container {
box-shadow: 5px 5px 10px 5px rgba(0,0,0,0.3);
  padding: 16px;
}*/

#adEdit{
margin: 0 auto;
background-color: #9e9999;
width: 95%;
border-radius: 10px;
font-size:20px;
padding-top: 0px;
padding-left: 15px;
box-shadow: 5px 5px 10px 5px rgba(0,0,0,0.3);
}


.top { background-color:#04b861;
overflow: hidden; }

.top a { float:left;
color: black;
text-align: center;
padding: 14px 16px;
text-decoration: none;
font-size:17px; }

.top a:hover {background-color: #302d2d;
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

#con { 
padding:0;
box-shadow: none;
}


</style>
</head>
<body style="background-color: rgb(10,100,40); background-image: url(https://img.freepik.com/free-vector/clean-medical-background_53876-97927.jpg?w=2000); background-repeat: repeat; background-size: 100%">
<div id="con" class="container">
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
		  <hr>

<div id="adEdit" style="background-color:#bb4fdb; width:99%" align="left">
<center><h2>Admin</h2></center>
 </div>

 <div id="adEdit">
  <h3><u>Add Doctor ,</u> <a id="editb" href="Dreg.html"> <i>click here</i></a></h3>
  </div>

  <div id="adEdit">
    <h3><u>Update Doctor's Details</u></h3>
    <label>Select Doctor Id: </label> <!--todo-->
    <form action="updatedoc.php" method="post">
    <?php
    $sql="SELECT doc_id FROM doctor";
    $result=$conn->query($sql);
    ?>
  <select id="did" name="did"  required>
  <option value="" disabled selected hidden>Select Doctor ID</option>
    <?php
    foreach($result as $depart){
      ?>
        <option value="<?php echo $depart["doc_id"];?>"><?php echo $depart["doc_id"];?></option>
      <?php
    }
    ?>
  </select>
  <br>
  <input type="submit" id="submit" value="Submit">
    </form>
</div>

<div id="adEdit">
  <h3><u>Records</u> </h3>
  <p>Doctor's Data: <a href="docrec.php"><i>click here</i></a>
    <br>Patient's Data: <a href="patrec.php"><i>click here</i></a>
  <br>Precription Records: <a href="precrirec.php"><i>click here</i></a>
<br>Appointment Records: <a href="appiotrec.php"><i>click here</i></a></p>
</div>

<div id="adEdit">
 <h3><u>Change Password</u></h3>
  <form style="font-size:20px" action="changepass.php" method="post">
  <input name="identity" type="hidden" value=1>
 Current Password: &nbsp<input type="password" name="cpsw" style="border-radius:10px" required>
 <br>
 New Password: &nbsp &nbsp  &nbsp  <input type="password"  name="npsw" style="border-radius:10px" required>
 <br>
 Confirm Password:&nbsp<input type="password"  name="cnpsw" style="border-radius:10px" required>
 <br>
 <input type="submit" id="submit" name="sub" value="Submit">
 </form>
</div>

</div>
</body>
</html>