$(document).ready(function() {

$('#form_$filename').bootstrapValidator({
	message: '',
	fields: {
		$validators
	}
});

$("#cc").on("click",function(){
	$("#form_$filename input").each(function(){
		$(this).val("");
	});
	$("#form_$filename textarea").val("");
	$("#form_$filename select").val("");
});

});