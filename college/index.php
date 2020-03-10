<?php
	include ('../functions/Db.php');
	$db = new Db();		
?>
<!DOCTYPE html>
    <head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="">
		<meta name="author" content="">
		<title>OSAS - </title>
		<link rel="stylesheet" href="../lib/bootstrap/css/bootstrap.min.css">
		<script type="text/javascript" src="../js/jquery-3.4.1.min.js"></script>
		<!-- <link rel = "stylesheet" type = "text/css" href = "../css/style.css"> -->
		<script type="text/javascript" src="../lib/bootstrap/js/bootstrap.min.js"></script>
		<link rel="stylesheet" type="text/css" href="../lib/fontawesome/css/all.css">
		<script type="text/javascript" src="../js/functions.js"></script>
	</head>
	<body>
		<form>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="college_name">College name</label>
                    <select id="college_name" required>
                        <option value=''>- SELECT -</option>
                        <option value="CIC">CIC</option>
                        <option value="CAS">CAS</option>
                        <option value="CED">CED</option>
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label for="date">Date</label>
                    <input type="date" class="form-control" id="date" >
                </div>
                <div class="form-group col-md-6">
                    <label for="activity">Activity</label>
                    <input type="text" class="form-control" id="activity" placeholder="activity">
                </div>
                <div class="form-group col-md-6">
                    <label for="participants">Participants</label>
                    <input type="text" class="form-control" id="participants" placeholder="participants">
                </div>
                <div class="form-group col-md-6">
                    <label for="budget">Budget</label>
                    <input type="text" class="form-control" id="budget" placeholder="budget">
                </div>
                <div class="form-group col-md-6">
                    <label for="fund_source">Fund Source</label>
                    <input type="text" class="form-control" id="fund_source" placeholder="fund_source">
                </div>
                <div class="form-group col-md-6">
                    <label>Remarks</label>
                    <input type="text" class="form-control" id="remarks" placeholder="remarks">
                </div>
                <div class="form-group col-md-6">
                    <button type="button" name="add" id="add" class="btn btn-success">Add</button>
                </div>
            </div>
            <button type="button" class="btn btn-primary" id="Submit">Submit</button>
        </form>

            <div id="imageModal" class="modal fade" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Add Image</h4>
                        </div>
                        <div class="modal-body">
                            <form id="image_form" method="POST" enctype="multipart/form-data">
                                <p><label>Select File</label></p>
                                <input type="file" name="image[]" id="image" multiple accept/>
                                <input type="submit" name="submit" id="submit" class="btn btn-info">
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>                
                </div>
            </div>

		<script type="text/javascript" src="../lib/js/jquery-3.4.1.min.js"></script>
		<script type="text/javascript" src="../lib/bootstrap/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="../lib/fontawesome/js/fontawesome.min.js"></script>
		<script type="text/javascript" src="../js/functions.js"></script>
        <script type="text/javascript" src="../js/function.js"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> 
        <script>
            function addCollege(college_name, date, activity, participants, budget, fund_source, remarks){
                var dynamicData = {};
                dynamicData["college_name"] = college_name;
                dynamicData["date"] = date;
                dynamicData["activity"] = activity;
                dynamicData["participants"] = participants;
                dynamicData["budget"] = budget;
                dynamicData["fund_source"] = fund_source;
                dynamicData["remarks"] = remarks;
                return $.ajax({
                    url: "insertCollege.php",
                    type: "post",
                    data: dynamicData,
                    success: function(data){
                        // swal("Success!", "Inserted!", "success");
                        // alert(data);
                    }
                });
            }
            $(document).ready(function(){

                $('#add').click(function(){
                    $('#imageModal').modal('show');
                    $('#image_form')[0].reset();
                    $('.modal-title').text("Add Files");
                });

                $('#image_form').on('submit', function(event){
                    event.preventDefault();
                    var image_name = $('#image').val();
                    var college_name = $('#college_name').val();
                    if(image_name == '')
                    {
                        // alert("Please Select Image");
                        // return false;
                    }
                    else
                    {
                        $.ajax({
                            url:"upload.php",
                            method:"POST",
                            data: new FormData(this),
                            contentType:false,
                            cache:false,
                            processData:false,
                            success:function(data)
                            {
                                //$('#image').val('');
                                // console.log(data);
                                $('#image_form')[0].reset();
                                $('#imageModal').modal('hide');
                            }
                        });
                    }
                });

                $('#Submit').on('click', function(){
                    dynamicData["college_name"] = college_name;
                dynamicData["date"] = date;
                dynamicData["activity"] = activity;
                dynamicData["participants"] = participants;
                dynamicData["budget"] = budget;
                dynamicData["fund_source"] = fund_source;
                dynamicData["remarks"] = remarks;
                    addCollege($('#college_name').val(), $('#date').val(), $('#activity').val(), $('#participants').val(), $('#budget').val(), $('fund_source').val(), $('#remarks').val());
                });
            });
        </script>
   </body>
</html>
