<?php
include("../../header.php"); 
?>

<link href='<?php echo $home_path; ?>/calendar/fullcalendar.min.css' rel='stylesheet' />
<link href='<?php echo $home_path; ?>/calendar/fullcalendar.print.min.css' rel='stylesheet' media='print' />
<script src='<?php echo $home_path; ?>/calendar/lib/moment.min.js'></script>
<script src='<?php echo $home_path; ?>/calendar/lib/jquery.min.js'></script>
<script src='<?php echo $home_path; ?>/calendar/fullcalendar.min.js'></script>
<style>
    
    input[type=time]::-webkit-datetime-edit-ampm-field {
display: none;
}
</style>
<script>

$(document).ready(function () {
    var calendar = $('#calendar').fullCalendar({
		header: {
			left: 'prev,next today',
			center: 'title',
			right: 'month,basicWeek,basicDay'
		},
		navLinks: true, // can click day/week names to navigate views
		editable: true,
		eventLimit: true,
        events: "all_events.php",
        displayEventTime: false,
        eventRender: function (event, element, view) {
            if (event.allDay === 'true') {
                event.allDay = true;
            } else {
                event.allDay = false;
            }
        },
        selectable: true,
        selectHelper: true,
        select: function (start, end, allDay) {
            var title = prompt('Event Detail:');

            if (title) {
                var start = $.fullCalendar.formatDate(start, "Y-MM-DD HH:mm:ss");
                var end = $.fullCalendar.formatDate(end, "Y-MM-DD HH:mm:ss");

                $.ajax({
                    url: 'add_event.php',
                    data: 'title=' + title + '&start=' + start + '&end=' + end,
                    type: "POST",
                    success: function (data) {
                        displayMessage("Added Successfully");
                    }
                });
                calendar.fullCalendar('renderEvent',
                        {
                            title: title,
                            start: start,
                            end: end,
                            allDay: allDay
                        },
                true
                        );
            }
            calendar.fullCalendar('unselect');
        },
        
        editable: true,
        eventDrop: function (event, delta) {
                    var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
                    var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
                    $.ajax({
                        url: 'update_event.php',
                        data: 'title=' + event.title + '&start=' + start + '&end=' + end + '&id=' + event.id,
                        type: "POST",
                        success: function (response) {
                            displayMessage("Updated Successfully");
                        }
                    });
                },
        eventClick: function (event) {
            var confimit = confirm("Do you really want to delete?");
            if (confimit) {
				
                $.ajax({
                    type: "POST",
                    url: "delete_event.php",
                    data: "&id=" + event.id,
                    success: function (response) {
						
                        if(parseInt(response) > 0) {
                            $('#calendar').fullCalendar('removeEvents', event.id);
                            displayMessage("Deleted Successfully");
                        }
                    }
                });
            }
        }

    });
});

function displayMessage(message) {
	    $(".response").html("<div align='center' style='padding:20px;font-size:18px;color:#3539EA' class='success'>"+message+"</div>");
    setInterval(function() { $(".success").fadeOut(); }, 2000);
}
</script>

<style>

  body {
    padding: 0;
    font-family: "Lucida Grande",Helvetica,Arial,Verdana,sans-serif;
    font-size: 14px;
  }

  #calendar {
    max-width: 900px;
    margin: 0 auto;
  }

</style>
</head>
<body>
    
    
    
    
    
    <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="">
    <div class="col-md-12 col-sm-12 col-xs-6">
        
<script>
function selcal(a,b){
	/* alert(b); */
	/* $('#ddt').html(b); */
	calmonth=$('#calmonth').val();
	calyear=$('#calyear').val();

	$.ajax({
	type:'GET',
	url:'selpopupCalendar.php',
	data:{
		idd:a,
		dy:b,
		calmonth:calmonth,
		calyear:calyear
	},
	success:function(data){
		 //alert(data);
		 $('#calHDE').hide();
		 $('#calSHW').html(data);
		 /* $('#feedBk').html(data); */
	}
});	
}
</script>      
        
        
   
	<?php if(isset($_GET['msg']) && $_GET['msg']=='success'){ ?>			 
				<div class="alert alert-success alert-dismissible fade in" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true" onClick="myfunc();">×</span>
                    </button>
                    <strong>Success!</strong> Form added.
                </div>
	<?php }else if(isset($_GET['msg']) && $_GET['msg']=='error'){ ?>
				<div class="alert alert-danger alert-dismissible fade in" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true" onClick="myfunc();">×</span>
                    </button>
                    <strong>Error!</strong> Form not submitted.
                </div>
	<?php } ?>

   
        
<div class="x_panel">
  <div class="x_title">
    <h2>Room Booking</h2>
    <div class="clearfix"></div>
  </div>


<div class="col-md-4">    													
<div class="form-group">
<label class="col-md-3 control-label" for="title">Type</label>
<div class="col-md-6">

 <select name="rname1" id="rname1" class="form-control col-md-7 col-xs-12 select2"   onchange="selCHgRM1();" style="width:220px;">
<option value="">-- Select Room Name --</option>
<?php $sql =  "select * from addroom order by id asc";
$val = mysqli_query($conn,$sql);
while($fetch=mysqli_fetch_array($val))
{ 
?>
<?php if($fetch['id']==$_GET['rname']){ ?>
<option value="<?=$fetch['id']?>" selected ><?=$fetch['rname']?></option>
<?php }else{ ?>
<option value="<?=$fetch['id']?>"><?=$fetch['rname']?></option>
<?php } ?>
<?php  } ?>
</select>
</div>
</div>
</div>


