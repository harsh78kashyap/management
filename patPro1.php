<?php

require_once("dbcontroller.php");
$db_handle = new dbcontroller();
$handle = new dbcontroller();
$query = "SELECT DISTINCT department FROM doctor";
$result1 = $db_handle->runquery($query);

?>




<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<script src="jquery.main.js" type="text/javascript"></script>
    <script type="text/javascript">
        function getdoc(val){
            $.ajax({
                type: "POST",
                url: "getdoc.php",
                data: 'department='+val,
                success:function(data){
                    $("#name").html(data);
                }
            });
        }
        </script>


<style>
/* Set a style for all buttons */
button, #submit, #reset {
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

 #editb{
  box-shadow:none;
 }

/* Center the image and position the close button */
.imgcontainer {
  text-align: center;
  margin: 24px 0 12px 0;
  position: relative;
}
.container {
box-shadow: 5px 5px 10px 5px rgba(0,0,0,0.3);
  padding: 16px;
}
/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
  padding-top: 60px;
}
/* Modal Content/Box */
.modal-content {
  background-color: #fefefe;
  margin: 5% auto 5% auto; /* 5% from the top, 5% from the bottom and centered */
  border: 1px solid #888;
  width: 70%; /* Could be more or less, depending on screen size */
  height: 100%;
}


/* The Close Button (x) */
.close {
  position: absolute;
  right: 25px;
  top: 0;
  color: #000;
  font-size: 35px;
  font-weight: bold;
}


.close:hover,
.close:focus {
  color: red;
  cursor: pointer;
}



.cancelbtn{
     width: 30%;
     color: black;
     background-color: crimson;
}


  span.psw {
  float: right;
  padding-top: 16px;
}
button:hover, #submit:hover, #reset:hover {
  opacity: 0.8;
}

#patPro{
margin: 0 auto;
background-color: #9e9999;
width: 95%;
height: 50%;
border-radius: 10px;
font-size:23px;
padding-top: px;
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

#editb{
background-color:#9e9999;
padding:0;
color:blue;
font-size:17px;
text-decoration: underline;
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
		  <hr color="black">

<div id="patPro" style="background-color:#bb4fdb; font-size:25px; width:99%" align="center"
<p>Patient Profile</p>

 <?php



    $conn = mysqli_connect("localhost","root","","hms");
    if($conn-> connect_error)
    {
        die("connection failed:". $conn-> connect_error);
    }
    $sql = "SELECT pat_id, name, fathername, gender, age, bloodg, email, mobile, address, password from patient";
    $result = $conn-> query($sql);
    if($result-> num_rows > 0)
    {
        while($row = $result-> fetch_assoc())
        {
          if($row["pat_id"]==$id && $row["password"]==$pass){
            echo "Patient ID: ".$row["pat_id"]."<br>Name: ".$row["name"]."<br>Father Name: ".$row["fathername"]."<br>Gender: ".$row["gender"];
            echo "<br>Age: ".$row["age"]."<br>Blood Group: ".$row["bloodg"]."<br>Email: ".$row["email"]."<br>Mobile No.: ".$row["mobile"];
            echo "<br>Address: ".$row["address"];
            break;
          }
        }
    }
    else{
        echo "0 result";
    }
    ?>



 </div>
		
 <div id="patPro" style="font-size:20px">
<p><u>Apply for Appointment</u></p>
 <form action="bookapp.php" method="POST">
  <input value="<?php echo $id ?>" name="patid" type="hidden"> 
 <label>Select Department:</label>
 <select name="depart" id="depart"  onChange="getdoc(this.value);"  required>
        <option value disabled selected>Select Department</option>
        <?php
        foreach($result1 as $department){
        ?>
        <option value="<?php echo $department["department"];?>"><?php echo $department["department"];?></option>
        <?php
        }
        ?>
        </select>
        <br>
        <label>Select Doctor:</label>
        <select name="name" id="name" required>
        <option value="">Select name</option>
        </select>
  <br>
  Date: <input type="date" id="dob" name="dob" required>
  <script>
    dob.min = new Date().toISOString().split("T")[0];
    </script>
    <br>
    Time: <input type="time" name="time" id="time" min="08:00" max="20:00" required>
    <br>
    <input type="submit" id="submit" value="Apply">
 <!--todo-->
 </form>
 </div>

<div id="patPro">
<p>Appointment Status</p>


    <?php



    $conn = mysqli_connect("localhost","root","","hms");
    if($conn-> connect_error)
    {
        die("connection failed:". $conn-> connect_error);
    }
    $sql = "SELECT p_id,doc_name,department,date,time,status from appoint WHERE p_id='$id' ";
    $result = $conn-> query($sql);
    if($result-> num_rows > 0)
    {
      ?>
      <table border="1">
        <tr>
            <th>Patient ID</th>
            <th>Doctor Name</th>
            <th>Department</th>
            <th>Date</th>
            <th>Time</th>
            <th>Status</th>
        </tr>
        <?php
        while($row = $result-> fetch_assoc())
        {
            echo "<tr><td>".$row["p_id"]."</td><td>". $row["doc_name"]."</td><td>".$row["department"]."</td><td>".$row["date"]."</td><td>".$row["time"]."</td><td>".$row["status"]."</td></tr>";
        }
        echo "</table>";
        echo "<form method='post' action='capp.php'>";
        echo "<input type='hidden' name='appid' value=".$id.">";
        echo "<input type='submit' id='submit' value='Cancel Appointment'>";
        echo "</form>";
    }
    else{
      $sq = "SELECT message from oldappoint WHERE pid='$id' ";
      $result = $conn-> query($sq);
      $row=$result -> fetch_assoc();
      echo $row["message"];
    }
    ?>

