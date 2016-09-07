$(document).ready(function() {

$('#form_usuario').bootstrapValidator({
	message: '',
	fields: {
			nome: {

					validators: {

						notEmpty: {

							message: $('#id_nome').attr('notEmpty')

						}

						/* others fields how identical for password, max-lenght, min.lenght*/
					}
				},
			telefone: {

					validators: {

						notEmpty: {

							message: $('#id_telefone').attr('notEmpty')

						}

						/* others fields how identical for password, max-lenght, min.lenght*/
					}
				},
			email: {

					validators: {

						notEmpty: {

							message: $('#id_email').attr('notEmpty')

						}

						/* others fields how identical for password, max-lenght, min.lenght*/
					}
				},
			login: {

					validators: {

						notEmpty: {

							message: $('#id_login').attr('notEmpty')

						}

						/* others fields how identical for password, max-lenght, min.lenght*/
					}
				},
			pw_senha: {

					validators: {

						notEmpty: {

							message: $('#id_senha').attr('notEmpty')

						}

						/* others fields how identical for password, max-lenght, min.lenght*/
					}
				},
			tipo: {

					validators: {

						notEmpty: {

							message: $('#id_tipo').attr('notEmpty')

						}

						/* others fields how identical for password, max-lenght, min.lenght*/
					}
				},

	}
});

$("#mostrar_senha").on('click', function(event) {

	if($(this).is(":checked"))
	{
		$("input[name=pw_senha]").attr("type","text");
		$("input[name=confirmacao]").attr("type","text");
	}
	else
	{
		$("input[name=pw_senha]").attr("type","password");
		$("input[name=confirmacao]").attr("type","password");
	}
});

$("#cc").on("click",function(){
	$("#form_usuario input").each(function(){
		$(this).val("");
	});
	$("#form_usuario textarea").val("");
	$("#form_usuario select").val("");
});

});