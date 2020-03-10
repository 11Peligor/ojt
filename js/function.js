var reg_id = /^[0-9]*$/;
var reg_date = /^(19|20)\d\d[- /.](0[1-9]|1[012])[- /.](0[1-9]|[12][0-9]|3[01])$/;
var reg_hours = /^[0-9]*$/;
var total = 0;
//variable errors
var err_name = false;
var err_date = false;
var err_num_of_hours = false;
// functions
//----Check name validity----
function check_name(id, selector, num) {
	var id = $('#'+selector).val();
	if(id.length < 0 || id == 0){
		$('p#span'+num).empty();
		$('#'+selector).css('border', '2px solid red');
		$('#'+selector).after("<p id='span"+num+"' style = 'color:red;font-family:Roboto;'>Invalid Input</p>");
		err_name = true;
		return false;
	}else{
		if(reg_id.test(id) && id.length <= 6){
			$('p#span'+num).empty();
			$('#'+selector).css('border', '2px solid green');
			err_name = false;
			return true;
		}else{
			$('#'+selector).css('border', '2px solid red');
			$('#'+selector).after("<p id='span"+num+"' style = 'color:red;font-family:Roboto;'>Invalid Input</p>");
			err_name = true;
			if(err_name){
				$('p#span'+num).empty();
				$('#'+selector).after("<p id='span"+num+"' style = 'color:red;font-family:Roboto;'>Invalid Input</p>");
			}
			return false;
		}
	}
}
//----Check date validity----
function check_date(id, selector) {
	var id = $('#'+selector).val();
	if(id.length <= 0){
		$('p#span2').empty();
		$('#'+selector).css('border', '2px solid red');
		$('#'+selector).after("<p id='span2' style = 'color:red;font-family:Roboto;'>Invalid Input</p>");
		err_date = true;
		return false;
	}else{
		if(reg_date.test(id)){
			$('p#span2').empty();
			$('#'+selector).css('border', '2px solid green');
			err_date = false;
			return true;
		}else{
			$('#'+selector).css('border', '2px solid red');
			$('#'+selector).after("<p id='span2' style = 'color:red;font-family:Roboto;'>Invalid Input</p>");
			err_date = true;
			if(err_date){
				$('p#span2').empty();
				$('#'+selector).after("<p id='span2' style = 'color:red;font-family:Roboto;'>Invalid Input</p>");
			}
			return false;
		}
	}
}
//----Check hours validity----
function check_hours(id, selector) {
	var id = $('#input_num_of_hours').text();
	if(id.length <= 0 || id==0){
		$('p#span3').empty();
		$('#'+selector).css('border', '2px solid red');
		$('#'+selector).after("<p id='span3' style = 'color:red;font-family:Roboto;'>Invalid Input</p>");
		err_num_of_hours = true;
		return false;
	}else{
		if(reg_hours.test(id)){
			$('p#span3').empty();
			$('#'+selector).css('border', '2px solid green');
			err_num_of_hours = false;
			return true;
		}else{
			$('#'+selector).css('border', '2px solid red');
			$('#'+selector).after("<p id='span3' style = 'color:red;font-family:Roboto;'>Invalid Input</p>");
			err_num_of_hours = true;
			if(err_num_of_hours){
				$('p#span3').empty();
				$('#'+selector).after("<p id='span3' style = 'color:red;font-family:Roboto;'>Invalid Input</p>");
			}
			return false;
		}
	}
}
hourArray('btn_save', 'selected', 'tableHours');
function hourArray(selector, arrayName, tableName) {
	$('#'+selector).click(function() {
		var arrayName = new Array();
		$('#'+tableName+' input[type=checkbox]:checked').each(function() {
			arrayName.push(this.value);
		});
		if(arrayName.length > 0) {
			return true;
		}
	});
}
//----Ajax function that add hours----
function  passValue(paramValue) {
	var arrayValue = {};
	arrayValue["paramValue"] = paramValue;
	return $.ajax({
		url: "checkData.php",
		type: "post",
		data: arrayValue,
		success: function(data) {
			console.log('success', data);
		}
	});
}
// //----Action that adds and subtracts hours----
// var tableClicked = $('#tableHours tbody tr');
// tableClicked.on("click", function(event) {
// 	var $target = $(event.target);
// 	if($target.is('input:checkbox:checked')){
// 		$(this).find('input:checkbox:checked').each(function() {
// 			total += parseInt($(this).val());
// 			$('#input_num_of_hours').html(total);
// 		});
// 	}else if($target.is('input:checkbox:not(:checked)')){
// 		$(this).find('input:checkbox:not(:checked)').each(function() {
// 			total -= parseInt($(this).val());
// 		});
// 	}
// 	$('#input_num_of_hours').text(total);
// });