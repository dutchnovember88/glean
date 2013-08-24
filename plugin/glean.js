jQuery(document).ready(function ($) {
	var target = "#"+jsParams.unique;
	var sheet =jsParams.sheet;
	
	$(target).sheetrock({
		url: sheet,
		sql: "select B, C order by A"
		//,chunkSize: 20
	});
});