/**************************************************************************
*
*	Validation faz uma validação de todos os seletores equivalentes ao seletor 
* 	passado no parametro.
* @param seletor O seletor a ser percorrido para fazer a validação
* @return true se existe pelo menos um campo vazio
*		  false se todos os campos estão preenchidos
*
***************************************************************************/
$.fn.extend({
 validation: function()
{	
	var erro = false;
	// variavel de codição do erro
	 $(this).each(function(){

			if($(this).val() == "")
			{
				if($(this).parents("div .form-group").hasClass("has-success"))
				{
					
					$(this).parents("div .form-group").removeClass("has-success");
					$(this).parents("div .form-group").addClass("has-error");
				}
				else 
					$(this).parents("div .form-group").addClass("has-error");
				erro = true;
			}
			else
			{
				if($(this).parents("div .form-group").hasClass("has-error"))
				{
					
					$(this).parents("div .form-group").removeClass("has-error");
					$(this).parents("div .form-group").addClass("has-success");
				}
				else
					$(this).parents("div .form-group").addClass("has-success");
			}

			});

	 if(erro) return true;
	 else return false;
}

});

/**************************************************************************
*
*	 Recupera todos os laboratorios disponíveis no sistema
* 	 @param Seletor
* 	 @return false
*
***************************************************************************/
$.fn.extend({
select2Laboratorios: function()
{
	var seletor = $(this);

	$.getJSON(pt_br.absolute_url+"/panel-control/laboratorio/listar",function(json)
	{
		$.each(json,function(i,item){
			
			var op = "<option value="+json[i].cod+">"+json[i].nome.toUpperCase()+"</option>";
			seletor.append(op);
			
		});
	});
	return false;
}
});

/* ------------------------------------------------------------------ 
|	Formata o input para aceitar apenas valores float
------------------------------------------------------------------*/
$(document).on("keyup",".float",function(){
	 var expre = /[^0-9.]/g;

    // REMOVE OS CARACTERES DA EXPRESSAO ACIMA
    if ($(this).val().match(expre))
        $(this).val($(this).val().replace(expre,''));
		
});


/* ------------------------------------------------------------------ 
|	Formata o input para aceitar apenas valores float
------------------------------------------------------------------*/
$(document).on("keyup",".integer",function(){
	 var expre = /[^0-9]/g;

    // REMOVE OS CARACTERES DA EXPRESSAO ACIMA
    if ($(this).val().match(expre))
        $(this).val($(this).val().replace(expre,''));
		
});

function today()
{
	var today = new Date();
    var dd = today.getDate();
    var mm = today.getMonth()+1; //January is 0!

    var yyyy = today.getFullYear();
    if(dd<10){
        dd='0'+dd
    } 
    if(mm<10){
        mm='0'+mm
    } 
    var today = dd+'/'+mm+'/'+yyyy;
    return today;
}

function getHorario()
{
	d = new Date();
	datetext = d.toTimeString();
	time = datetext.split(' ')[0];
	

	return time;
}