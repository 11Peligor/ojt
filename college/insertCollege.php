<?php
    include('../functions/Db.php');
    $db = new Db();
    $college_name = $_POST['college_name'];
    $date = $_POST['date'];
    $activity = $_POST['activity'];
    $participants = $_POST['participants'];
    $budget = $_POST['budget'];
    $fund_source = $_POST['fund_source'];
    $remarks = $_POST['remarks'];

    

    // if($college_name == "choose"){
    //     echo "Please select the corresponding college!";
    //     return false;
    // }else{
        $add = $db->query("INSERT INTO college (college_name,date,activity,participants,budget,fund_source,remarks) VALUES ('$college_name','$date','$activity','$participants','$budget','$fund_source','$remarks')");
    // }
?>