<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#event">
			 <i class="fa fa-calendar" aria-hidden="true"></i> New Event
			</button>

			
			<div class="modal fade" id="event" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="position:fixed;top:15%;left:20%;">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="close"><span aria-hidden="true">×</span></button>
							<h4 class="modal-title" id="myModalLabel"> <i class="fa fa-calendar" aria-hidden="true"></i>
								New Event
							</h4>
						</div>
						
						
						<div class="modal-body">
							 <!-- New Event Creation Form -->
<form id="from1" name="from1" enctype="multipart/form-data"  action="<?php echo $home_path;?>/pages/operation/action/add_event.php" method="post" class="form-horizontal form-label-left" style="" autocomplete="off">
									
							<!--<form action="calendar/add_event.php" method="post" enctype="multipart/form-data" class="form-horizontal" name="novoevento" autocomplete="off">-->
								<fieldset>
									<!-- CSRF PROTECTION -->
									<input type="hidden" name="_csrf" value="9d054ab77cb75614d9304eecdaaec75a">
													<!-- Text input-->

													
<div class="form-group">
<label class="col-md-3 control-label" for="title">Type</label>
<div class="col-md-6">

 <select name="rname" id="rname" class="form-control col-md-7 col-xs-12 select2"  onchange="selCHg();">
<option value="">-- Select Room Name --</option>
<?php $sql =  "select * from addroom order by id asc";
$val = mysqli_query($conn,$sql);
while($fetch=mysqli_fetch_array($val))
{ 
?>

<option value="<?=$fetch['id']?>"><?=$fetch['rname']?></option>
<?php  } ?>
</select>
</div>
</div>

									
<div class="form-group">
<label class="col-md-3 control-label" for="title">Event Name</label>
<div class="col-md-9">
	<textarea class="form-control" rows="2" name="ename" id="ename"></textarea>
</div>
</div>

<!-- Text input-->
<div class="form-group">
<label class="col-md-3 control-label" for="color">Color</label>
<div class="col-md-4">
<div id="cp1" class="input-group colorpicker-component colorpicker-element">
<input type="color" id="clrpic" name="clrpic" value="#4AB148">
<!--<input id="clrpic" type="text" class="form-control my-colorpicker1" name="color" value="#5367ce" required=""><span class="input-group-addon"><i style="background-color: rgb(83, 103, 206);"></i></span>-->
</div>
</div>
</div>
<style>
    .without_ampm::-webkit-datetime-edit-ampm-field {
   display: none;
 }
 input[type=time]::-webkit-clear-button {
   -webkit-appearance: none;
   -moz-appearance: none;
   -o-appearance: none;
   -ms-appearance:none;
   appearance: none;
   margin: -10px; 
 }
 
 
</style>
<div class="form-group">
	<label class="col-md-3 control-label" for="start">Start Date</label>
	<div class="input-group date form_date col-md-8" data-date="" data-date-format="yyyy-mm-dd hh:ii" data-link-field="start" data-link-format="yyyy-mm-dd hh:ii">
		<!--<span class="input-group-addon"> <i class="fa fa-calendar" aria-hidden="true"></i></span>-->
		
<input class="form-control" name="start"  id="startee"  size="16" type="date" style="width:35%;float:left;height:47px;" >
<!--<input type="time" id="starttime" name="starttime" class="form-control without_ampm"  style="width:34%;float:left;height:47px;"  onblur="frmtme();">-->

<select name="starttime1" id="starttime1" class="form-control  " style="width:20%;float:left;height:47px;" onblur="frmtme1();">
<option value="0">-Hrs-</option>
<option value="01">01</option>
<option value="02">02</option>
<option value="03">03</option>
<option value="04">04</option>
<option value="05">05</option>
<option value="06">06</option>
<option value="07">07</option>
<option value="08">08</option>
<option value="09">09</option>
<option value="10">10</option>
<option value="11">11</option>
<option value="12">12</option>	
        </select>


