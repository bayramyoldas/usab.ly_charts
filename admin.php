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
	<link href="css/style.css" rel="stylesheet">
	<link href="css/font-awesome.css" rel="stylesheet">
	<script href="js/prefixfree-1.0.7.js" type="text/javascript"></script>
	<script src="js/jquery-1.7.1.min.js" type="text/javascript"></script>
	<script>
	/*jQuery*/
	$(document).ready(function(){
		$("#accordion_menu h3").click(function(){
			//slide up all the link lists
			$("#accordion_menu ul div").slideUp();
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
<div class="header">HEADER</div>
<div class="container">
	<div id="accordion_menu">
		<ul>
			<li>
				<h3><i class="fa fa-pie-chart"></i>Pie Chart</h3>
				<div>Pie Chart Form</div>
			</li>
			<li>
				<h3><i class="fa fa-pie-chart"></i></span>Column Chart</h3>
				<div>Column Chart Form</div>
			</li>
			<li>
				<h3><i class="fa fa-bar-chart"></i></span>Bar Chart</h3>
				<div>Bar Chart Form</div>
			</li>
			<li>
				<h3><i class="fa fa-line-chart"></i></span>Line Chart</h3>
				<div>Line Chart Form</div>
			</li>
			<li>
				<h3><i class="fa fa-area-chart"></i></span>Area Chart</h3>
				<div>Area Chart Form</div>
			</li>
			<li>
				<h3><i class="fa fa-pie-chart"></i></span>Bubble Chart</h3>
				<div>Bubble Chart Form</div>
			</li>
			<li>
				<h3><i class="fa fa-pie-chart"></i></span>Scatter Chart</h3>
				<div>Scatter Chart Form</div>
			</li>
		</ul>
	</div>
</div>
</body>
</html>