$(document).ready(function() {

	var actions_buttons ='<a class="view"><i class="fa fa-eye" data-toggle="tooltip" data-placement="left" title="'+$('#tabela_funcionario').attr("tipview")+'"></i></a> ';
		actions_buttons += '<a data-toggle="modal" data-target="#edit" class="editar"><i class="fa fa-edit" data-toggle="tooltip" data-placement="left" title="'+$('#tabela_funcionario').attr("tipedit")+'"></i></a> ';
		actions_buttons += '<a href="#deletar" class="del"><i class="fa fa-trash" data-toggle="tooltip" data-placement="left" title="'+$('#tabela_funcionario').attr("tipdel")+'"></i></a>';		    					 

	var dataTable = $('#tabela_funcionario').DataTable( {
				"lengthMenu": [[10,25,50, -1], [10,25,50, $(this).attr("t")]],// modifica qtd de resultados por pagina
				"aaSorting": [[ 0, "asc" ]],// indice da coluna para a ordenação no init da DataTable
				"scrollX": true,
				"sDom":'<"top"l>rt<"bottom"ip><"clear">',
				"oLanguage": {
					"sLengthMenu": '_MENU_',
					"sZeroRecords": $(this).find("tbody").attr("sZeroRecords"),
					"sInfo": $(this).find("tbody").attr("sInfo"),
					"sInfoEmpty":$(this).find("tbody").attr("sInfoEmpty"),
					"sInfoFiltered":$(this).find("tbody").attr("sInfoFiltered"),
					"sProcessing":$(this).find("tbody").attr("sProcessing")

				},
				"bProcessing": true,// mostra o icone de processando...
				"bServerSide": true,// faz com que o processamento seja do lado do servidor
				// Ajax propriedades
				"ajax":{
					"url":"http://localhost/template-base/public/panel-control/usuario/pesquisa",
					"type":"POST",
					"data":function(d){
					d.value_search = $("#value_search").val();
					d.filters = $("#filters").val();
				},
			},
			// Colunas propriedades
			"columns": [
			{ "name": "id","width":"45px" },
				{ "name": "fk_fazenda","width":"45px" },
				{ "name": "nome","width":"200px" },
				{ "name": "nivel","width":"45px" },
				{ "name": "login","width":"150px" },
				{ "name": "pw_senha","width":"300px" },
				{ "name": "email","width":"300px" },
				
			    {
			    	"data":null,
			    	"width":"100px",
			    	"orderable":      false,
			    	"defaultContent":actions_buttons
			    }
			  ]
	});
});

// $('#value_search').on("keyup",function(e) {
    
//     	dataTable.draw();
// });
//  // Array de ids das linhas que irão mostrar os detalhes
//     var detailRows = [];
 
//     $('#tabela_funcionario tbody').off("click",".view").on( 'click', '.view', function () {

//         var tr = $(this).closest('tr');
//         var row = dataTable.row( tr );
//         var idx = $.inArray( tr.attr('id'), detailRows );
//  		var fonticon = $(this).children('i');
 		
//         if ( row.child.isShown() ) {
//             tr.removeClass( 'details' );
//             tr.removeClass('text-primary');
//             fonticon.removeClass('fa fa-eye-slash');
//            	fonticon.addClass('fa fa-eye');
//             row.child.hide(200);
 
//             // Remove from the 'open' array
//             detailRows.splice( idx, 1 );
//         }
//         else {
//             tr.addClass( 'details' );
//             fonticon.removeClass('fa fa-eye');
//             tr.addClass('text-primary');
//             fonticon.addClass('fa fa-eye-slash');
            
//            var codigo = parseInt(tr.children("td:eq(0)").text(),10);

//             $.ajax({

// 		    type: "GET",
// 		    url : pt_br.absolute_url+"/panel-control/usuario/editar",
// 		    data : {codigo:codigo},
// 		    dataType: 'json'
// 		    }).done(function(res){
// 		    	row.child(format(res[0])).show(200);
 
// 	            // Add to the 'open' array
// 	            if ( idx === -1 ) {
// 	                detailRows.push( tr.attr('id') );
// 	            }

// 		    });
            
//         }
//     });
 
//     // On each draw, loop over the `detailRows` array and show any child rows
//     dataTable.on( 'draw', function () {
//         $.each( detailRows, function ( i, id ) {
//             $('#'+id+' td.details-control').trigger( 'click' );
//         } );
//     } );
// /*------------------------------------------------------------------------
// |	Validador do formulario de edição
// |------------------------------------------------------------------------*/
// $('#edicao').bootstrapValidator({
// 	message: '',
// 	fields: {
// 		nome: {
// 			validators: {
// 				notEmpty: {
// 					message: pt_br.msg_erro_nome
// 				},
// 				stringLength: {
// 					min: 6,
// 					message: pt_br.msg_erro_nome_minimo_caractere
// 				}
// 			}
// 		},
// 		login: {
// 			validators: {
// 				notEmpty: {
// 					message: pt_br.msg_erro_login
// 				},
// 				stringLength: {
// 					max: 15,
// 					message: pt_br.msg_erro_login_maximo_caractere
// 				}
// 			}
// 		},
// 		senha: {
// 			validators: {
// 				notEmpty: {
// 					message: pt_br.msg_erro_senha
// 				}
// 			}
// 		}
// 	}
// });
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

