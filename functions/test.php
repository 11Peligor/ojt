<?php
	include('Db.php');
    $db = new Db();
    $rows = $db -> select("SELECT * FROM `COC`");
	foreach($rows as $row){
		echo $row['coc_id'].'<br>';
	}
?>