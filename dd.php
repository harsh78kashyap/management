<?php

require_once("dbcontroller.php");
$db_handle = new dbcontroller();
$handle = new dbcontroller();
$query = "SELECT DISTINCT department FROM doctor";
$result1 = $db_handle->runquery($query);

?>


<html>
    <head>
        <title>try</title>
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
    <body>
        <h1>log in</h1>
        <form>
            <select name="depart" id="depart"  onChange="getdoc(this.value);">
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
        <select name="name" id="name" >
        <option value="">Select name</option>
        </select>
    </body>
</html>