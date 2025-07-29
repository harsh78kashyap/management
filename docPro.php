<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<style>

 #patPro{

 margin: 0 auto;
 background-color: #9e9999;
 width: 95%;
 /*height: ;*/
 border-radius: 10px;
 font-size:23px;
 padding-top: px;
 padding-left: 15px;
 box-shadow: 5px 5px 10px 5px rgba(0,0,0,0.3);
 }

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

 .top { background-color:#04b861;
 ;overflow: hidden; }

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

</style>
<body  style="background-color: rgb(10,100,40); background-image: url(https://img.freepik.com/free-vector/clean-medical-background_53876-97927.jpg?w=2000); background-repeat: repeat; background-size: 100%">
<div class="container">
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
		  <a href="doclog.html">Doctor's Portal</a>
		  <a href="patLog.html">Patient's Portal</a>
		  <a href="adLog.html">Admin's Portal</a>
		  <a href="reg.html">New Patient Registration</a>
		  </div>
		  </div>
		  
		  </nav>
		  </div>
		  <hr color="black">
		
<div id="patPro" style="background-color:#bb4fdb; font-size:25px; width:99%" align="center"
<p>Doctor's Profile</p>

 <?php



    $conn = mysqli_connect("localhost","root","","hms");
    if($conn-> connect_error)
    {
        die("connection failed:". $conn-> connect_error);
    }
    $sql = "SELECT doc_id, name, dob, gender, age, department, experience, college, email, mobile, address, password from doctor";
    $result = $conn-> query($sql);
    if($result-> num_rows > 0)
    {
        while($row = $result-> fetch_assoc())
        {
          if($row["doc_id"]==$id && $row["password"]==$pass){
            echo "Doctor ID: ".$row["doc_id"]."<br>Name: ".$row["name"]."<br>Date of Birth: ".$row["dob"]."<br>Gender: ".$row["gender"];
            echo "<br>Age: ".$row["age"]."<br>Department: ".$row["department"]."<br>Experience: ".$row["experience"]."<br>College: ".$row["college"];
            echo "<br>Email: ".$row["email"]."<br>Mobile No.: ".$row["mobile"]."<br>Address: ".$row["address"];
            break;
          }
        }
    }
    else{
        echo "0 result";
    }
    ?>



</div>
		
<div id="patPro">
<p>My Appointment</p>


    <?php
    $conn = mysqli_connect("localhost","root","","hms");
    if($conn-> connect_error)
    {
        die("connection failed:". $conn-> connect_error);
    }
    
    $sql = "SELECT p_id,date,time,status from appoint WHERE doc_id='$id' ";
    $result = $conn-> query($sql);
    if($result-> num_rows > 0)
    {
        ?>
        <table border="1">
        <tr>
            <th>Select</th>
            <th>Patient ID</th>
            <th>Patient Name</th>
            <th>Date</th>
            <th>Time</th>
            <th>Status</th>
        </tr>
        <form action="docapp.php" method="POST">
        <?php
        while($row = $result-> fetch_assoc())
        {
          $r=$row['p_id'];
          $sql2 = "SELECT name from patient WHERE pat_id='$r'";
          $result2 = $conn->query($sql2);
          $row2 = $result2-> fetch_assoc();
            echo "<tr><td><input type='checkbox' name='fromdoc[]' value=".$r."></td><td>".$row["p_id"]."</td><td>". $row2["name"]."</td><td>".$row["date"]."</td><td>".$row["time"]."</td><td>".$row["status"]."</td></tr>";
        }
        echo "</table>";
        ?> 
        <textarea rows="5" cols="30" name="mess" placeholder="Type Cause (if any). Otherwise write N/A..." required></textarea>
        <br>
        <input type="submit" id='submit' name="sub" value="Accept appointment">
        <input type="submit" id='submit' name="sub" value="Cancel appointment">
        </form>
        <?php
    }
    else{
        echo "No Appointment";
    }
    ?>


<!--todo-->
</div>

<div id="patPro">
<p>Add Prescription</p>
 <form action="pri.php" method="POST">
  <input name="did" value="<?php echo $id; ?>" type="hidden">
   <select name="patient" required>
    <?php
    $sql5 = "SELECT p_id FROM appoint WHERE doc_id=$id and status='Confirmed'";
    $result5 = $conn->query($sql5);
    ?>
    <option value disabled selected>Select Patient ID</option>
        <?php
        foreach($result5 as $pid){
        ?>
        <option value="<?php echo $pid["p_id"];?>"><?php echo $pid["p_id"];?></option>
        <?php
        }
        ?>
   </select>
   <br>
   Remarks:<br>
   <textarea rows="5" cols="50" name="remark" placeholder="Enter Your Remark here..." required></textarea>
   <br>
   Medicine:<br>
   <textarea rows="5" cols="30" name="med" placeholder="Enter medicine..." required></textarea>
   <br>
   <input type="submit" id='submit' value="Submit">
 </form>
</div>

<div id="patPro">
<p>Change Password</p>
<form style="font-size:20px" action="changepass.php" method="post">
<input name="identity" type="hidden" value="<?php echo "$id";?>">
Current Password: &nbsp<input type="password" name="cpsw" style="border-radius:10px" required>
<br>
New Password: &nbsp &nbsp  &nbsp  <input type="password" name="npsw" style="border-radius:10px" onchange="check();" required>
<br>
Confirm Password:&nbsp<input type="password" name="cnpsw" style="border-radius:10px" onchange="check();" required>
<br>
<input type="submit" id="submit" name="sub" value="save">
</form>
</div>
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


</body>
</html>