<select name="starttime2" id="starttime2" class="form-control  " style="width:20%;float:left;height:47px;">
<option value="0">-Min-</option>
<option class="codesUPPERCase" value="00">00</option>
<option class="codesUPPERCase" value="01">01</option>
<option class="codesUPPERCase" value="02">02</option>
<option class="codesUPPERCase" value="03">03</option>
<option class="codesUPPERCase" value="04">04</option>
<option class="codesUPPERCase" value="05">05</option>
<option class="codesUPPERCase" value="06">06</option>
<option class="codesUPPERCase" value="07">07</option>
<option class="codesUPPERCase" value="08">08</option>
<option class="codesUPPERCase" value="09">09</option>
<option class="codesUPPERCase" value="10">10</option>
<option class="codesUPPERCase" value="11">11</option>
<option class="codesUPPERCase" value="12">12</option>
<option class="codesUPPERCase" value="13">13</option>
<option class="codesUPPERCase" value="11">14</option>
<option class="codesUPPERCase" value="15">15</option>
<option class="codesUPPERCase" value="16">16</option>
<option class="codesUPPERCase" value="17">17</option>
<option class="codesUPPERCase" value="18">18</option>
<option class="codesUPPERCase" value="19">19</option>
<option class="codesUPPERCase" value="20">20</option>
<option class="codesUPPERCase" value="21">21</option>
<option class="codesUPPERCase" value="22">22</option>
<option class="codesUPPERCase" value="23">23</option>
<option class="codesUPPERCase" value="24">24</option>
<option class="codesUPPERCase" value="25">25</option>
<option class="codesUPPERCase" value="26">26</option>
<option class="codesUPPERCase" value="27">27</option>
<option class="codesUPPERCase" value="28">28</option>
<option class="codesUPPERCase" value="29">29</option>
<option class="codesUPPERCase" value="30">30</option>
<option class="codesUPPERCase" value="31">31</option>
<option class="codesUPPERCase" value="32">32</option>
<option class="codesUPPERCase" value="33">33</option>
<option class="codesUPPERCase" value="34">34</option>
<option class="codesUPPERCase" value="35">35</option>
<option class="codesUPPERCase" value="36">36</option>
<option class="codesUPPERCase" value="37">37</option>
<option class="codesUPPERCase" value="38">38</option>
<option class="codesUPPERCase" value="39">39</option>
<option class="codesUPPERCase" value="40">40</option>
<option class="codesUPPERCase" value="41">41</option>
<option class="codesUPPERCase" value="42">42</option>
<option class="codesUPPERCase" value="43">43</option>
<option class="codesUPPERCase" value="44">44</option>
<option class="codesUPPERCase" value="45">45</option>
<option class="codesUPPERCase" value="46">46</option>
<option class="codesUPPERCase" value="47">47</option>
<option class="codesUPPERCase" value="48">48</option>
<option class="codesUPPERCase" value="49">49</option>
<option class="codesUPPERCase" value="50">50</option>
<option class="codesUPPERCase" value="51">51</option>
<option class="codesUPPERCase" value="52">52</option>
<option class="codesUPPERCase" value="53">53</option>
<option class="codesUPPERCase" value="54">54</option>
<option class="codesUPPERCase" value="55">55</option>
<option class="codesUPPERCase" value="56">56</option>
<option class="codesUPPERCase" value="57">57</option>
<option class="codesUPPERCase" value="58">58</option>
<option class="codesUPPERCase" value="59">59</option>
	
        </select>

<select name="startampm" id="startampm" class="form-control select2"  onchange="selCHgrampm1();" style="width:94px;float:right;height:47px;">
        <option value="">AM/PM</option>
<option value="AM">AM</option>
<option value="PM">PM</option>
</select>
	</div>
	<input id="startd" name="startdd" type="hidden" value="" class="datepicker" required="">
</div>
									
<div class="form-group">
	<label class="col-md-3 control-label" for="end">End Date</label>
	<div class="input-group date form_date col-md-8" data-date="" data-date-format="yyyy-mm-dd hh:ii" data-link-field="end" data-link-format="yyyy-mm-dd hh:ii">
<!--<span class="input-group-addon"> <i class="fa fa-calendar" aria-hidden="true"></i></span>-->
<input class="form-control datepicker" name="end" id="enddtee" size="16" type="date" style="width:35%;float:left;height:47px;" >
<!--<input type="time" id="endtime" name="endtime" class="form-control without_ampm" style="width:34%;float:left;height:47px;" onblur="totme();" >-->


<select name="endtime1" id="endtime1" class="form-control  " style="width:20%;float:left;height:47px;" onblur="totme1();">
<option value="0">-Hrs-</option>
<option value="01">01</option>
<option value="02">02</option>
<option value="03">03</option>
<option value="04">04</option>
<option value="05">05</option>
<option value="06">06</option>
<option value="07">07</option>
<option value="08">08</option>
<option value="09">09</option>
<option value="10">10</option>
<option value="11">11</option>
<option value="12">12</option>	
        </select>


