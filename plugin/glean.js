jQuery(document).ready(function ($) {
	var template = _.template($('#listed').html());
	var sheet =jsParams.sheet;
	
	$("#response").sheetrock({
		url: sheet,
		sql: "select %FirstName%, %LastName%",
		headersOff: true,
		rowHandler: template
	});
});