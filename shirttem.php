<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" conten t="width=device-width, initial-scale=1">
	<title>sample</title>
</head>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <link rel="stylesheet" type="text/css" href="style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
  $( function() {
    $( "#draggable" ).draggable();
  } );
  </script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.8.1/css/bootstrap-select.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.8.1/js/bootstrap-select.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="fa.min.css">
  <link href="fas/css/fontawesome.css" rel="stylesheet">
  <link href="fas/css/brands.css" rel="stylesheet">
  <link href="fas/css/solid.css" rel="stylesheet">

<body>
<div class="body" id="body" style="width: 20%;">
	<img src="images/560.png" class="img-responsive">
</div>
<input type="color" name="color" id="color">
<div id="draggable" class="ui-widget-content">
  <p>Drag me around</p>
</div>
 




<script type="text/javascript">
	$(document).ready(function () {
		$("#red").click(function(){
			$("#body").css({"background-color":"red"})
		});
		$("#green").click(function(){
			$("#body").css({"background-color":"green"})
		});
		$("#color").change(function(){
			$("#body").css({"background-color":$(this).val()})
		});
		
	});
</script>
</body>
</html>