<select name="endtime2" id="endtime2" class="form-control  " style="width:20%;float:left;height:47px;">
<option value="0">-Min-</option>
<option class="codesUPPERCase" value="00">00</option>
<option class="codesUPPERCase" value="01">01</option>
<option class="codesUPPERCase" value="02">02</option>
<option class="codesUPPERCase" value="03">03</option>
<option class="codesUPPERCase" value="04">04</option>
<option class="codesUPPERCase" value="05">05</option>
<option class="codesUPPERCase" value="06">06</option>
<option class="codesUPPERCase" value="07">07</option>
<option class="codesUPPERCase" value="08">08</option>
<option class="codesUPPERCase" value="09">09</option>
<option class="codesUPPERCase" value="10">10</option>
<option class="codesUPPERCase" value="11">11</option>
<option class="codesUPPERCase" value="12">12</option>
<option class="codesUPPERCase" value="13">13</option>
<option class="codesUPPERCase" value="11">14</option>
<option class="codesUPPERCase" value="15">15</option>
<option class="codesUPPERCase" value="16">16</option>
<option class="codesUPPERCase" value="17">17</option>
<option class="codesUPPERCase" value="18">18</option>
<option class="codesUPPERCase" value="19">19</option>
<option class="codesUPPERCase" value="20">20</option>
<option class="codesUPPERCase" value="21">21</option>
<option class="codesUPPERCase" value="22">22</option>
<option class="codesUPPERCase" value="23">23</option>
<option class="codesUPPERCase" value="24">24</option>
<option class="codesUPPERCase" value="25">25</option>
<option class="codesUPPERCase" value="26">26</option>
<option class="codesUPPERCase" value="27">27</option>
<option class="codesUPPERCase" value="28">28</option>
<option class="codesUPPERCase" value="29">29</option>
<option class="codesUPPERCase" value="30">30</option>
<option class="codesUPPERCase" value="31">31</option>
<option class="codesUPPERCase" value="32">32</option>
<option class="codesUPPERCase" value="33">33</option>
<option class="codesUPPERCase" value="34">34</option>
<option class="codesUPPERCase" value="35">35</option>
<option class="codesUPPERCase" value="36">36</option>
<option class="codesUPPERCase" value="37">37</option>
<option class="codesUPPERCase" value="38">38</option>
<option class="codesUPPERCase" value="39">39</option>
<option class="codesUPPERCase" value="40">40</option>
<option class="codesUPPERCase" value="41">41</option>
<option class="codesUPPERCase" value="42">42</option>
<option class="codesUPPERCase" value="43">43</option>
<option class="codesUPPERCase" value="44">44</option>
<option class="codesUPPERCase" value="45">45</option>
<option class="codesUPPERCase" value="46">46</option>
<option class="codesUPPERCase" value="47">47</option>
<option class="codesUPPERCase" value="48">48</option>
<option class="codesUPPERCase" value="49">49</option>
<option class="codesUPPERCase" value="50">50</option>
<option class="codesUPPERCase" value="51">51</option>
<option class="codesUPPERCase" value="52">52</option>
<option class="codesUPPERCase" value="53">53</option>
<option class="codesUPPERCase" value="54">54</option>
<option class="codesUPPERCase" value="55">55</option>
<option class="codesUPPERCase" value="56">56</option>
<option class="codesUPPERCase" value="57">57</option>
<option class="codesUPPERCase" value="58">58</option>
<option class="codesUPPERCase" value="59">59</option>
	
        </select>




<select name="endampm" id="endampm" class="form-control select2"  onchange="selCHgrampm2();"  style="width:94px;float:right;height:47px;">
    <option value="">AM/PM</option>
<option value="AM">AM</option>
<option value="PM">PM</option>
</select>
	</div>
	<input id="end" name="endd" type="hidden" value="" required="">
</div>


<!--<div class="form-group">
	<label class="col-md-3 control-label" for="url">Link</label>
	<div class="col-md-9">
		<input id="url" name="url" type="text" class="form-control input-md" >

	</div>
</div>

<div class="form-group">
	<label class="col-md-3 control-label" for="description">Description</label>
	<div class="col-md-9">
		<textarea class="form-control" rows="5" name="description" id="description"></textarea>
	</div>
</div>-->


						<!-- Button -->
						<div class="form-group">
							<label class="col-md-12 control-label" for="singlebutton"></label>
							<div class="col-md-12" style="text-align:center;">
								<input type="submit" name="novoevento" class="btn btn-danger" value="Submit">
							</div>
						</div>

					</fieldset>
				</form>  
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-primary" data-dismiss="modal">close</button>
			</div>
		</div>
	</div>
</div>
			
			
			
<button type="button" class="btn btn-success" data-toggle="modal" data-target="#typeee">
								<i class="fa fa-globe" aria-hidden="true"></i> View Event
							</button>
<button type="button" class="btn btn-info" data-toggle="modal" data-target="#1typeee">
<i class="fa fa-globe" aria-hidden="true"></i> Cancel Event
</button>





							
							<div class="modal fade" id="typeee" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="position:fixed;top:15%;left:20%;">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="close"><span aria-hidden="true">×</span></button>
							<h4 class="modal-title" id="myModalLabel"> <i class="fa fa-calendar" aria-hidden="true"></i>
								View Event
							</h4>
							
							
							
							
<div class="">
	<div class="x_title">
	<h2>Available Rooms and Status</h2>
	<div class="clearfix"></div>
	</div>
	<div style="overflow-y:scroll;height:350px">
		<table id="datatable-responsive1" class="table" cellspacing="0" >
			<thead>
			<tr>
				<th style="width:25%;">Hall Name</th>
				<th style="width:25%;">Booked Date</th>
				<th style="width:25%;">Event Name</th>
				<th style="width:25%;">Booked By</th>
			</tr>
			</thead>
			<tbody id="tblhde">
				<?php
				$sql=mysqli_query($conn,"select * from calevefix where status='1'");
				$added_by=$_SESSION['user'];
				while($rw=mysqli_fetch_array($sql))
				{
				$sqlr = "select * from addroom where id='".$rw['rname']."'";
				$valr = mysqli_query($conn,$sqlr);
				$fetchr=mysqli_fetch_array($valr);   
				?>					  
				<tr>
				<?php
				if($rw['startampm']=='PM'){
  $stmek=floatval($rw['starthr']-12);
}else{
  $stmek=$rw['starthr'];  
}

if($rw['endampm']=='PM'){
  $stmeke=floatval($rw['endhr']-12);
}else{
  $stmeke=$rw['endhr'];  
}
				?>
				    
				    
				    
				    
				    
					<td><?php echo $fetchr['rname']; ?></td>
					<td><?php echo $rw['evt_start']; ?> <br>
				(<?php echo $stmek; ?>:<?php echo $rw['startmn']; ?>&nbsp;<?php echo $rw['startampm']; ?> - <?php echo $stmeke; ?>:<?php echo $rw['endmn']; ?>&nbsp;<?php echo $rw['endampm']; ?>)
					</td>
					<td><?php echo $rw['ename']; ?></td>
					<td><?php echo $rw['added_by']; ?></td>
				</tr>
				<?php } 
				$sqlr1 = "select * from addroom where id NOT IN (select rname from calevefix )";
				$valr1 = mysqli_query($conn,$sqlr1);
				while($fetchr1=mysqli_fetch_array($valr1))
				{
				?>  
				<tr>
					<td><?php echo $fetchr1['rname']; ?></td>
					<td colspan="3">There are currently no bookings for this hall</td>
				</tr>
				<?php } ?>
			</tbody>
			<tbody id="tblshw">
			</tbody>
		</table>
	</div>
