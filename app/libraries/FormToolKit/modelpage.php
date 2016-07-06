@extends("template")
@section("title")   {{trans(Config::get("app.locale").".titulo_$filename")}}    @stop
@section("content")
<!--Start Breadcrumb-->
<div class="row">
	<div id="breadcrumb" class="col-xs-12">
		<a href="#" class="show-sidebar">
			<i class="fa fa-bars"></i>
		</a>
		<ol class="breadcrumb pull-left">
			<li><a href="{{url('panel-control/dashboard')}}">{{trans(Config::get("app.locale").".breadcrumb_home")}}</a></li>
			<li><a href="#">{{trans(Config::get("app.locale").".titulo_$filename")}}</a></li>
			<li><a href="#" id="view_name">{{trans(Config::get("app.locale").".tab_pesquisar")}}</a></li>
		</ol>
		<div id="social" class="pull-right">
			<a href="#"><i class="fa fa-google-plus"></i></a>
			<a href="#"><i class="fa fa-facebook"></i></a>
			<a href="#"><i class="fa fa-twitter"></i></a>
			<a href="#"><i class="fa fa-linkedin"></i></a>
			<a href="#"><i class="fa fa-youtube"></i></a>
		</div>
	</div>
</div>
<!--End Breadcrumb-->
<div class="col-xs-12 col-sm-12">
		<div class="box">
			<div class="box-header">
				<div class="box-name">
					<i class="fa fa-user-plus"></i>
					<span>{{trans(Config::get("app.locale").".titulo_$filename")}}</span>
				</div>
				<div class="box-icons pull-right">
					<a class="collapse-link">
					</a>
					<a class="expand-link">
					</a>
					<a class="close-link">
					</a>
				</div>
				<div class="no-move"></div>
			</div>
			<div class="box-content">
				<div id="tabs">
					<ul>
						<li><a href="{{url('panel-control/$filename/cadastro')}}">{{trans(Config::get("app.locale").".tab_cadastro")}}</a></li>
						<li><a href="{{url('panel-control/$filename/pesquisa')}}">{{trans(Config::get("app.locale").".tab_pesquisar")}}</a></li>
					</ul>
					<div id="tabs-2">
						
					</div>
				</div>
			</div>
		</div>
	</div>

<div style="height: 40px;"></div>
<script>
$(document).ready(function() {
	$("#tabs").tabs({active: 1});
	$(document).submit(function(){return false;});
	$( "#tabs" ).tabs({
		beforeLoad: function( event, ui ) {
			title = $(ui.tab).text();
			$("#view_name").text(title);
			ui.jqXHR.fail(function() {
				ui.panel.html(
					"Ocorreu um erro ao tentar carregar conteúdo" );
			});
		}
	});
WinMove();
/*------------------------------------------------------------------------
|	A função abaixo verifica a cada vez que o 
|	documento HTML e carregado se foi enviado
|	uma mensagem do servidor de erro ou de
|	alguma operação feita
|------------------------------------------------------------------------*/
		setTimeout(function(){
			alerta();
		},1000);
});
</script>
@stop