</div>

<div id="patPro">
<p>Prescription</p>
<?php
$sql = "SELECT doc_id,doctor,remark,medicine,date from precription WHERE p_id='$id' order by date desc";
    $result = $conn-> query($sql);
    if($result-> num_rows > 0)
    {
        ?>
        <table border="1">
        <tr>
            <th>Date & Time</th>
            <th>Doctor ID</th>
            <th>Doctor Name</th>
            <th>Remark</th>
            <th>Medicine</th>
        </tr>
        <?php
        while($row = $result-> fetch_assoc())
        {
            echo "<tr><td>".$row["date"]."</td><td>". $row["doc_id"]."</td><td>".$row["doctor"]."</td><td>".$row["remark"]."</td><td>".$row["medicine"]."</td></tr>";
        }
        echo "</table>";
        echo "<form action='deleterepre.php' method='post'>";
      echo "<input type='hidden' name='patid' value=".$id.">";
      echo "<input type='submit' id='submit' value='Delete all Records' >";
    echo "</form>";
    }
    else{
        echo "No Precription";
    }
    ?>


</div>

<div id="patPro">
<p><u>To update details,</u> <button id="editb" onclick="document.getElementById('id01').style.display='block'" style="width:auto;">click here</button></p>
</div>

<div id="patPro">
 <p><u>Change Password</u></p>
  <form style="font-size:20px" action="changepass.php" method="post">
 <input name="identity" type="hidden" value="<?php echo "$id";?>">
 Current Password: &nbsp<input type="password" name="cpsw" style="border-radius:10px" required>
 <br>
 New Password: &nbsp &nbsp  &nbsp  <input type="password"  name="npsw" style="border-radius:10px" onchange='check();' required>
 <br>
 Confirm Password:&nbsp<input type="password"  name="cnpsw" style="border-radius:10px" onchange='check();' required>
 <br>
 <input type="submit" id="submit" name="sub" value="Save">
 </form>
</div>
<script>
 function check() {
  const password = document.querySelector('input[name=npsw]');
  const confirm = document.querySelector('input[name=cnpsw]');
  if (confirm.value === password.value) {
    confirm.setCustomValidity('');
  } else {
    confirm.setCustomValidity('Passwords do not match');
  }
 }
</script>


<!--
<button onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Edit</button>
-->
<div id="id01" class="modal">
  
  <div class="modal-content animate" >
     <div class="imgcontainer">
       <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
      </div>

      <div class="container">
       <h3>Update Details</h3>
       <?php
       
       $sql4="SELECT name,fathername,age,address,mobile,gender,bloodg,email FROM patient WHERE pat_id=$id";
       $result4=$conn->query($sql4);
       $row4=$result4-> fetch_assoc();
       
       ?>
       <form action="updatepat.php" method="post">

       <input name="identity" type="hidden" value="<?php echo "$id";?>">

        Full Name: <input type="text" name="fullname" placeholder="<?php echo $row4['name']; ?>">
        <br><br>
        
        Father's Name: <input type="text" name="fathername" placeholder="<?php echo $row4['fathername']; ?>">
        <br><br>
        
        <label for="gender">Gender:</label>
          <select name="gender" id="gender" >
          <option value="" disabled selected hidden><?php echo $row4['gender']; ?></option>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
            <option value="Other">Other</option>
          </select>
          <br><br>
          
        Age: <input type="number" name="age" id="age" min="0" max="110" placeholder="<?php echo $row4['age']; ?>" >
        <br><br>
        
        <label for="blood">Blood Group:</label>
          <select name="blood" id="blood" >
            <option value="" disabled selected hidden><?php echo $row4['bloodg']; ?></option>
            <option value="A+">A+</option>
            <option value="A-">A-</option>
            <option value="B+">B+</option>
          <option value="B-">B-</option>
          <option value="AB+">AB+</option>
          <option value="AB-">AB-</option>
          <option value="O+">O+</option>
          <option value="O-">O-</option>
          </select>
          <br>
          <br>
        Address: <input type="text" name="address" id="address" style="height:30px;" placeholder="<?php echo $row4['address']; ?>"><br><br>
        Mobile Number: <input type="number" id="mnum" name="mnum" maxlength="10" placeholder="<?php echo $row4['mobile']; ?>">
        <br><br>  
         Email: <input type="email" id="email" name="email" placeholder="<?php echo $row4['email']; ?>">
        <br><br>
        <input type="submit" id="submit" value="Save">
        <input type="reset" id="reset">
        </form>
	  </div>

      <div class="container" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
     </div>
  </div>
</div>
<script>
// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>
</div>
</body>
</html>