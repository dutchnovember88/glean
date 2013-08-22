<!DOCTYPE HTML>
<html>

<head>
<title>Testing</title>

<link href="custom.css" rel="stylesheet" type="text/css">
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="jquery.sheetrock.js"></script>
</head>

<body>

<div>
	<form method="post">
		My spreadsheet: <input name="sheet" id="sheet" type="text" value="<?php echo (isset($_POST["sheet"])? $_POST["sheet"]: "") ?>"/>
		<br>
		Capitalize names<input name="case" value="caps" type="radio" <?php echo (isset($_POST["case"])&&$_POST["case"]=="caps"? "checked": "") ?>/>
		<br>
		As submitted<input name="case" value="raw" type="radio" <?php echo (isset($_POST["case"])&&$_POST["case"]=="raw"? "checked": "") ?>/>
		<br>
		<input type="submit" value="Rock the sheet"/>
	</form>
	
	<br>
	
	<?php if (!isset($_POST["sheet"]) || ($_POST["sheet"])=="") {?>
		<div class="message">Please submit a sheet</div>
	<?php } else {?>
		<table id="going" cellspacing="0" cellpadding="4" class="<?php echo (isset($_POST["case"])? $_POST["case"]: "raw") ?>">
		</table>
	<?php } ?>
</div>

</body>
</html>

<script type="text/javascript">
<?php if (isset($_POST["sheet"])) {?>
	// Define spreadsheet URL
	var magicMountain = "<?php echo($_POST["sheet"])?>";

	// Load spreadsheet
	$('#going').sheetrock({
		url: magicMountain,
		sql: "select B, C order by A"
		//,chunkSize: 20
	});

	// Notes: we can create templates too
	// would like to see example for callback function
<?php } ?>
</script>