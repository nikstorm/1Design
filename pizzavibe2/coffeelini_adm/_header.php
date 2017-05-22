<?PHP
###########################################
# Specially for Coffeelini ( studio_sv700 )
###########################################

$admin = $_SESSION["admin"];
include("coffeelini_adm/obrab_stat.php");
    $contents2 = file("coffeelini_adm/db/contents.db");
    $contentsdat2 = explode ("*|*", $contents2[0]);
	
	
		// Introduction
	  $introduction = file("coffeelini_adm/db/introduction.db");
      $introduction1 = explode ("*|*", $introduction[1]);
	  $introduction_Maintitle = $introduction1[0];
	  	// Portfolio
	      $portfolio = file("coffeelini_adm/db/portfolio.db");
      $portfolio1 = explode ("*|*", $portfolio[1]);
	  $portfolio_title = $portfolio1[0];
	  	// About
	  $about = file("coffeelini_adm/db/about.db");
	$about1 = explode ("*|*", $about[1]);
	$about_title = $about1[0];
		// Item
	     $item = file("coffeelini_adm/db/item.db");
      $item1 = explode ("*|*", $item[1]);
	  $item_title = $item1[0];
	  	// contact
	$contact_us = file("coffeelini_adm/db/contact_us.db");
$contact_us1 = explode ("*|*", $contact_us[1]);
$contact_us_title = $contact_us1[0];
	    $head_name_modul = file("coffeelini_adm/db/name_modul.db");
	$head_name_modul1 = explode ("*|*", $head_name_modul[1]);
	$h_modul1 = $introduction_Maintitle;
    $h_modul2 = $portfolio_title;	
    $h_modul3 = $about_title;	
	$h_modul4 = $item_title;
	$h_modul5 = $contact_us_title;