</div>
			  
			  
			  
			  
			  
			  
						</div>
						
						
<div class="modal-body">


</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-primary" data-dismiss="modal">close</button>
			</div>
		</div>
	</div>
</div>









							
 
 <style>
     .modal-backdrop
{
    opacity:0.5 !important;
}

.modal-backdrop.in {
    opacity: 0.9 !important;
}

.modal-backdrop {
     /*background-color: rgba(0,0,0,.0001) !important;*/
     background-color: rgba(0,0,0,.5) !important;
}
.modal-lg {
    max-width: 70% !important;
}
 </style>
 


	<div class="modal fade" id="1typeee" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="position:fixed;top:15%;left:20%;">
				<div class="modal-dialog modal-lg" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="close"><span aria-hidden="true">×</span></button>
							<h4 class="modal-title" id="myModalLabel"> <i class="fa fa-calendar" aria-hidden="true"></i>
								Cancel Event
							</h4>
							
							
<div class="">
	<!--<div class="x_title">
	<h2>Available Rooms and Status</h2>
	<div class="clearfix"></div>
	</div>-->
	<div style="overflow-y:scroll;height:350px">
		  <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                            
                            
                            
                          <th style="width:25%;">Hall Name</th>
                          <th style="width:25%;">Date</th>
                          <th style="width:25%;">Booked By</th>
                          <th style="width:25%;">Action</th>
                          
                        </tr>
                      </thead>
                      <tbody>
<?php
$sql=mysqli_query($conn,"select * from calevefix where status='1'");

$added_by=$_SESSION['user'];
while($rw=mysqli_fetch_array($sql))
   
{
  $sqlr = "select * from addroom where id='".$rw['rname']."'";
$valr = mysqli_query($conn,$sqlr);
$fetchr=mysqli_fetch_array($valr);   
    
 $rd1=mysqli_fetch_array(mysqli_query($conn,"select * from user where username='".$rw['added_by']."'"));   
    
    
?>						  
                        <tr>
                            
                            	<?php
				if($rw['startampm']=='PM'){
  $stmek=floatval($rw['starthr']-12);
}else{
  $stmek=$rw['starthr'];  
}

if($rw['endampm']=='PM'){
  $stmeke=floatval($rw['endhr']-12);
}else{
  $stmeke=$rw['endhr'];  
}
				?>
                          <td><?php echo $fetchr['rname']; ?></td>
                          <td><?php echo $rw['evt_start']; ?> (<?php echo $stmek; ?>:<?php echo $rw['startmn']; ?> <?php echo $rw['startampm']; ?>&nbsp; <?php echo $stmeke; ?>:<?php echo $rw['endmn']; ?> <?php echo $rw['endampm']; ?>)</td>
                          <td><?php echo $rw['added_by']; ?></td>
                         <td>
                            <!--<a href="<?php echo $home_path; ?>/pages/master/viewfaculty.php" class="btn btn-primary btn-xs"><i class="fa fa-folder"></i> View </a>-->
                            <?php if($_SESSION['uid']=='3' || $_SESSION['uid']==$rd1['id']){ ?>
                            <a href="<?php echo $home_path; ?>/pages/operation/action/deleteroom.php?id=<?php echo $rw['evt_id']; ?>" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Cancel </a>
                            <?php }else{ ?>
                            <a href="#" class="btn btn-danger btn-xs" disabled><i class="fa fa-trash-o"></i> Cancel </a>
                            <?php } ?>
                          </td>
                        </tr>
       <?php } ?>                 
                      </tbody>
                    </table>
					
	</div>
</div>
						</div>
<div class="modal-body">
</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-primary" data-dismiss="modal">close</button>
			</div>
		</div>
	</div>
</div>














	<script>
/*$(function(){
 $("#rname1").on('change', function(){
  
  	$.ajax({
	type:'POST',
	url:'<?php echo $home_path; ?>/pages/operation/action/selcal.php',
	data:{
	rname1:rname1
	},
	success:function(data){
		alert(data);  
		
		
	}
	});
	
	
   	
	
 })
  
});*/
	</script>

    <link rel="stylesheet" href="3b-calendar.css">
    <script src="3c-calendar.js"></script>
	
	<script>
	function selcal(a,b){
		/* alert(b); */
		/* $('#ddt').html(b); */
		calmonth=$('#calmonth').val();
		calyear=$('#calyear').val();
		rname1=$('#rname1').val();
	
		$.ajax({
		type:'GET',
		url:'selpopupCalendar.php',
		data:{
			idd:a,
			dy:b,
			calmonth:calmonth,
			rname:rname1,
			calyear:calyear
		},
		success:function(data){
			 //alert(data);
			 $('#calHDE').hide();
			 $('#calSHW').html(data);
			 /* $('#feedBk').html(data); */
		}
	});	
}

