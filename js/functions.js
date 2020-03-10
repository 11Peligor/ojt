
	//variable declaration
	var reg_int = /^[0-9]*$/;
	var reg_date = /^(19|20)\d\d[- /.](0[1-9]|1[012])[- /.](0[1-9]|[12][0-9]|3[01])$/;
	var reg_hours = /^[0-9]*$/;
	var total = 0;
	
	//variable errors
	var err_name = false;
	var err_date = false;
	var err_num_of_hours = false;
	
	// functions
	//----Check integer----
	function check_integer(id, selector, num) {
		var id = $('#'+selector).val();
		//check id if not empty
		if(id.length <= 0){
			$('p#span'+num).empty();
			$('#'+selector).css('border', '2px solid red');
			$('#'+selector).after("<p id='span"+num+"' style = 'color:red;font-family:Calibri;'>Invalid Input</p>");
			err_name = true;
			return false;
		}else{
			if(reg_int.test(id) && id != 0){
				$('p#span'+num).empty();
				$('#'+selector).css('border', '2px solid green');
				err_name = false;
				return true;
			}else{
				$('#'+selector).css('border', '2px solid red');
				$('#'+selector).after("<p id='span"+num+"' style = 'color:red;font-family:Calibri;'>Invalid Input</p>");
				err_name = true;
				if(err_name){
					$('p#span'+num).empty();
					$('#'+selector).after("<p id='span"+num+"' style = 'color:red;font-family:Calibri;'>Invalid Input</p>");
				}
				return false;
			}
		}
	}
	//check Select Value Not Empty
	function check_select(id, selector, num) {
		var id = $('#'+selector).val();
		//check id if not empty
		if(id == 0){
			$('p#span'+num).empty();
			$('#'+selector).css('border', '2px solid red');
			$('#'+selector).after("<p id='span"+num+"' style = 'color:red;font-family:Calibri;'>Invalid Input</p>");
			err_name = true;
			return false;
		}else{
			$('p#span'+num).empty();
			$('#'+selector).css('border', '2px solid green');
			return true;
		}
	}
	//----Check date validity----
	function check_date(id, selector, num) {
		var id = $('#'+selector).val();
		if(id.length <= 0){
			$('p#span'+num).empty();
			$('#'+selector).css('border', '2px solid red');
			$('#'+selector).after("<p id='span"+num+"' style = 'color:red;font-family:Calibri;'>Invalid Date</p>");
			err_date = true;
			return false;
		}else{
			if(reg_date.test(id)){
				$('p#span'+num).empty();
				$('#'+selector).css('border', '2px solid green');
				err_date = false;
				return true;
			}else{
				$('#'+selector).css('border', '2px solid red');
				$('#'+selector).after("<p id='span"+num+"' style = 'color:red;font-family:Calibri;'>Invalid Date</p>");
				err_date = true;
				if(err_date){
					$('p#span'+num).empty();
					$('#'+selector).after("<p id='span"+num+"' style = 'color:red;font-family:Calibri;'>Invalid Date</p>");
				}
				return false;
			}
		}
	}