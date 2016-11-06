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
	var dataTable = $('#tabela_$filename').DataTable( {
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
				"bServerSide": true,// faz com que o processamento seja do lado do servidor
				// Ajax propriedades
				"ajax":{
					"url":localStorage.getItem("baseUrl")+"panel-control/$filename/pesquisa",
					"type":"POST",
					"data":function(d){
					d.value_search = $("#value_search").val();
					d.filters = $("#filters").val();
				},
			},
			// Colunas propriedades
			"columns": [
			$columns
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
 
    $('#tabela_$filename tbody').off("click",".view").on( 'click', '.view', function () {

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
		    url : localStorage.getItem("baseUrl")+"panel-control/$filename/editar",
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
$('#form_edit_$filename').bootstrapValidator({
	message: '',
	fields: {
		$validators
	}
});



/*------------------------------------------------------------------------
|	Get Information the register through Ajax
|------------------------------------------------------------------------*/
$(document).off("click",".editar").on("click",".editar",function(){

	$("#modal_edit_$filename").modal("show");
	var codigo = parseInt($(this).parents("tr").children("td:eq(0)").text(),10);
	$.ajax({
    type: "GET",
    url : localStorage.getItem("baseUrl")+"panel-control/$filename/editar",
    data : {codigo:codigo},
    dataType: 'json'
    }).done(function(res){
    	$("#titulo_modal").html("<b style='color:#d15e5e;'>"+res[0].nome.toUpperCase()+"</b>");
    	$("#edit_cod_$filename").val(codigo);
    	$editFields
    });

});

/*------------------------------------------------------------------------
|	Função de salvar edição
|------------------------------------------------------------------------*/


$("#save_edit_$filename").off("click").on("click",function(){

	/* valida o formulario para: Campos vazios ou senhas diferentes*/
	if($("#form_edit_$filename .required").validation())
	{
		alertErro($("#translate").attr("emptyFields"));
		return false;
	}

		var dados = $("#form_edit_$filename").serializeArray();
		$.ajax({
			type: "POST",
	        url : localStorage.getItem("baseUrl")+"panel-control/$filename/editar",
	        data : dados,
	    }).done(function(res){
    	
	    	if(parseInt(res,10) == 1)
	    	{
	    		$("#modal_edit_$filename").modal("hide");
	    		dataTable.draw();
	    		alertSucesso($('#translate').attr("sucessMessage"));
	    	}
	    	else if(parseInt(res,10) == 2)
	    	{
	    		alertErro($('#translate').attr("warningMessage"));
	    	}

	    });
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
	    url: localStorage.getItem("baseUrl")+"panel-control/$filename/deletar",
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
	    propt = propt.replace("_"," ");
	    string += "<b>"+propt.toUpperCase()+":</b>"+'   '+((f[tmp] == null) ? 'nenhum':f[tmp])+'<br>';
	}
    return string;

}