function selCHgRM1(){
   
    rname1=$('#rname1').val();
   
    	$.ajax({
		type:'POST',
		url:'selcal.php',
		data:{
			rname1:rname1
		},
		success:function(data){
			 //alert(data);
	    document.location.href="room.php?rname="+rname1;
		}
	});	
	
    
}
	
function frmtme(){
rname=$('#rname').val();
rdate=$('#startee').val();
timef=$('#starttime').val();
startee=$('#startee').val();
enddtee=$('#enddtee').val();

//alert(rdate);
if(rdate==''){
    //alert("Date should not be blank.");
}else if(timef==''){
    //alert("From time should not be blank.");
}else{
	$.ajax({
	type:'GET',
	url:'<?php echo $home_path; ?>/pages/operation/action/roommatch.php',
	data:{
	rname:rname,
	rdate:rdate,
	frmtme:'frmtme',
	timef:timef
	},
	success:function(data){
		//alert(data);  
		if(data=='1'){
		    alert("Already exists!.");
		}else{
		    
		}
		
		/*opt=data.split('$#');
		$('#timef').val(opt[0]);
		$('#timet').val(opt[1]);*/
		
		
	}
	});
}
}


function totme(){
rname=$('#rname').val();
rdate=$('#startee').val();
timef=$('#starttime').val();
timet=$('#endtime').val();
startee=$('#startee').val();
enddtee=$('#enddtee').val();

if(rdate==''){
    //alert("Date should not be blank.");
}else if(timef==''){
    //alert("From time should not be blank.");
}else{
	$.ajax({
	type:'GET',
	url:'<?php echo $home_path; ?>/pages/operation/action/roommatch.php',
	data:{
	rname:rname,
	rdate:enddtee,
	frmtme:'totme',
	timet:timet
	

	},
	success:function(data){
		 //alert(data);  
		if(data=='1'){
		    alert("Already exists!.");
		}else{
		    
		}
		

		
		
	}
	});
}
}

function selCHgrampm1(){
 rname=$('#rname').val();
rdate=$('#startee').val();
timehr=$('#starttime1').val();
timemin=$('#starttime2').val();
startampm=$('#startampm').val();

startee=$('#startee').val();
enddtee=$('#enddtee').val();

//alert(rdate);
if(rdate==''){
    //alert("Date should not be blank.");
}else if(timehr==''){
    //alert("From time should not be blank.");
}else{
	$.ajax({
	type:'GET',
	url:'<?php echo $home_path; ?>/pages/operation/action/roommatchampm.php',
	data:{
	rname:rname,
	rdate:rdate,
	frmtme:'frmtme',
	timehr:timehr,
	timemin:timemin,
	startampm:startampm
	},
	success:function(data){
		//alert(data);  
		if(data=='1'){
		    alert("Already exists!.");
            $('#starttime1').val('');
            $('#starttime2').val('');
            $('#startampm').val('');
		}else{
		    
		}
		
		/*opt=data.split('$#');
		$('#timef').val(opt[0]);
		$('#timet').val(opt[1]);*/
		
		
	}
	});
}   
}




function selCHgrampm2(){
rname=$('#rname').val();
rdate=$('#startee').val();
timef=$('#starttime').val();
timethr=$('#endtime1').val();
timetmin=$('#endtime2').val();
startee=$('#startee').val();
enddtee=$('#enddtee').val();
endampm=$('#endampm').val();
enddtee=$('#enddtee').val();
if(startee==''){
    //alert("Date should not be blank.");
}else if(rdate==''){
    //alert("Date should not be blank.");
}else if(timethr==''){
    //alert("From time should not be blank.");
}else{
	$.ajax({
	type:'GET',
	url:'<?php echo $home_path; ?>/pages/operation/action/roommatchampm.php',
	data:{
	rname:rname,
	rdate:enddtee,
	frmtme:'totme',
	timethr:timethr,
	timetmin:timetmin,
	endampm:endampm
	

	},
	success:function(data){
		//alert(data);  
		if(data=='1'){
		    alert("Already exists!.");
$('#endtime1').val('');
$('#endtime2').val('');
$('#endampm').val('');
		}else{
		    
		}
	}
	});
}
}


	</script>
  </head>
  <body>
      


    <!-- (B) PERIOD SELECTOR -->
    <div id="calPeriod" style="font-size: 10px;width: 80%;margin: 5px 0 5px 0;"><?php
      // (B1) MONTH SELECTOR
      // NOTE: DEFAULT TO CURRENT SERVER MONTH YEAR
      $months = [
        1 => "January", 2 => "Febuary", 3 => "March", 4 => "April",
        5 => "May", 6 => "June", 7 => "July", 8 => "August",
        9 => "September", 10 => "October", 11 => "November", 12 => "December"
      ];
      $monthNow = date("m");
	  echo "<select id='calmonth' style='border: 1px solid #9a9999;font-weight:bold;'>";
      foreach ($months as $m=>$mth) {
        printf("<option value='%s'%s>%s</option>", 
          $m, $m==$monthNow?" selected":"", $mth
        );
      }
      echo "</select>";
	  
      /*echo "<select id='calmonth' style='border: 1px solid #d6a64f;color:#781f19;font-weight:bold;background-color:#e5c07c;'>";
      foreach ($months as $m=>$mth) {
        printf("<option value='%s'%s>%s</option>", 
          $m, $m==$monthNow?" selected":"", $mth
        );
      }
      echo "</select>";*/

      // (B2) YEAR SELECTOR
      //echo "<input type='number' id='calyear' value='".date("Y")."'  style='border: 1px solid #d6a64f;color:#781f19;font-weight:bold;background-color:#e5c07c;'/>";
	  echo "<input type='number' id='calyear' value='".date("Y")."'  style='border: 1px solid #9a9999;font-weight:bold;height:39px;'/>";
    ?></div>

    <!-- (C) CALENDAR WRAPPER -->
	
    <div id="calwrap"  style="width:75%;float:left;" ></div>
    <!--<div id="calendar"  style="width:75%;float:left;" ></div>-->

