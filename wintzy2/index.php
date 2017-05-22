<?PHP
# Старт сессии
@session_start();

# Старт буфера
@ob_start();

# Константа для Include
define("CONST_RUFUS", true);

$timee = $_SESSION["sendtime"] - time();
include("coffeelini_adm/processor/index_sett.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title><?=$contentsdat[0];?></title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="<?=$contentsdat[1];?>"/>
    <meta name="keywords" content="<?=$contentsdat[2];?>"/>
	<link rel="icon" type="image/png" href="/favico/<?=$contentsdat[3];?>"/>
    <meta name="author" content="">
    <!-- Bootstrap Core CSS -->
    <!--link href="css/bootstrap.min.css" rel="stylesheet"-->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Custom CSS -->
	<? include("coffeelini_adm/css/style.php"); ?>
	
    <!-- Custom Fonts -->
    <link href="/coffeelini_adm/css/font-awesome.css" rel="stylesheet" type="text/css" />
    <link href="http://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='http://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
	<script type="text/javascript" src="/coffeelini_adm/js/jquery-2.1.3.js"></script>
   <script type="text/javascript" src="js/jquery-ui.min.js"></script>
   <script src="js/contact_me.js"></script>
</head>
<body id="page-top" class="index">

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
				<a class="page-scroll" href="#page-top">
				<img id="img_logo" class="logo_big" src="img/<?=$logo;?>" alt="imglogo" />
				</a>
            </div>
            
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
					<? if($onofa == 0){?>
                    <li>
                        <a class="page-scroll" href="#services"><?=$modul1;?></a>
                    </li>
					<?}if($onofa1 == 0){?>
                    <li>
                        <a class="page-scroll" href="#portfolio"><?=$modul2;?></a>
                    </li>
					<?}if($onofa2 == 0){?>
                    <li>
                        <a class="page-scroll" href="#about"><?=$modul3;?></a>
                    </li>
					<?}if($onofa3 == 0){?>
                    <li>
                        <a class="page-scroll" href="#team"><?=$modul4;?></a>
                    </li>
					<?}if($onofa4 == 0){?>
                    <li>
                        <a class="page-scroll" href="#contact"><?=$modul5;?></a>
                    </li>
					<?}?>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>

    <!-- Header -->
    <header>
        <div class="container">
            <div id="intro-text" class="intro-text" >
			     <? 
				 if($headersetonoffa != $y and $headersetonoffa1 != $y){ echo "<div class='headersetonoffa01'></div>";}
				 if($headersetonoffa1 != $y){ echo "<div class='blocc_text_onoff1'></div>";} 
				 
				 ?>
                <div id="intro-lead-in"  class="intro-lead-in" style="color:<?=$Headersubtitlecolor;?>;"><? if($headersetonoffa == $y){ ?><?=$Headersubtitle;?><?}else{ echo "<div class='blocc_text_onoff'></div>";} ?></div>
                <div class="intro-heading" style="color:<?=$Headermaintitlecolor;?>;"><? if($headersetonoffa1 == $y){ ?><?=$Headermaintitle;?><?}?></div>
			    
				<? if($headersetonoffa2 == $y){ ?>
                <a href="<?=$Buttongoesto;?>" class="page-scroll btn btn-xl"><?=$Buttontext;?></a>
			    <? } ?>
            </div>
        </div>
    </header>
<? if($onofa == 0){?>
    <!-- Services Section -->
    <section id="services">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading"><?=$introduction_Maintitle;?></h2>
                    <h3 class="section-subheading text-muted"><?=$introduction_Mainsubtitle;?></h3>
                </div>
            </div>
            <div class="row text-center">
                <div class="col-md-4">
                    <span class="fa-stack fa-4x">
                        <i class="fa fa-circle fa-stack-2x text-primary"></i>
                        <i class="<?=$ico_item1;?> fa-stack-1x fa-inverse"></i>
                    </span>
                    <h4 class="service-heading"><?=$Titleitem1;?></h4>
                    <p class="text-muted" style="text-align:center;"><?=$Textitem1;?></p>
                </div>
                <div class="col-md-4">
                    <span class="fa-stack fa-4x">
                        <i class="fa fa-circle fa-stack-2x text-primary"></i>
                        <i class="<?=$ico_item2;?> fa-stack-1x fa-inverse"></i>
                    </span>
                    <h4 class="service-heading"><?=$Titleitem2;?></h4>
                    <p class="text-muted"><?=$Textitem2;?></p>
                </div>
                <div class="col-md-4">
                    <span class="fa-stack fa-4x">
                        <i class="fa fa-circle fa-stack-2x text-primary"></i>
                        <i class="<?=$ico_item3;?> fa-stack-1x fa-inverse"></i>
                    </span>
                    <h4 class="service-heading"><?=$Titleitem3;?></h4>
                    <p class="text-muted"><?=$Textitem3;?></p>
                </div>
            </div>
        </div>
    </section>
<?} if($onofa2 == 0 and $onofa1 == 1){ echo "<div style='height:170px;background:#f7f7f7;'></div>";} if($onofa1 == 0){?>
    <!-- Portfolio Grid Section -->
    <section id="portfolio" class="bg-light-gray">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading"><?=$portfolio_title;?></h2>
                    <h3 class="section-subheading text-muted"><?=$portfolio_subtitle;?></h3>
                </div>
            </div>
            <div class="row">
			<?
     for ($i=1; $i<=count($portfolio_img)-1; $i++) {
	   $line = $i;
	   $portfolio_img1 = explode ("*|*", $portfolio_img[$i]);
	 $portfolio_img_title = $portfolio_img1[0];
	 $portfolio_img_subtitle = $portfolio_img1[1];
	 $portfolio_Img_Small = $portfolio_img1[7];
?>
                <div class="col-md-4 col-sm-6 portfolio-item">
                    <a href="#portfolioModal<?=$line;?>" class="portfolio-link" data-toggle="modal">
                        <div class="portfolio-hover">
                            <div class="portfolio-hover-content">
                                <i class="fa fa-plus fa-3x"></i>
                            </div>
                        </div>
                        <img src="img/portfolio/<?=$portfolio_Img_Small;?>" class="img-responsive" style="max-width: 100%;"alt="">
                    </a>
                    <div class="portfolio-caption">
                        <h4><? if($portfolio_img_title == ""){?><div style='width:1px;height:20px;'></div><?}?><?=$portfolio_img_title;?></h4>
                        <p class="text-muted" style="padding-top:2px;"><? if($portfolio_img_subtitle == ""){?><div style='width:1px;height:20px;'></div><?}?><?=$portfolio_img_subtitle;?></p>
                    </div>
                </div>
<?}?>
            </div>
        </div>
    </section>
<?} if($onofa2 == 0){?>
    <!-- About Section -->
    <section id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading"><?=$about_title;?></h2>
                    <h3 class="section-subheading text-muted"><?=$about_subtitle;?></h3>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <ul class="timeline">
<?
     for ($i=1; $i<=count($about_img)-1; $i++) {
	   $line = $i;
	   $cla = $line/2;
	$about_img1 = explode ("*|*", $about_img[$line]);
	$about_img_title = $about_img1[0];
	$about_img_subtitle = $about_img1[1];
	$about_img_text = $about_img1[2];
	$about_img_img = $about_img1[3];
	$a = sprintf("%.2f",$cla);
	$a1 = explode (".", $a);
	$cla1 = $a1[1];
	if($cla1 == 00){ $class = "timeline-inverted";}else{ $class = "";}
?>
                        <li class="<?=$class;?>" >
                            <div class="timeline-image">
                                <img class="img-circle img-responsive" src="img/about/<?=$about_img_img;?>" alt="">
                            </div>
                            <div class="timeline-panel">
                                <div class="timeline-heading">
                                    <h4><?=$about_img_title;?></h4>
                                    <h4 class="subheading"><?=$about_img_subtitle;?></h4>
                                </div>
                                <div class="timeline-body">
                                 <p class="text-muted"><?=$about_img_text;?></p>
								 </div>
                            </div>
                        </li>
 <?}?>
 <? if($aboutlower_itemonoff == 0){?>
                        <li class="timeline-inverted">
                            <div class="timeline-image" id="parentline">
							    <center>
                                <div id="timeline_image" class="timeline_image" style="top:0px;" ><h4><?=$aboutlower_itemtext;?></h4></div>
								</center>
                            </div>
                        </li>
						
<?}?>
                    </ul>
                </div>
            </div>
        </div>
    </section>
<?} if($onofa2 == 1 and $onofa3 == 0){ echo "<div style='height:170px;'></div>";} if($onofa3 == 0){?>
    <!-- Team Section -->
    <section id="team" class="bg-light-gray">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading"><?=$item_title;?></h2>
                    <h3 class="section-subheading text-muted"><?=$item_subtitle;?></h3>
                </div>
            </div>
            <div class="row">
<?
     for ($i=1; $i<=3; $i++) {
	   $line = $i;
	   $item_img1 = explode ("*|*", $item_img[$line]);
	   	$item_img_img = $item_img1[0];
	$item_img_name = $item_img1[1];
	$item_img_prif = $item_img1[2];
	$item_img_twit = str_replace(" ","",$item_img1[3]);
	$item_img_fase = str_replace(" ","",$item_img1[4]);
	$item_img_in = str_replace(" ","",$item_img1[5]);
	   
?>
                <div class="col-sm-4">
                    <div class="team-member">
                        <img src="img/team/<?=$item_img_img;?>" class="img-responsive img-circle" alt="">
                        <h4><?=$item_img_name;?></h4>
                        <p class="text-muted"><?=$item_img_prif;?></p>
                        <ul class="list-inline social-buttons">
						
						    <? if($item_img_twit != ""){?>
                            <li><a href="http://<?=$item_img_twit;?>" target="_blank"><i class="fa fa-twitter"></i></a></li>
							<?}else echo "<div style='margin:0px -2px;display:inline-block; width:1px; height:28px;'></div>"; if($item_img_fase != ""){?>
                            <li><a href="http://<?=$item_img_fase;?>" target="_blank"><i class="fa fa-facebook"></i></a></li>
							<?}else echo "<div style='margin:0px -2px;display:inline-block; width:1px; height:28px;'></div>"; if($item_img_in != ""){?>
                            <li><a href="http://<?=$item_img_in;?>" target="_blank"><i class="fa fa-linkedin"></i></a></li>
							<?}else echo "<div style='margin:0px -2px;display:inline-block; width:1px; height:28px;'></div>";?>
                        </ul>
                    </div>
                </div>
<?}?>				
            </div>
			
            <div class="row" style="text-align:center;">
                <div class="" style="text-align:center; max-width:100%;">
                <p class="large text-muted" style="margin-left:15%; max-width:70%;"><?=$item_text;?></p>
                </div>
            </div>
			
        </div>
    </section>

    
<?} if($onofa4 == 0){?>
    <section id="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading" style="color:<?=$contact_us_titlecolor;?>;"><?=$contact_us_title;?></h2>
                    <h3 class="section-subheading text-muted" style="color:<?=$contact_us_subtitlecolor;?>;" ><?=$contact_us_subtitle;?></h3>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" onBlur="validation('name')" onKeyup="validation('name')" maxlength="50" class="form-control" placeholder="<?=$contact_us_Namecaption;?><?if($contact_us_Nameonoff == 0){?>*<?}?>" id="name" name="<?=$contact_us_Nameerror;?>" nuzen="<?=$contact_us_Nameonoff;?>"/>
                                    <div style="text-align:left;" id="nameerror" class="help-block text-danger"></div>
                                </div>
                                <div class="form-group">
                                    <input type="email" onBlur="validation('email')" maxlength="50" class="form-control" placeholder="<?=$contact_us_Emailcaption;?> *" id="email" name="<?=$contact_us_Emailerror;?>" nuzen="0"/>
                                    <div style="text-align:left;" id="emailerror" class="help-block text-danger"></div>
                                </div>
                                <div class="form-group">
                                    <input type="text" onBlur="validation('phone'), proverkasecond('#phone')"  maxlength="20" id="phone" onKeyup="validation('phone'), proverkasecond('#phone')" value="" class="form-control" placeholder="<?=$contact_us_Phonecaption;?><?if($contact_us_Phoneonoff == 0){?>*<?}?>" name="<?=$contact_us_Phoneerror?>" nuzen="<?=$contact_us_Phoneonoff;?>"/>
                                    <div style="text-align:left;" id="phoneerror" class="help-block text-danger"></div>
                                </div>
                            </div>
							<input type="hidden" id="sendtext" value="<?=$contact_us_Messagesent;?>" />
                            <div class="col-md-6">
                                <div class="form-group">
                                    <textarea class="form-control" onBlur="validation('message')"  onKeyup="validation('message')"placeholder="<?=$contact_us_Messagecaption;?> *" id="message" name="<?=$contact_us_Messageerror;?>" nuzen="0" ></textarea>
                                    <div style="text-align:left;" id="messageerror" class="help-block text-danger"></div>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="col-lg-12 text-center">
                                <div id="success"></div>
                                <div class="btn btn-xl" id="timeaut" onClick="<? if($timee <= 0){?>sendmessage(<?=$contact_us_Timeout;?>)<?}else{?>ocibkasendtim(<?=$contact_us_Timeout;?>)<?}?>"><?=$contact_us_Buttontext;?></div>
                            </div>
                        </div>
                    
                </div>
            </div>
        </div>
    </section>
<?}?>
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <span class="copyright"><?=$footer_text;?></span>
                </div>
                <div class="col-md-4">
                    <ul class="list-inline social-buttons">
               	    <? if($footer_twit != ""){?>
                            <li><a href="http://<?=$footer_twit;?>" target="_blank"><i class="fa fa-twitter"></i></a></li>
							<?} if($footer_face != ""){?>
                            <li><a href="http://<?=$footer_face;?>" target="_blank"><i class="fa fa-facebook"></i></a></li>
							<?} if($footer_ini != ""){?>
                            <li><a href="http://<?=$footer_ini;?>" target="_blank"><i class="fa fa-linkedin"></i></a></li>
							<?}?>
                    </ul>
                </div>
                <div class="col-md-4">
                    <ul class="list-inline quicklinks">
                        <li><a href="mailto:<?=$footer_email;?>" ><?=$footer_email;?></a>
                        </li>             
                    </ul>
                </div>
            </div>
        </div>
    </footer>

    <!-- Portfolio Modals -->
    <!-- Use the modals below to showcase details about your portfolio projects! -->
<?
     for ($i=1; $i<=count($portfolio_img)-1; $i++) {
	   $line = $i;
	   $portfolio_img1 = explode ("*|*", $portfolio_img[$i]);
	   if($portfolio_img1[8] == 0){
	 $portfolio_Inner_title = $portfolio_img1[0];
	 $portfolio_Inner_subtitle = $portfolio_img1[1];
	 }else{
	 $portfolio_Inner_title = $portfolio_img1[2];
	 $portfolio_Inner_subtitle = $portfolio_img1[3];
	 }
	 $portfolio_Inner_text = $portfolio_img1[4];
	 $portfolio_Img_Big = $portfolio_img1[6];
?>
    <!-- Portfolio Modal 1 -->
    <div class="portfolio-modal modal fade" id="portfolioModal<?=$line;?>" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-content">
            <div class="close-modal" data-dismiss="modal">
                <div class="lr">
                    <div class="rl">
                    </div>
                </div>
            </div>
            <div class="">
                <div class="row">
                    <div class="col-lg-offset-2">
                        <div class="modal-body">
                            <!-- Project Details Go Here -->
                            <h2><?=$portfolio_Inner_title;?></h2>
                            <p class="item-intro text-muted"><?=$portfolio_Inner_subtitle;?></p>
							<center>
                            <img class="img-responsive" src="img/portfolio/<?=$portfolio_Img_Big;?>" alt="">
							
                             <p style="max-width:980px; padding:10px;"><?=$portfolio_Inner_text;?></p><BR/>
                            
						<button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fa fa-times"></i> <?=$portfolio_button_text;?></button>
                        </center>
						</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?}?>
    <!-- jQuery -->
    <script src="js/jquery.js"></script>
    <script>
var w1 = <?=$header_logo_width;?>;  // current width, e.g. 400px 
var h1 = <?=$header_logo_height;?>;
if(w1 == h1){
var wap = 62; 
var wap1 = 45;
}else{
var hed = h1 / 62;
var wap = w1 / hed;
var hed1 = h1 / 45;
var wap1 = w1 / hed1;
}

setTimeout(function(){ timeline_image(); }, 2000);
</script>
<script src="/js/cbpAnimatedHeader.js"></script>
<script src="/js/js_logo.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
    <script src="js/classie.js"></script>
	

    <!-- Contact Form JavaScript -->
    <script src="js/jqBootstrapValidation.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="js/agency.js"></script>
<?=$custom;?>
</body>
</html>
<?PHP
include("coffeelini_adm/obrab_stat.php");
include("coffeelini_adm/metrika_stat.php"); 
?>
