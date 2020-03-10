<?php
//insert.php
include('../functions/Db.php');
    $db = new Db();

    if(count($_FILES["image"]["tmp_name"]) > 0){
        for($count = 0; $count < count($_FILES["image"]["tmp_name"]); $count++){
            $fileName = $_FILES["image"]["name"][$count];
            // $db->query("INSERT INTO files (name) VALUES ('$fileName')");
            $db->query("INSERT INTO files (college_id) SELECT MAX(college_id) FROM college");
            // move_uploaded_file($_FILES["image"]["tmp_name"][$count], "upload/". $fileName);
        }
    }
?>