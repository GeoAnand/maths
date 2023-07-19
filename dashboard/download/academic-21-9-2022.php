<?php
include("header.php");
?>


<style>
    .acad-tit-h2tag{
        padding: 55px;
    text-align: left;
    }
    
    .acad-ptag{
            padding: 38px 20px 0px 0px;
    text-align: justify;
    }
    .acad-imgs{
        width: 50%;
    height: 177px;
    transform: rotate(352deg);
    margin: 0 36px 0px 0px;
        box-shadow: 0px 3px 6px #00000029;
    border: 5px solid #FFFFFF;
}
    .acad-imgs1{
          width: 50%;
    height: 177px;
    transform: rotate(11deg);
    margin: -22px 10px 0px 0px;
    box-shadow: 0px 3px 6px #00000029;
    border: 5px solid #FFFFFF;
}
.acad-pb-20{
    
    padding-bottom: 20px;
    font-weight: 500;
}
.acad-bgcol{
    /*background: #FFFFFF 0% 0% no-repeat padding-box;*/
    border-radius: 8px;
    padding: 0 45px 20px 0px;
}

.acad-img-hg{
        border-radius: 8px 16px 8px 8px;
        height:165px;
}

.acad-h4tag-pt-25{
        padding-top: 25px;
}
.img-mr-65{
    
    margin: 0 65px 0px 0px;
}
.acad-h2tag-broder{
    text-align:center;
    border: 1px solid #5C5C5C;
    border-radius: 8px;
    padding: 15px 0 15px 0px;
    font-weight: 500;
}

.img-padding{
        padding: 40px 0 40px 31px;
}

.img-over-text{
      position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  color:#fff;
}
.mr-left{
    margin: 0 0 0 -30px;
}

.img-gradient{
        background-image:
    linear-gradient(to bottom, rgba(245, 246, 252, 0.52), rgba(117, 19, 93, 0.73)),
    url('https://jytheme.com/mme/admin/download/1.jpg');
        
}
.img-mob-padding{
     padding: 0 0px 0 0px!important;
}
.over-padding{
   padding: 0 5px 0px 30px;
}

.padding-mobile-whitebg{
        margin: 0 0 0 20px;
    padding: 0 40px 0 40px;
}

.acdam-banner{
        
    
}



@media only screen and (max-width:768px)
{
    
    .img-padding{
        padding: 0px 0 0px 0px;
}
.img-mob-padding{
     padding: 0 25px 20px 25px!important;
}
.over-padding{
    padding: 0 25px 15px 22px;
}
.padding-mobile-whitebg{
           padding: 0 65px 0 14px;
}

.acdam-banner{
      
    padding: 0 110px 0 0px;
}
    
}
    
    
</style>




		<!-- Main content Start -->
        <div class="main-content" style="background-color:#F1F4F8 ">
           
          <!--  <div class="rs-breadcrumbs breadcrumbs-overlay">
                <div class="breadcrumbs-img">
                    <img src="assets/images/breadcrumbs/2.jpg" alt="Breadcrumbs Image">
                </div>
                <div class="breadcrumbs-text white-color">
                    <h1 class="page-title">Faculty</h1>
                    <ul>
                        <li>
                            <a class="active" href="index.php">Home</a>
                        </li>
                        <li>Faculty</li>
                    </ul>
                </div>
            </div>-->
            
<?php
$rq=mysqli_fetch_array(mysqli_query($conn,"select* from academic where id='1'"));
$dd2=$home_path."/admin/download/".$rq['banacaimg'];
$dd=$home_path."/admin/download/".$rq['img'];
$dd1=$home_path."/admin/download/".$rq['img1'];

