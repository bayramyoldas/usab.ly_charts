<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="tr" lang="tr" />
<head>
    <title>Administrator Panel</title>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
	<meta http-equiv="content-style-type" content="text/css" />
	<meta http-equiv="content-language" content="en" />
	<meta http-equiv="imagetoolbar" content="no" />
	<meta name="resource-type" content="media" />
	<meta name="distribution" content="global" />
	<meta name="copyright" content="2014 Bayram Yoldas" />
	<meta name="keywords" content="image, fan art, draw, game, anime, manga" />
	<meta name="description" content="" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link href="bootstrap/css/bootstrap.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">
	<script href="js/prefixfree-1.0.7.js" type="text/javascript"></script>
	<script href="js/jquery-1.7.1.min.js" type="text/javascript"></script>
	<script>
	/*jQuery*/
	$(document).ready(function(){
		$("#accordion_menu h3").click(function(){
			//slide up all the link lists
			$("#accordion_menu ul ul").slideUp();
			//slide down the link list below the h3 clicked - only if its closed
			if(!$(this).next().is(":visible"))
			{
				$(this).next().slideDown();
			}
		})
	})
	</script>
</head>
<body>
<div class="header"> </div>
<div class="container">
	<div id="accordion_menu">
		<ul>
			<li>
				<h3><span class="icon-dashboard"></span>Pie Chart</h3>
				Pie Chart Form
			</li>
			<li>
				<h3><span class="icon-dashboard"></span>Column Chart</h3>
				Pie Chart Form
			</li>
			<li>
				<h3><span class="icon-dashboard"></span>Bar Chart</h3>
				Pie Chart Form
			</li>
			<li>
				<h3><span class="icon-dashboard"></span>Line Chart</h3>
				Pie Chart Form
			</li>
			<li>
				<h3><span class="icon-dashboard"></span>Area Chart</h3>
				Pie Chart Form
			</li>
			<li>
				<h3><span class="icon-dashboard"></span>Bubble Chart</h3>
				Pie Chart Form
			</li>
			<li>
				<h3><span class="icon-dashboard"></span>Scatter Chart</h3>
				Pie Chart Form
			</li>
		</ul>
	</div>
</div>
</body>
</html>