<?php
error_reporting(0);
$dte=date('Y-m-d');

$dysdd = date("F", strtotime($dte));
$dys = date("M", strtotime($dte));
$dys1 = date("D", strtotime($dte));
$dys2 = date("d", strtotime($dte));

/* $sqqu=mysqli_query($conn,"select * from calevefix"); */
if(isset($_GET['rname']) && $_GET['rname']!=''){
$sqqu=mysqli_query($conn,"select * from calevefix WHERE rname='".$_GET['rname']."' AND CURDATE() between evt_start and evt_end");
}else{
$sqqu=mysqli_query($conn,"select * from calevefix WHERE CURDATE() between evt_start and evt_end");    
}
$evt_id="";
while($rq=mysqli_fetch_array($sqqu)){
	$evt_id.=$rq['evt_id'].',';
}
$recNo=rtrim($evt_id,',');
/* echo $recNo; */
$starttime=$rq['starttime'];
$endtime=$rq['endtime'];
$st=explode(":",$starttime);
$en=explode(":",$endtime);
$evt_text=$rq['evt_text'];
$description=$rq['description'];

/* for($cc=0;$cc<;$cc++){
} */

$hid_regnu=$evt_id;
$hidR=trim($hid_regnu, ',');
$rmNSpt=explode(',',$hidR);
$startt="";
$endt="";
for($ia=0;$ia<count($rmNSpt);$ia++) {
$sqqu=mysqli_query($conn,"select * from calevefix WHERE evt_id='".$rmNSpt[$ia]."' ORDER BY convert(`starttime`, decimal) DESC");
$rq=mysqli_fetch_array($sqqu);
$stt1=explode(":",$rq['starttime']);
$startt.=$stt1[0].',';
$end1=explode(":",$rq['endtime']);
$endt.=$end1[0].',';
}

$startt1=rtrim($startt,',');	
$endt1=rtrim($endt,',');

$xyz1 = $startt1;
$uniqueStr = implode(',', array_unique(explode(',', $xyz1)));
$array1 = array_filter(array_map('trim', explode(',', $uniqueStr)));
asort($array1);
$array1 = implode(',', $array1);
$arrayy1 = array($array1);

$xyz2 = $endt1;
$uniqueStr1 = implode(',', array_unique(explode(',', $xyz2)));
$array2 = array_filter(array_map('trim', explode(',', $uniqueStr1)));
asort($array2);
$array2 = implode(',', $array2);
$arrayy2 = array($array2);

$array12= $array1.','.$array2 ;
$uniqueStr12 = implode(',', array_unique(explode(',', $array12)));
$array21 = array_filter(array_map('trim', explode(',', $uniqueStr12)));
asort($array21);
$array21 = implode(',', $array21);

$numbers = explode(',', $array21);
$lastNumber = end($numbers);
$firstNumber = $numbers[0];

/* for($ia=0;$ia<count($rmNSpt);$ia++) {
	$rmNSpt[$ia];
} */
/* for($cc=$st[0];$cc<=$en[0];$cc++){ 
echo $startt1.'&&'.$endt1;
}
04:13 12:00 && 11:13 12:19 */

?>	
    <!--<div style="width:25%;float:left;margin: -30px 0 0 0;box-shadow: 2px 4px 6px 4px #888888;">-->
    <div style="width:25%;float:left;margin: -30px 0 0 0;">
	<table class="table table-striped table-bordered">
		<tbody id="calHDE"> 
			<tr><td id="ddt" style="width:61px;font-weight:bold;font-size:18px;"><?php echo $dysdd; ?></td><td id="ddt">&nbsp;<span  style="font-weight:bold;font-size:18px;"><?php echo $dys1; ?></span><br><span style="font-weight:bold;font-size:38px;"><?php echo $dys2; ?></span></td></tr>
			<!--<tr><td id="ddt">&nbsp;</td><td id="ddt">&nbsp;14</td></tr>-->
			
