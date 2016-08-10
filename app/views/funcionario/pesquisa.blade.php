

<div class="row">
	<div class="col-xs-12">
		<div class="box-content no-padding">
			{{Form::open(array('id'=>"search_funcionario"))}}
					<div class="form-group">
						<div class="col-md-2">
					    	<div class="dropdown">
							  <button class="btn btn-default dropdown-toggle" type="button" id="export" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
							    <i class="fa fa-share-square"></i> {{trans(Config::get("app.locale").'.dropmenu_export')}}
							    <span class="caret"></span>
							  </button>
							  <ul class="dropdown-menu" aria-labelledby="export">
							    <li><a href="#" target="_blank"><i class="fa fa-file-pdf-o"></i> PDF</a></li>
							    <li><a href="#" ><i class="fa fa-file-excel-o"></i> Excel</a></li>
							  </ul>
							</div>
					    </div>
						<div class="col-md-3">
							<select class="form-control" id="filters">
							  <option value='funcionarios.id'>Id</option>
								<option value='funcionarios.fk_fazenda'>Fazenda</option>
								<option value='funcionarios.nome'>Nome</option>
								<option value='funcionarios.nivel'>Nivel</option>
								<option value='funcionarios.login'>Login</option>
								<option value='funcionarios.pw_senha'>Senha</option>
								<option value='funcionarios.email'>Email</option>
								<option value='funcionarios.cargo'>Cargo</option>
								
							</select>
						</div>
					</div>
					<div class="form-group">
						<div class="input-group col-md-5">
					      <input type="text" class="form-control required" id="value_search" placeholder="{{trans(Config::get('app.locale').'.placeholder_form_search')}}">
					      <span class="input-group-btn">
					        <button class="btn btn-primary" type="button" id="btn_search"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
					      </span>

					    </div><!-- /input-group -->
					</div>

				{{Form::close()}}
			<div class="table-responsive">
				<table class="table table-bordered table-striped table-hover" id="tabela_funcionario" t="{{trans(Config::get('app.locale').'.all')}}"
				tipview = "{{trans(Config::get('app.locale').'.tooltip_view')}}" tipedit = "{{trans(Config::get('app.locale').'.tooltip_edit')}}" tipdel = "{{trans(Config::get('app.locale').'.tooltip_del')}}"
				>
					<thead>
						<tr class="active">
							<th>{{trans(Config::get('app.locale').'.id')}}</th>
								<th>{{trans(Config::get('app.locale').'.fazenda')}}</th>
								<th>{{trans(Config::get('app.locale').'.nome')}}</th>
								<th>{{trans(Config::get('app.locale').'.nivel')}}</th>
								<th>{{trans(Config::get('app.locale').'.login')}}</th>
								<th>{{trans(Config::get('app.locale').'.senha')}}</th>
								<th>{{trans(Config::get('app.locale').'.email')}}</th>
								<th>{{trans(Config::get('app.locale').'.actions')}}</th>
								
						</tr>
					</thead>
					<tbody sZeroRecords="{{trans(Config::get('app.locale').'.sZeroRecords')}}"
					sInfo="{{trans(Config::get('app.locale').'.sInfo')}}" sInfoEmpty="{{trans(Config::get('app.locale').'.sInfoEmpty')}}"
					sInfoFiltered="{{trans(Config::get('app.locale').'.sInfoFiltered')}}" sProcessing="{{trans(Config::get('app.locale').'.sProcessing')}}">
					
					</tbody>
					
				</table>
			</div>
		</div>
	</div>	
</div>