?>
            
             <div class="container-fluid rs-breadcrumbs breadcrumbs-overlay" style="    background: #222324 0% 0% no-repeat padding-box;
    border-radius: 0px 0px 8px 8px;">
                <div class="breadcrumbs-img">
                    <img src="<?php echo $dd2; ?>" alt="Breadcrumbs Image">
                </div>
                <div class="breadcrumbs-text white-color acdam-banner"  style="transform: translate(-10%, -52%);">
                    <h1 class="page-title" style="text-align:center;color:#fff;font: normal normal bold 24px/15px Roboto;">Academics</h1>
                    <hr style="width:30%;text-align:left;">
                    <div class="">
                        <p  style="text-align:center;color:#fff;font: normal normal normal 14px/20px Roboto;"><?php echo nl2br($rq['titbanner']); ?></p>
                        
                        </div>
             
                    <ul>
                        <li>
                            <a class="active" href="index.php">Home</a>
                        </li>
                        <li>Faculty</li>
                    </ul>
                </div>
            </div>
            
            
            
            
             <div class="container mobcontainer" > 
              <p style="padding: 20px 0px 15px 15px;font-size:14px;">
                 <span><a class="active" href="index.php" style="color: #222324;">Home</a>&nbsp;|&nbsp;</span>
                 <span> <a class="active" style="color: #222324;" >Academics</a>&nbsp;&nbsp; </span>
                
              </p>  
             </div>
            
          
            
            <!--<div class="container mobcontainer">
                    <div class="row">
            
             <div class="rs-cta">-->  
             
            <!--<div class="container mobcontainer">
          <div class="rs-breadcrumbs breadcrumbs-overlay">
               <div class="breadcrumbs-img">
                   
                </div>
                <div class="breadcrumbs-text white-color">
                   <br>
                   <br>
                   <br>
                    <ul>
                        <li>
                            <a class="active" href="index.php">Home</a>
                        </li>
                        <li>  <a class="active" >People</a></li>
                        
                      
                        
                        <li style="font-weight:100!important" >Faculty Members</li>
                    </ul>
                </div>
            </div>   
             </div>-->
           <!--</div>
             </div>
               </div>-->
               
            

            <!-- Team Section Start
            <div id="rs-team" class="rs-team style1 inner-style orange-color pt-94 pb-100 md-pt-64 md-pb-70 white-bg">
                <div class="container">
                    <div class="row">
                    
                       
                        
                        
                    </div>
                </div>
            </div>
           Team Section End -->

            
            
            
            
            
        <!-- Popular Courses Section Start -->
            <!--<div id="rs-popular-courses" class="rs-popular-courses style1 orange-color pt-100 pb-100 md-pt-70 md-pb-70">-->
            <!--<div id="rs-popular-courses" class="rs-popular-courses style1 orange-color pb-100 md-pt-70 md-pb-70">-->
            <div id="rs-popular-courses" class="rs-popular-courses style1 orange-color">
                <div class="container " >
                    
           
                     
                    <div class="row grid">
                        
                      
                        
                         <!-- Team Section Start -->
            <!--<div id="rs-team" class="rs-team style1 inner-style orange-color pt-94 pb-100 md-pt-64 md-pb-70 grid-item filter1">-->
            <div id="rs-team" class="rs-team style1 inner-style orange-color pt-20 pb-100 md-pb-70 grid-item filter1">
                <div class="container padding-mobile-whitebg" >
                    <div class="row" >
   
   
  
                           
<div class="col-lg-12 col-sm-12 mb-30 msgHod" style="" >
    
 <div class="col-lg-4 col-sm-4 msgHod1 " style=""> 

 <!--<h2 class="acad-tit-h2tag">WHAT <br>IS <br>OUR<br> FIELD?</h2>-->
 <h2 class="acad-tit-h2tag"><?php echo nl2br($rq['tit']); ?></h2> 
  <div class="img-mr-65">
 <img src="<?php echo $dd; ?>" class="acad-imgs"><br>
 <img src="<?php echo $dd1; ?>" class="acad-imgs1">
 </div>
 </div>
 
  <div class="col-lg-8 col-sm-8 msgHod3" style=""> 
  
<div class="col-lg-12 col-sm-12 msgHod4" >
  
  <p class="acad-ptag">
      
      <?php echo nl2br($rq['des']); ?>
  </p>
  
</div>

    
</div>

 </div>
 
 
 
 
 
  
</div>



                     
                        
                       
                        
                        
                    </div>
                </div>
            </div>
            <!-- Team Section End -->
                        
                        
                        
                        
                        
                        
                 
                    </div>
                    
                    
                    <div class="container  rs-edvent orange-color rs-testimonial style2 ">
                        <div class="row">
                            <div class="col-lg-12 col-sm-12">
                                
                                <h2 class="acad-pb-20">PROGRAMMES OFFERED</h2>
                            </div>
                            
                        </div>
                        
                        <div class="row mr-left">
                            
