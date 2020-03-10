<?php
    include ('../functions/Db.php');
    $db = new Db();	
    $files = scandir("upload");
    for ($i=2 ; $i < count($files) ; $i++){
        $sample = 4;
        $rows = $db->select("SELECT * FROM files WHERE college_id = $sample");
        foreach($rows as $row){
            $row_files = $row['name'];
            if ($files[$i] == $row_files){
                $dl_files = $row['name']; ?>
                <p></p><a download="<?php echo $dl_files?>" href="upload/<?php echo $dl_files?>"><?php echo $dl_files?></a>
            <?php }
        }

    }
    $last_id = $db->select("SELECT MAX(college_id) FROM college");

    foreach($last_id as $key){
        print_r ($key);
    }  

?>