// /*------------------------------------------------------------------------
// |	Carrega informações via ajax para edição
// |------------------------------------------------------------------------*/
// $(document).off("click",".editar").on("click",".editar",function(){

// 	$("#editar").modal("show");
// 	var codigo = parseInt($(this).parents("tr").children("td:eq(0)").text(),10);

// 	$.ajax({

//     type: "GET",
//     url : pt_br.absolute_url+"/panel-control/usuario/editar",
//     data : {codigo:codigo},
//     dataType: 'json'
//     }).done(function(res){
//     	$("#titulo_modal").html("<b style='color:#d15e5e;'>"+res[0].nome.toUpperCase()+"</b>");
//     	$("#edit_cod").val(codigo);
//     	$("input[name=nome]").val(res[0].nome);
//     	$("input[name=login]").val(res[0].login);
//     	$("input[name=cargo]").val(res[0].cargo);
//     	$("input[name=email]").val(res[0].email);
//     	$("select[name=nivel]").val(res[0].nivel);
//     	$("#foto_edicao").attr("src",res[0].foto_url);
//     	$("#foto_edicao").attr("alt",res[0].foto_url);
//     	$("#antiga_foto").val(res[0].foto_url);
//     });

// });

// /*------------------------------------------------------------------------
// |	Função de salvar edição
// |------------------------------------------------------------------------*/
// $("#salvar_edicao").off("click").on("click",function(){

// 	/* valida o formulario para: Campos vazios ou senhas diferentes*/
// 	if($("#edicao .required").validation())
// 	{
// 		alertErro(pt_br.campos_vazios);
// 		return false;
// 	}
	
// 	if($("input[name=senha]").val() == "")
// 	{
// 		$("input[type=password]").removeAttr('name');
// 	}
// 	else
// 	{
// 		$("input[type=password]").attr('name','senha');
// 	}

// 		var dados = new FormData(document.querySelector("#edicao"));

// 		$.ajax({
// 			type: "POST",
// 	        contentType: false,
// 	        url : pt_br.absolute_url+"/panel-control/usuario/editar",
// 	        enctype: 'multipart/form-data',
// 	        data : dados,
// 	        processData:false,
// 	        beforeSend: function() {
// 	         $('#ajaxLoading').fadeIn(350);
// 		    },
// 		    complete: function() {
// 		         $('#ajaxLoading').fadeOut(350);
// 		     }
// 	    }).done(function(res){
    	
// 	    	if(parseInt(res,10) == 1)
// 	    	{
// 	    		$("#editar").modal("hide");
// 	    		dataTable.draw();
// 	    		$("input[name=senha]").val("");
// 	    		alertSucesso(pt_br.msg_alteracao_sucesso);
// 	    	}
// 	    	else
// 	    	{
// 	    		alertErro(pt_br.msg_erro);
// 	    	}

// 	    });

// });
// /*------------------------------------------------------------------------
// |	FUNÇÃO DE CONFIRMAÇÃO DE EXCLUSÃO
// |------------------------------------------------------------------------*/

// $(document).off("click",".del").on("click",".del",function(){

// 	if(!confirm(pt_br.cofirmacao_deletar))
// 		return false;

// 	var id = parseInt($(this).parents("tr").children("td:eq(0)").text(),10);
// 	$.ajax({
// 		type: "GET",
// 	    url: pt_br.absolute_url+"/panel-control/usuario/deletar",
// 	    data: {id:id}
//     }).done(function(res){
    	
//     	if(parseInt(res,10) == 1)
//     	{
//     		dataTable.draw();
//     		alertSucesso(pt_br.msg_exclusao_sucesso);
//     	}
//     	else if(parseInt(res,10) == 2)
//     	{
//     		alertErro(pt_br.msg_erro_autodelete);
//     	}
//     	else if(parseInt(res,10) == 0)
//     	{
//     		alertErro(pt_br.msg_erro_relacao_funcionario);
//     	}

//     });

// });

// });

// /* ------------------------------------------------------------------ 
// |	Função para carregar a Imagem
// ------------------------------------------------------------------*/
// function readURL(input,img) {

//     if (input.files && input.files[0]) {
//         var reader = new FileReader();

//         reader.onload = function (e) {
//             img.attr('src', e.target.result);
//         }

//         reader.readAsDataURL(input.files[0]);
//     }
// }

// $(".imagem").on("change",function(){
// 	img = $(this).parents("div").find("img");
// 	array = $(this).val().split("\\");
// 	alt = array[array.length-1];
// 	img.attr("alt",alt);
//     readURL(this,img);
// });

// // Função que formata os dados para mostrar no detalhes da tabela
// function format(f){

// 	string = '';
// 	string += "<b>"+pt_br.format_field_email+"</b>"+' '+((f.email == null) ? 'nenum':f.email)+'<br>';
//     string += "<b>"+pt_br.format_field_cargo+"</b>"+' '+((f.cargo == null) ? 'nenhum':f.cargo)+'<br>';
    
//     return string;

// }