<?php 
//for($cc=8;$cc<=20;$cc++){ 
$dtm=$cc.':'.'00';
$dtmd=$cc.':'.'00';
$tme=date("h:i a", strtotime($dtm));
$tme1=date("h a", strtotime($dtm));
$ccc="24";
//$sqqu=mysqli_query($conn,"select * from calevefix WHERE rname='".$_GET['rname']."' AND CURDATE() between evt_start and evt_end");
/*if(isset($_GET['rname']) && $_GET['rname']!=''){

$sqqu1=mysqli_query($conn,"select * from calevefix WHERE rname='".$_GET['rname']."' AND '$cc' BETWEEN starthr AND endhr AND CURDATE() between evt_start and evt_end ORDER BY convert(`starttime`, decimal) DESC");
}else{
$sqqu1=mysqli_query($conn,"select * from calevefix WHERE '$cc' BETWEEN starthr AND endhr AND CURDATE() between evt_start and evt_end ORDER BY convert(`starttime`, decimal) DESC");    
}
*/

if(isset($_GET['rname']) && $_GET['rname']!=''){
$sqqu12="select * from calevefix WHERE rname='".$_GET['rname']."' AND CURDATE() between evt_start and evt_end";
}else{
$sqqu12="select * from calevefix WHERE CURDATE() between evt_start and evt_end";    
}
$nmd=mysqli_num_rows($sqqu12);
$sqqu1=mysqli_query($conn,$sqqu12);
$end12="";
while($sq12=mysqli_fetch_array($sqqu1)){
	$hmt=$home_path.$sq12['url'];
	$strr= str_replace($home_path,$sq12['url'],$hmt);
$sq1=mysqli_query($conn,"select * from calendaruser where username='".$_SESSION['usercal']."'");
$rq1=mysqli_fetch_array($sq1);
$usertype=$rq1['usertype'];
$eventgrp=$rq1['eventgrp'];

$sq212=mysqli_fetch_array(mysqli_query($conn,"select * from addroom where id='".$sq12['rname']."'"));

if($sq12['startampm']=='PM'){
  $stmek=floatval($sq12['starthr']-12);
  $stmekk=$stmek.":".$sq12['startmn'];
}else{
  $stmek=$sq12['starthr'];
  $stmekk=$stmek.":".$sq12['startmn'];
}

if($sq12['endampm']=='PM'){
  $stmeke=floatval($sq12['endhr']-12);
  $stmekee=$stmeke.":".$sq12['endmn'];
}else{
  $stmeke=$sq12['endhr'];
  $stmekee=$stmeke.":".$sq12['endmn'];
} 
 if(isset($_SESSION['usercal']) && $_SESSION['usercal']!=''){
	 
	if($sq12['url']!='' && $sq12['description']!=''){
        $end12.=$sq12['title'].', <a href=//'.$sq12['url'].' style="color:blue;" target="_blank">'.$sq12['url'].'</a>, '.$sq12['description'].' | '; 
     }else if($sq12['url']=='' && $sq12['description']!=''){
        $end12.=$sq12['title'].', '.$sq12['description'].' | ';  
     }else if($sq12['url']=='' && $sq12['description']==''){
        $end12.=$sq12['title'].' | ';  
     }else{
        $end12.=$sq12['title'].', <a href=//'.$sq12['url'].' style="color:blue;" target="_blank">'.$sq12['url'].'</a>, '.$sq12['description'].' | ';  
     }
	 
 }else{
	$end12.=$sq12['title'].', <span style="color:black;" target="_blank">'.'</span>'.$sq12['description'].' | ';   
 }
 
  $end121=$sq212['rname'].", ".$sq12['title']." from ".$sq12['evt_start']."  ".$stmek.": ".$sq12['startmn']." ".$sq12['startampm']." to ".$sq12['evt_end']." ".$stmeke.": ".$sq12['endmn']." ".$sq12['endampm'].' <span style="color:black;" target="_blank">'.'</span>'.$sq12['description'].' | '.'</span>'.$sq12['added_by'];  
  
  $dd=$stmekk.' '.$sq12['startampm'].' - '.$stmekee.' '.$sq12['endampm'];
  
?>

<tr><td style="text-align:center;"><?php echo strtoupper($dd); ?></td>
<td><?php echo $end121; ?></td></tr>
<?php
	
}
$recNo=rtrim($end12,' | ');	
?>
<?php
for($cc=$nmd;$cc<=9;$cc++){ ?>
<tr><td style="text-align:center;">&nbsp;</td><td>&nbsp;</td></tr>
<?php }	?>

<?php //} ?>
<?php //} ?>
			
		</tbody>
		<tbody id="calSHW">
		</tbody>
		
	</table>
	</div>

    <!-- (D) EVENT FORM -->
    <div id="calblock">
	<form id="calform" >
	
      <input type="hidden" id="evtid"/>  
      <!--<label for="start">Date Start</label>
      <input type="date" id="evtstart" required/>
      <label for="end">Date End</label>
      <input type="date" id="evtend" required/>
      <label for="txt">Event</label>
      <textarea id="evttxt" required></textarea>
      <label for="color">Color</label>
      <input type="color" id="evtcolor" required/>-->
	  
      <input type="submit" id="calformsave" value="Save"/>
      <input type="button" id="calformdel" value="Delete"/>
      <input type="button" id="calformcx" value="Cancel"/>
	  
    </form>
	</div>
	
		<script>
		function myfunc(){
			document.location.href="<?php echo $home_path; ?>/pages/operation/room.php?rname="
			
		}
		</script>

<?php

include("../../footer.php"); 
?>