<!-- Modal -->
<div class="modal fade" id="modal_edit" tabindex="-1" role="dialog" aria-labelledby="modal_edit">
  <div class="modal-dialog  modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header devoops-modal-header">
        <div class="modal-header-name">
			<h4 class="modal-title">{{trans(Config::get("app.locale").'.title_modal')}} <span id="title_modal"><span></h4>
		</div>
		<div class="box-icons">
			<a class="close-link">
				<i class="fa fa-times"></i>
			</a>
		</div>
      </div>
      <div class="modal-body devoops-modal-inner">
        {{Form::open(array('url' => 'panel-control/funcionario/cadastrar','class' => 'form-horizontal ',
'id' => 'modal_edit_funcionario','files' => TRUE, 'empty_fields' => Lang::get(Config::get("app.locale").".empty_fields")))}}
					<div class='form-group'>
			<label for='select_fazenda' class='col-sm-2 control-label'>*{{trans(Config::get('app.locale').'.fazenda')}}</label>

			<div class='col-sm-4'>
				<select id='select_fazenda' name='fk_fazenda' class='form-control required'>
					<option value=''>Default</option>
				</select>
			</div>
			<label for='id_nome' class='col-sm-2 control-label'>*{{trans(Config::get('app.locale').'.nome')}}</label>

			<div class='col-sm-4'>
				<input type='text' name='nome' id='id_nome' class='form-control required' maxlength='40' data-toggle='tooltip' data-placement='bottom' title='Nome' notEmpty='Nome é obrigatorio(a)'>
			</div>
		</div>
		<div class='form-group'>
			<label for='id_nivel' class='col-sm-2 control-label'>*{{trans(Config::get('app.locale').'.nivel')}}</label>

			<div class='col-sm-2'>
				<input type='text' name='nivel' id='id_nivel' class='form-control integer required' data-toggle='tooltip' data-placement='bottom' title='Nivel' notEmpty='Nivel é obrigatorio(a)'>
			</div>
			<label for='id_login' class='col-sm-2 control-label'>*{{trans(Config::get('app.locale').'.login')}}</label>

			<div class='col-sm-2'>
				<input type='text' name='login' id='id_login' class='form-control required'  maxlength='15' data-toggle='tooltip' data-placement='bottom' title='Login' notEmpty='Login é obrigatorio(a)'>
			</div>
		</div>
		<div class='form-group'>
			<label for='id_senha' class='col-sm-2 control-label'>*{{trans(Config::get('app.locale').'.senha')}}</label>

			<div class='col-sm-3'>
				<input type='password' name='pw_senha' id='id_senha' class='form-control required' data-toggle='tooltip' data-placement='bottom' title='Senha' notEmpty='Senha é obrigatorio(a)' identical='Valores diferentes'>
			</div>

			<label class='col-sm-2 control-label'>*{{trans(Config::get('app.locale').'.confirm')}}</label>

			<div class='col-sm-3'>

				<input type='password' class='form-control required' name='confirmacao' data-toggle='tooltip' data-placement='bottom' title='{{trans(Config::get("app.locale").".confirm")}}' notEmpty='Senha é obrigatorio(a)' identical='Valores diferentes'>
			</div>

			<div class='col-sm-2'>
				<div class='checkbox'>
					<label>
						<input type='checkbox' id='mostrar_senha'>{{trans(Config::get('app.locale').'.show_pass')}}
						<i class='fa fa-square-o small'></i>
					</label>
				</div>
			</div>
		</div>
		<div class='form-group'>
			<label for='id_email' class='col-sm-2 control-label'>*{{trans(Config::get('app.locale').'.email')}}</label>

			<div class='col-sm-6'>
				<input type='text' name='email' id='id_email' class='form-control required' maxlength='70' data-toggle='tooltip' data-placement='bottom' title='Email' notEmpty='Email é obrigatorio(a)'>
			</div>
		</div>
		<div class='form-group'>
			<label for='id_cargo' class='col-sm-2 control-label'>*{{trans(Config::get('app.locale').'.cargo')}}</label>

			<div class='col-sm-4'>
				<input type='text' name='cargo' id='id_cargo' class='form-control required' maxlength='40' data-toggle='tooltip' data-placement='bottom' title='Cargo' notEmpty='Cargo é obrigatorio(a)'>
			</div>
			<div class='form-group'>

			<div class='col-sm-offset-2 col-sm-10'>

				<img style='max-width: 100px; max-height: 100px;' id='thumbnail'/><br><br>

				<div class='btn btn-primary btn-xs btn-file'> <i class='fa fa-camera'></i> {{trans(Config::get('app.locale').'.add_picture')}}<input  type='file' name='foto' class='file imagem'></div>

			</div>

		</div>		</div>

		{{Form::close()}}
      </div>
      <div class="modal-footer devoops-modal-bottom">
        <button type="button" class="btn btn-default" data-dismiss="modal">{{trans('geral.button_cancel')}}</button>
        <button type="button" class="btn btn-primary" id="salvar_edicao">{{trans('geral.button_save')}}</button>
      </div>
    </div>
  </div>
</div>

<script src="{{url('js/funcionario/pesquisa.js')}}"></script>

