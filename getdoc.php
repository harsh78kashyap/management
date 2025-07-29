<?php

require_once("dbcontroller.php");
$db_handle = new dbcontroller();
if(!empty($_POST["department"])){
    $query = "SELECT * FROM doctor WHERE department = '".$_POST["department"]."'order by name asc";
    $result = $db_handle->runquery($query);
    ?>
    <option value disabled selected>Select doctor</option>
    <?php
    foreach($result as $doc){
        ?>
        <option value = "<?php echo $doc["doc_id"];?>"><?php echo $doc["name"];?></option>
        <?php
    }
}


?>