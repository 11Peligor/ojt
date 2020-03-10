<?php

	class TrapErrors{
		
		function checkEmpty($string){
			if(empty($string)){
				return true;
			}
		}
		
		function checkEmployeeNotEmpty($empId){
			if($empId == 0){
				return true;
			}
		}
		
		function checkCTOMasterID($cto_master_id){
			if($cto_master_id == 0){
				return true;
			}
		}
	}
?>