?>
<html>
	<head>
		<title>Welcome to the Admin CP</title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<meta name="description" content="Welcome to Admin"/>
		<meta name="keywords" content="Welcome to Admin"/>
		<link href="/coffeelini_adm/css/style.css" rel="stylesheet" type="text/css" />
		<link href="/coffeelini_adm/css/Introduction.css" rel="stylesheet" type="text/css" />
		<link href="/coffeelini_adm/css/about.css" rel="stylesheet" type="text/css" />
		<link href="/coffeelini_adm/css/portfolio.css" rel="stylesheet" type="text/css" />
		<link href="/coffeelini_adm/css/item.css" rel="stylesheet" type="text/css" />
		<link href="/coffeelini_adm/css/aparance.css" rel="stylesheet" type="text/css" />

		<link href="/coffeelini_adm/css/font-awesome.css" rel="stylesheet" type="text/css" />
		<link href="/coffeelini_adm/js/cleditor/jquery.cleditor.css" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" media="screen" type="text/css" href="/coffeelini_adm/css/colorpicker.css" />
		<link rel="icon" type="image/png" href="/favico/<?=$contentsdat2[3];?>"/>
		<script type="text/javascript" src="/coffeelini_adm/js/jquery-2.1.3.js"></script>
		<script type="text/javascript" src="/coffeelini_adm/js/google_aps.js"></script>
		<script type="text/javascript" src="/js/jquery-ui.min.js"></script>
		<script type="text/javascript" src="/coffeelini_adm/js/header_img_up.js"></script>
		<script type="text/javascript" src="/coffeelini_adm/js/header_js_bc_vib.js"></script>
		<script type="text/javascript" src="/coffeelini_adm/js/js.js"></script>
		<script type="text/javascript" src="/coffeelini_adm/js/ajaxupload.3.5.js"></script>
		<script type="text/javascript" src="/coffeelini_adm/js/cleditor/jquery.cleditor.js"></script>
        <script type="text/javascript" src="/coffeelini_adm/js/colorpicker.js"></script>
		<script type="text/javascript" src="/coffeelini_adm/js/colorimg.js"></script>
		
		<script type="text/javascript" src="/coffeelini_adm/js/introduction.js"></script>
		<script type="text/javascript" src="/coffeelini_adm/js/portfolio.js"></script>
		<script type="text/javascript" src="/coffeelini_adm/js/about.js"></script>
		<script type="text/javascript" src="/coffeelini_adm/js/item.js"></script>
		<script type="text/javascript" src="/coffeelini_adm/js/contact_us.js"></script>
		<script type="text/javascript" src="/coffeelini_adm/js/aparance.js"></script>
		<script type="text/javascript" src="/coffeelini_adm/js/dvig.js"></script>
	</head>
	<body >
	<? if(isset($_SESSION["admin"])){?>
	<div class="header">
	<a class="logo" href="/admin" >Admin CP</a>
	<div class="menu">
	
	<div class="menu_adm" onClick="showlayer('menu_adm_block')"><i class="fa fa-user"></i> <?=$admin;?> <i class="fa fa-caret-down"></i>
	<div id="menu_adm_block" class="menu_adm_block" style="display:none;">
	<a href="/" style="text-decoration:none;" target="_blank"><div class="menu_adm_block_a" style="padding-left:24px;"><span><i class="fa fa-play"></i> View site</span></div></a>
	<div class="menu_adm_block_a" onClick="content('/settings', 'content_adm'), start()"><span><i class="fa fa-fw fa-gear"></i> Settings</span></div>
	<div class="menu_adm_block_a_line"></div>
	<div class="menu_adm_block_a" onClick="a('/exit');"><span><i class="fa fa-fw fa-power-off"></i> Log Out</span></div>
	</div>
	</div>

	</div>
	</div>
	<div class="menu_site">
	<div class="line"></div>
	<div class="menu_site_a" onClick="a('/admin')"><span><i class="fa fa-fw fa-dashboard"></i> Dashboard</span></div>
	<div class="menu_site_a" onClick="content('/stats', 'content_adm'), start()"><span><i class="fa fa-fw fa-table"></i> Stats</span></div>
	<div class="menu_site_a" onClick="content('/contents', 'content_adm'), start()"><span><i class="fa fa-fw fa-edit"></i> Contents</span></div>
	<div class="menu_site_a" onClick="showlayer('modules')"><span> <i class="fa fa-list"></i>  Main modules <i class="fa fa-caret-down"></i></span></div>
	<div id="modules" style="display:block;">
	<div class="menu_site_a" style="padding:10px 0px 10px 0px;" onClick="content('/header', 'content_adm'), start()"><span style="margin-left:40px;"> Header</span></div>
	<div class="menu_site_a" style="padding:10px 0px 10px 0px;" onClick="content('/whatwe', 'content_adm'), start()"><span style="margin-left:40px;"> <?=$h_modul1;?></span></div>
	<div class="menu_site_a" style="padding:10px 0px 10px 0px;" onClick="content('/photos', 'content_adm'), start()"><span style="margin-left:40px;"> <?=$h_modul2;?></span></div>
	<div class="menu_site_a" style="padding:10px 0px 10px 0px;" onClick="content('/about', 'content_adm'), start()"><span style="margin-left:40px;"> <?=$h_modul3;?></span></div>
	<div class="menu_site_a" style="padding:10px 0px 10px 0px;" onClick="content('/team', 'content_adm'), start()"><span style="margin-left:40px;"> <?=$h_modul4;?></span></div>
	<div class="menu_site_a" style="padding:10px 0px 10px 0px;" onClick="content('/contact', 'content_adm'), start()"><span style="margin-left:40px;"> <?=$h_modul5;?></span></div>
	<div class="menu_site_a" style="padding:10px 0px 10px 0px;" onClick="content('/footer', 'content_adm'), start()"><span style="margin-left:40px;"> Footer</span></div>
	</div>
	<div class="menu_site_a" onClick="content('/appearance', 'content_adm'), start()"><span><i class="fa fa-fw fa-desktop"></i> Appearance</span></div>
	<div class="menu_site_a" onClick="content('/settings', 'content_adm'), start()"><span><i class="fa fa-fw fa-gear"></i> Settings</span></div>
	<a href="/" style="text-decoration:none;" target="_blank"><div class="menu_site_a" style="padding-left:4px;"><span><i class="fa fa-play"></i> View site</span></div></a>
	<BR/><BR/><BR/><BR/>
	</div>
	
	<div id="start" class="start" style="display:block;"></div>
	<div id="start_save" class="start start_save" style="display:none;"></div>
	<div id="start_save_bil" class="start_save_bil" style="display:none;"></div>
	<div class="vopros_uns" id="vopros_uns">
	<div class="vopros_uns1" >
	<div class="vopros_uns_block">
	<span>Are you sure?</span><BR/><BR/>
	<div class="input_sign inp_save inp_bascs" style="float:left;margin-left:25px; margin-right:0px;" title="Canсel" onClick="vopros_uns_close();" >Canсel</div>
	<div class="input_sign inp_save" title="Yes" style="margin-right:25px; margin-left:0px;" id="vopros_uns_yes" onClick="portfolio_img_title('<?=$line;?>'), start_save()" >Yes</div>
	</div>
	</div>
	</div>
	<div id="content_adm" class="content_adm">
	<?}?>