<?php
session_start();
error_reporting(0);

/*echo 'dsdsd'.$_SESSION['usercal'];
die();*/

?>
<style>
/* width:13.38%; */
/*
.blk{margin: 0px 8px 21px 0;box-shadow: 2px 4px 6px 4px #888888;background-color:#e0dfdf !important;}
.hd{margin: 0px -3px 21px 0;}
.dyyh{margin: 5px 8px 21px 0;background-color: #781f19;color:#fff !important;}
.dyy{box-shadow: 2px 4px 6px 4px #888888;margin: 0px 8px 21px 0;border-radius: 5px;}
*/


.blks{/* width:13.38%; */margin: 0px 8px 21px 0;box-shadow: 2px 4px 6px 4px #888888;background-color:#e0dfdf !important;}
.hds{margin: 0px -3px 21px 0;}
.dyyhs{margin: 5px 8px 21px 0;background-color: #781f19;color:#fff !important;}
.dyys{box-shadow: 2px 4px 6px 4px #888888;margin: 0px 8px 21px 0;border-radius: 5px;}

</style>
<?php
class Dbcon extends mysqli 
{ 
    protected $servername = "localhost";
    protected $username = "root";
    protected $password = "";
    protected $dbname = "mathadmin";
    function __construct()
    {
        parent::__construct($this->servername, $this->username, $this->password, $this->dbname);
        if (mysqli_connect_error()) 
        {
            die('Connect Error (' . mysqli_connect_errno() . ')'. mysqli_connect_error());
        }
    }
}

$conn = new Dbcon;

// (A) INVALID AJAX REQUEST
if (!isset($_POST['req'])) { die("INVALID REQUEST"); }
require "2-cal-core.php";
switch ($_POST['req']) {
  // (B) DRAW CALENDAR FOR MONTH
  case "draw":
    // (B1) DATE RANGE CALCULATIONS
    // NUMBER OF DAYS IN MONTH
    $daysInMonth = cal_days_in_month(CAL_GREGORIAN, $_POST['month'], $_POST['year']);
    // FIRST & LAST DAY OF MONTH
    $dateFirst = "{$_POST['year']}-{$_POST['month']}-01";
    $dateLast = "{$_POST['year']}-{$_POST['month']}-{$daysInMonth}";
    // DAY OF WEEK - NOTE 0 IS SUNDAY
    $dayFirst = (new DateTime($dateFirst))->format("w");
    $dayLast = (new DateTime($dateLast))->format("w");

    // (B2) DAY NAMES
    $sunFirst = true; // CHANGE THIS IF YOU WANT MON FIRST
    $days = ["Mon", "Tue", "Wed", "Thu", "Fri", "Sat"];
    if ($sunFirst) { array_unshift($days, "Sun"); }
    else { $days[] = "Sun"; }
    foreach ($days as $d) { echo "<div class='calsq head hd dyyh' >$d</div>"; }
    unset($days);

    // (B3) PAD EMPTY SQUARES BEFORE FIRST DAY OF MONTH
    if ($sunFirst) { $pad = $dayFirst; }
    else { $pad = $dayFirst==0 ? 6 : $dayFirst-1 ; }
    for ($i=0; $i<$pad; $i++) { echo "<div class='calsq blank blk' ></div>"; }

    // (B4) DRAW DAYS IN MONTH
    $events = $CAL->get($_POST['month'], $_POST['year']);
    for ($day=1; $day<=$daysInMonth; $day++) { ?>
	<!--<div>&nbsp;</div>
	<div>&nbsp;</div>
	<div>&nbsp;</div>
	<div>&nbsp;</div>-->
	
    <div class="calsq day dyy" data-day="<?=$day?>"    onclick="selcal('<?php echo "1"; ?>','<?php echo $day; ?>');" style="cursor:pointer;">
	
      <div class="calnum"  onclick="selcal('<?php echo "1"; ?>','<?php echo $day; ?>');" style="cursor:pointer;"><?=$day?></div>
	<?php if (isset($events['d'][$day])) { foreach ($events['d'][$day] as $eid) { ?>
	<?php
		/*$sq=mysqli_query($conn,"select * from table_type where id='".$events['e'][$eid]['eventtype']."'");
		$rq=mysqli_fetch_array($sq);

		$sq1=mysqli_query($conn,"select * from calendaruser where username='".$_SESSION['usercal']."'");
		$rq1=mysqli_fetch_array($sq1);
		$usertype=$rq1['usertype'];
		$eventgrp=$rq1['eventgrp'];*/
		
		//echo "select * from addroom where id='".$events['e'][$eid]['rname']."'";
		//$sq212=mysqli_fetch_array(mysqli_query($conn,"select * from addroom where id='".$events['e'][$eid]['rname']."'"));
		//echo "select * from calevefix where rname='2'";
		//$sq212=mysqli_fetch_array(mysqli_query($conn,"select * from calevefix where rname='2'"));
		
		$sq212=mysqli_fetch_array(mysqli_query($conn,"select * from addroom where id='".$events['e'][$eid]['rname']."'"));
		
		$sq22=mysqli_fetch_array(mysqli_query($conn,"select * from calevefix where rname='".$events['e'][$eid]['rname']."'"));
		
	//if(isset($_SESSION['usercal']) && $_SESSION['usercal']!=''){ ?>
	
		<div class="calevt" data-eid="<?=$eid?>"
		 style="cursor:pointer;background:<?=$events['e'][$eid]['evt_color']?>" onclick="selcal('<?=$events['e'][$eid]['evt_id']?>','<?=$day?>');" title="<?php if($sq212['rname']!=''){ echo $sq212['rname'].', ';} ?><?=$events['e'][$eid]['evt_text']?> from <?= $events['e'][$eid]['evt_start']." ".$events['e'][$eid]['starttime'] ." ".$events['e'][$eid]['startampm'] ?> to <?=$events['e'][$eid]['evt_end']." ".$events['e'][$eid]['endtime']." ".$events['e'][$eid]['endampm'] ?> ">
		<?=$sq212['rname'].", ".$events['e'][$eid]['evt_text'].", ".$sq22['added_by'] ?>
		</div>
			
<!--<div class="calevt" data-eid="<?=$eid?>"
	 style="cursor:pointer;background:<?=$events['e'][$eid]['evt_color']?>" onclick="selcal('<?=$events['e'][$eid]['evt_id']?>','<?=$day?>');" title="<?=$events['e'][$eid]['evt_text']?> from <?=$events['e'][$eid]['starttime']?> to <?=$events['e'][$eid]['endtime']?> <?php if($events['e'][$eid]['description']!=''){ echo ', '.$events['e'][$eid]['description'];} ?>">
  <?=$events['e'][$eid]['evt_text']?>			 
</div>-->
<?php //}else{ ?>
<!--<div class="calevt" data-eid="<?=$eid?>"
	 style="cursor:pointer;background:<?=$events['e'][$eid]['evt_color']?>" onclick="selcal('<?=$events['e'][$eid]['evt_id']?>','<?=$day?>');"  title="<?=$events['e'][$eid]['evt_text']?> from <?=$events['e'][$eid]['starttime']?> to <?=$events['e'][$eid]['endtime']?> <?php if($events['e'][$eid]['description']!=''){ echo ', '.$events['e'][$eid]['description'];} ?>">
  <?=$events['e'][$eid]['evt_text']?>
</div>-->
<?php //} ?>
<?php 
//if ($day == $events['e'][$eid]['first']) {
//echo "<div id='evt$eid' class='calninja'>".json_encode($events['e'][$eid])."</div>";
//}

}
} 
?>
		
    </div>
    <?php }


    // (B5) PAD EMPTY SQUARES AFTER LAST DAY OF MONTH
    if ($sunFirst) { $pad = $dayLast==0 ? 6 : 6-$dayLast ; }
    else { $pad = $dayLast==0 ? 0 : 7-$dayLast ; }
    for ($i=0; $i<$pad; $i++) { echo "<div class='calsq blank blk'  style=''></div>"; }
    break;
  
  // (C) SAVE EVENT
  case "save":
    echo $CAL->save(
      $_POST['start'], $_POST['end'], $_POST['txt'], $_POST['color'],
      isset($_POST['eid']) ? $_POST['eid'] : null
    ) ? "OK" : $CAL->error ;
    break;
  
  // (D) DELETE EVENT
  case "del":
    echo $CAL->del($_POST['eid'])  ? "OK" : $CAL->error ;
    break;
}