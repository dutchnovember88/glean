jQuery(document).ready(function ($) {

	var sheet =jsParams.sheet;
	$('#signups').sheetrock({
		url: sheet,
		sql: "select B, C order by A"
		//,chunkSize: 20
	});
});