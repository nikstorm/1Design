<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	
	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
	
	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<body>
	<form action="" class="form-inline">
		<fieldset>
			<div class="form-group">
				<input type="text" class="form-control" placeholder="Адрес сайта" name="url" id="url">
				<input type="submit" class="btn btn-default">
			</div>
		</fieldset>
	</form>
	<?php 
require("simplehtmldom_1_5/simple_html_dom.php");
// Create DOM from URL or file
$html = file_get_html($_GET["url"]);
$f = 'loftblog.txt';
$file = fopen($f,'w+');
echo $_GET['url'];
// Find all links 
foreach($html->find('a') as $element) {
       echo $element->plaintext . '<br>';
       $text = $element->plaintext."\r\n";
       //fwrite($file, $text);
}
fclose($file);
//a class="yt-uix-sessionlink yt-uix-tile-link  spf-link  yt-ui-ellipsis yt-ui-ellipsis-2" 
//https://www.youtube.com/user/loftblog/playlists?flow=grid&view=1
 ?>
</body>
</html>

