<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="tr" lang="tr" />
<head>
    <title>Add Chart</title>
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
	<script type="text/javascript" src="http://www.sanwebe.com/wp-content/themes/sanwebe/js/jquery-1.10.2.min.js"></script>
	
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
	});
	</script>

</head>
<body>
<div class="header">HEADER</div>
<div class="container">
	<div id="accordion_menu">
		<ul>
			<li>
				<h3><i class="fa fa-pie-chart"></i>Pie Chart</h3>
				<div>
					<h4>Pie Chart Form</h4>
					<h5>Add Chart Elements</h5>
					<form method="post" action="chartprocess.php">
					<dl class="input_fields_wrap">					    
						<dl><input type="text" name="piechart_elements[]"><a href="" class="add_field_button"><i style="margin-top: 8px;margin-left: 5px;" class="fa fa-plus-circle"></i></a><br></dl>
					</dl>
					
					<input type="submit" value="Save" />
					</form>
					
				</div>
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
	<script type="text/javascript">
	$(document).ready(function() {
	    var max_fields      = 10; //maximum input boxes allowed
	    var wrapper         = $(".input_fields_wrap"); //Fields wrapper
	    var add_button      = $(".add_field_button"); //Add button ID
	    
	    var x = 1; //initlal text box count
	    $(add_button).click(function(e){ //on add input button click
	        e.preventDefault();
	        if(x < max_fields){ //max input box allowed
	            x++; //text box increment
	            $(wrapper).append('<dl><input type="text" name="piechart_elements[]"/><a href="#" class="remove_field"><i style="margin-top: 8px;margin-left: 5px;" class="fa fa-minus-circle"></i></a></dl>'); //add input box
	        }
	    });
	    
	    $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
	        e.preventDefault(); $(this).parent('dl').remove(); x--;
	    })
	});
	</script>
</body>
</html>