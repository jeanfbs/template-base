$(document).ready(function() {

/*  imports Plugins */
$('#form_funcionario').bootstrapValidator({
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
			nivel: {

					validators: {

						notEmpty: {

							message: $('#id_nivel').attr('notEmpty')

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
			senha: {

					validators: {

						notEmpty: {

							message: $('#id_senha').attr('notEmpty')

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
			cargo: {

					validators: {

						notEmpty: {

							message: $('#id_cargo').attr('notEmpty')

						}

						/* others fields how identical for password, max-lenght, min.lenght*/
					}
				},
			url: {

					validators: {

						notEmpty: {

							message: $('#id_url').attr('notEmpty')

						}

						/* others fields how identical for password, max-lenght, min.lenght*/
					}
				},

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
	$("#form_funcionario input").each(function(){
		$(this).val("");
	});
	$("#form_funcionario textarea").val("");
	$("#form_funcionario select").val("");
});

});