<?php
$sqn=mysqli_query($conn,"select * from academicprogram");
while($rwn=mysqli_fetch_array($sqn)){
  $dd=$home_path."/admin/download/".$rwn['img'];  
  
  
$sq2=mysqli_fetch_array(mysqli_query($conn,"select * from academicinner where course='".$rwn['id']."'"));
$status=$sq2['status'];
    
?>
                            <div class="col-lg-6 col-sm-6" style="display:flex;margin-bottom: 50px;">
                                <!--<div class="event-item testi-wrap testi-wrap-mob mb-50 acad-bgcol" data-wow-duration="2000ms"  style="display:flex;background:linear-gradient(to left, #356691 90%, #F1F4F8 10%);">-->
                             <div class="" data-wow-duration="2000ms"  style="display:flex;background:linear-gradient(to left, #ffffff 90%, #F1F4F8 10%);border-radius: 8px;">        
                             <div class="col-lg-6 col-sm-6" style="margin-top: -15px;">
                                 <?php if($rwn['img']!=''){ ?>
                                 <img src="<?php echo $dd; ?>" alt="Image" class="acad-img-hg" >
                                 <?php }else{ ?>
                                 
                                 <?php } ?>
                                 
                                 
                               
                             </div>   
                                 <div class="col-lg-6 col-sm-6" >
                                        <div class="content-part acad-h4tag-pt-25">
                                     
                                       <h4 class="titlesmall font-16"><a href="academicinner.php?course=<?php echo $rwn['course']; ?>" style="color:#222324;"><b><?php echo $rwn['course']; ?></b></a></h4>
                                       <p class="text font-12">
                                          <?php echo $rwn['des']; ?>
                                       </p>
                                       <?php if($status=='1'){ ?>
                                       <a href="academicinner.php?course=<?php echo $rwn['course']; ?>" ><img src="img/evticon.png" alt="Image" style="width: 25px;float: right;margin-bottom: 10px;"></a>
                                       <?php }else{ ?>
                                       <img src="img/evticon.png" alt="Image" style="width: 25px;float: right;margin-bottom: 10px;cursor:pointer;">
                                       <?php } ?>
                                   </div>
                                </div>
                                
                            </div>
                              
                            </div>
<?php } ?>                            
                            
                            
                            
                            
                            
                            
                            
							
							
							
							
							
							
							
							
							
                            
                        </div>
                        
                    </div>
                    
<?php
$sqn=mysqli_query($conn,"select * from academiccourse");
$rwn=mysqli_fetch_array($sqn);
?>
                          
                    
<div class="container over-padding">
    <div class="row">
        <div class="col-lg-12 col-sm-12">
            <a href="<?php echo $rwn['link']; ?>" target="_blank" ><h2 class="acad-h2tag-broder"><?php echo $rwn['tit']; ?><span style="padding: 0px 0px 0px 15px;"><img src="img/evticon.png" alt="Image" style="width: 25px;"></span></h2></a>
        </div>
        
    </div>
</div>
                    
                    
                    
   <div class="container img-padding">
<div class="row">
                                    
<?php
$sqn=mysqli_query($conn,"select * from academictable");
while($rwn=mysqli_fetch_array($sqn)){
$dd=$home_path."/admin/download/".$rwn['img'];
?>
    <div class="col-lg-4 col-sm-4">
        <a href="<?php echo $rwn['link']; ?>" target="_blank"><img src="<?php echo $dd; ?>" class="img-graident img-mob-padding" style="height:200px;width:100%;opacity: 0.7;">
        <h5 class="img-over-text" style="color:#000;"><?php echo $rwn['tit']; ?></h5></a>
    </div>
<?php } ?>                           
                            <!--
                            <div class="col-lg-4 col-sm-4">
                               <img src="img/news-1.jpg" class="img-mob-padding">
                               <h5 class="img-over-text">Academic Calendar</h5>
                            </div>
                            
                            <div class="col-lg-4 col-sm-4">
                               <img src="img/news-1.jpg" class="img-mob-padding">
                               <h5 class="img-over-text">Thesis Format</h5>
                            </div>
                            -->
                            
                        </div>
                    </div>
                    
               
                </div>
            </div>
            <!-- Popular Courses Section End -->

      
            
            
            
            
            
            
            
            
            
            
            
            
        </div> 
        <!-- Main content End --> 

       <?php include('footer.php'); ?>