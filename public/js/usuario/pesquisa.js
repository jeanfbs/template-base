$(document).ready(function() {

/*------------------------------------------------------------------------
|	Actions Buttons for table
------------------------------------------------------------------------*/
	var actions_buttons ='<a class="view"><i class="fa fa-eye" data-toggle="tooltip" data-placement="left" title="'+$('#translate').attr("tipview")+'"></i></a> ';
		actions_buttons += '<a data-toggle="modal" data-target="#edit" class="editar"><i class="fa fa-edit" data-toggle="tooltip" data-placement="left" title="'+$('#translate').attr("tipedit")+'"></i></a> ';
		actions_buttons += '<a href="#deletar" class="del"><i class="fa fa-trash" data-toggle="tooltip" data-placement="left" title="'+$('#translate').attr("tipdel")+'"></i></a>';		    					 


/*----------------------------------------------------------------------
|	DataTable Plugin Function
------------------------------------------------------------------------*/
	var dataTable = $('#tabela_usuario').DataTable( {
				"lengthMenu": [[10,25,50, -1], [10,25,50, $("#translate").attr("t")]],// modifica qtd de resultados por pagina
				"aaSorting": [[ 0, "asc" ]],// indice da coluna para a ordenação no init da DataTable
				"scrollX": true,
				"sDom":'<"top"l>rt<"bottom"ip><"clear">',
				"oLanguage": {
					"sLengthMenu": '_MENU_',
					"sZeroRecords": $("#translate").attr("sZeroRecords"),
					"sInfo": $("#translate").attr("sInfo"),
					"sInfoEmpty":$("#translate").attr("sInfoEmpty"),
					"sInfoFiltered":$("#translate").attr("sInfoFiltered"),
					"sProcessing":$("#translate").attr("sProcessing")

				},
				"bProcessing": true,// mostra o icone de processando...
				"bServerSide": true,// faz com que o processamento seja do lado do servidor
				// Ajax propriedades
				"ajax":{
					"url":localStorage.getItem("baseUrl")+"/panel-control/usuario/pesquisa",
					"type":"POST",
					"data":function(d){
					d.value_search = $("#value_search").val();
					d.filters = $("#filters").val();
				},
			},
			// Colunas propriedades
			"columns": [
			{ "name": "id","width":"45px" },
				{ "name": "nome","width":"300px" },
				{ "name": "telefone","width":"200px" },
				{ "name": "email","width":"300px" },
				{ "name": "login","width":"300px" },
				{ "name": "pw_senha","width":"400px" },
				{ "name": "tipo","width":"150px" },
				
			    {
			    	"data":null,
			    	"width":"100px",
			    	"orderable":      false,
			    	"defaultContent":actions_buttons
			    }
			  ]
	});
/*------------------------------------------------------------------------
|	Search Event for Keyup on dataTable
------------------------------------------------------------------------*/
$('#value_search').on("keyup",function(e) {
    
    	dataTable.draw();
});

 // Array de ids das linhas que irão mostrar os detalhes
    var detailRows = [];
 
    $('#tabela_usuario tbody').off("click",".view").on( 'click', '.view', function () {

        var tr = $(this).closest('tr');
        var row = dataTable.row( tr );
        var idx = $.inArray( tr.attr('id'), detailRows );
 		var fonticon = $(this).children('i');
 		
        if ( row.child.isShown() ) {
            tr.removeClass( 'details' );
            tr.removeClass('text-primary');
            fonticon.removeClass('fa fa-eye-slash');
           	fonticon.addClass('fa fa-eye');
            row.child.hide(200);
 
            // Remove from the 'open' array
            detailRows.splice( idx, 1 );
        }
        else {
            tr.addClass( 'details' );
            fonticon.removeClass('fa fa-eye');
            tr.addClass('text-primary');
            fonticon.addClass('fa fa-eye-slash');
            
           var codigo = parseInt(tr.children("td:eq(0)").text(),10);

            $.ajax({

		    type: "GET",
		    url : localStorage.getItem("baseUrl")+"/panel-control/usuario/editar",
		    data : {codigo:codigo},
		    dataType: 'json'
		    }).done(function(res){
		    	row.child(format(res[0])).show(200);
 
	            // Add to the 'open' array
	            if ( idx === -1 ) {
	                detailRows.push( tr.attr('id') );
	            }

		    });
            
        }
    });
 
    // On each draw, loop over the `detailRows` array and show any child rows
    dataTable.on( 'draw', function () {
        $.each( detailRows, function ( i, id ) {
            $('#'+id+' td.details-control').trigger( 'click' );
        } );
    } );
/*------------------------------------------------------------------------
|	Validador do formulario de edição
|------------------------------------------------------------------------*/
$('#form_edit_usuario').bootstrapValidator({
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
			senha: {

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
			foto: {

					validators: {

						notEmpty: {

							message: $('#id_foto').attr('notEmpty')

						}

						/* others fields how identical for password, max-lenght, min.lenght*/
					}
				},

	}
});



/*------------------------------------------------------------------------
|	Get Information the register through Ajax
|------------------------------------------------------------------------*/
$(document).off("click",".editar").on("click",".editar",function(){

	$("#modal_edit_usuario").modal("show");
	var codigo = parseInt($(this).parents("tr").children("td:eq(0)").text(),10);
	$.ajax({
    type: "GET",
    url : localStorage.getItem("baseUrl")+"/panel-control/usuario/editar",
    data : {codigo:codigo},
    dataType: 'json'
    }).done(function(res){
    	$("#titulo_modal").html("<b style='color:#d15e5e;'>"+res[0].nome.toUpperCase()+"</b>");
    	$("#edit_cod_usuario").val(codigo);
    			$('input[name=nome]').val(res[0].nome);
		$('input[name=telefone]').val(res[0].telefone);
		$('input[name=email]').val(res[0].email);
		$('input[name=login]').val(res[0].login);
		$('input[name=pw_senha]').val(res[0].pw_senha);
		$('input[name=tipo]').val(res[0].tipo);
		$('input[name=img_foto]').val(res[0].img_foto);

    });

});

/*------------------------------------------------------------------------
|	Função de salvar edição
|------------------------------------------------------------------------*/
$("#save_edit_usuario").off("click").on("click",function(){

	/* valida o formulario para: Campos vazios ou senhas diferentes*/
	if($("#form_edit_usuario .required").validation())
	{
		alertErro($("#translate").attr("emptyFields"));
		return false;
	}
	
	$("#form_edit_usuario").submit();
});

/*------------------------------------------------------------------------
|	Remove Register of DataBase
|------------------------------------------------------------------------*/

$(document).off("click",".del").on("click",".del",function(){

	if(!confirm($('#translate').attr("delMessage")))
		return false;

	var id = parseInt($(this).parents("tr").children("td:eq(0)").text(),10);
	$.ajax({
		type: "GET",
	    url: localStorage.getItem("baseUrl")+"/panel-control/usuario/deletar",
	    data: {id:id}
    }).done(function(res){
    	
    	if(parseInt(res,10) == 1)
    	{
    		dataTable.draw();
    		alertSucesso($('#translate').attr("sucessMessage"));
    	}
    	else if(parseInt(res,10) == 2)
    	{
    		alertErro($('#translate').attr("warningMessage"));
    	}

    });

});

});

// Function show details rows
function format(f){
	string = '';
	for(var propt in f){
	    var tmp = propt;
	    propt = propt.replace("fk_","");
	    propt = propt.replace("pw_","");
	    propt = propt.replace("img_","");
	    string += "<b>"+propt.toUpperCase()+":</b>"+'   '+((f[tmp] == null) ? 'nenhum':f[tmp])+'<br>';
	}
    return string;

}