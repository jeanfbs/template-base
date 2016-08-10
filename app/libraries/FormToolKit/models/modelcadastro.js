$(document).ready(function() {

/*  imports Plugins */
$('#form_$filename').bootstrapValidator({
	message: '',
	fields: {
		$validators
	}
});

// $("#mostrar_senha").on('click', function(event) {

// 	if($(this).is(":checked"))
// 	{
// 		$("input[name=senha]").attr("type","text");
// 		$("input[name=confirmacao]").attr("type","text");
// 	}
// 	else
// 	{
// 		$("input[name=senha]").attr("type","password");
// 		$("input[name=confirmacao]").attr("type","password");
// 	}
// });

$("#cc").on("click",function(){
	$("#form_$filename input").each(function(){
		$(this).val("");
	});
	$("#form_$filename textarea").val("");
	$("#form_$filename select").val("");
});

});