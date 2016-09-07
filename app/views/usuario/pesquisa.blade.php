<div class="row">
	<div class="col-xs-12">
		<div class="box-content no-padding">
			{{Form::open(array('id'=>"search_usuario"))}}
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
							  <option value='usuario.id'>Id</option>
								<option value='usuario.nome'>Nome</option>
								<option value='usuario.telefone'>Telefone</option>
								<option value='usuario.email'>Email</option>
								<option value='usuario.login'>Login</option>
								<option value='usuario.pw_senha'>Senha</option>
								<option value='usuario.tipo'>Tipo</option>
								
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
				<table class="table table-bordered table-striped table-hover" id="tabela_usuario">
					<thead>
						<tr class="active">
							<th>{{trans(Config::get('app.locale').'.id')}}</th>
								<th>{{trans(Config::get('app.locale').'.nome')}}</th>
								<th>{{trans(Config::get('app.locale').'.telefone')}}</th>
								<th>{{trans(Config::get('app.locale').'.email')}}</th>
								<th>{{trans(Config::get('app.locale').'.login')}}</th>
								<th>{{trans(Config::get('app.locale').'.senha')}}</th>
								<th>{{trans(Config::get('app.locale').'.tipo')}}</th>
								<th>{{trans(Config::get('app.locale').'.actions')}}</th>
								
						</tr>
					</thead>
					<tbody>
					
					</tbody>
					
				</table>
			</div>
		</div>
	</div>	
</div>

<!-- Modal -->
<div class="modal fade" id="modal_edit_usuario" tabindex="-1" role="dialog" aria-labelledby="modal_edit_usuario">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content ">
      <div class="modal-header devoops-modal-header">
      	<button type="button" class="close close-modal" data-dismiss="modal" aria-label="close"><span aria-hidden="true">&times;</span></button>
        <div class="modal-header-name">
			<h4 class="modal-title">{{trans(Config::get("app.locale").'.title_modal')}} <span id="title_modal"><span></h4>
		</div>
      </div>
      <div class="modal-body devoops-modal-inner">
        {{Form::open(array('url' => 'panel-control/usuario/editar','class' => 'form-horizontal ',
'id' => 'form_edit_usuario','files' => true))}}
			<input type="hidden" id="edit_cod_usuario" name="edit_cod_usuario">
					<div class='form-group'>
			<label for='id_nome' class='col-sm-2 control-label'>*{{trans(Config::get('app.locale').'.nome')}}</label>

			<div class='col-sm-6'>
				<input type='text' name='nome' id='id_nome' class='form-control required' maxlength='70' data-toggle='tooltip' data-placement='bottom' title='{{trans(Config::get("app.locale").".nome")}}' notEmpty='{{trans(Config::get("app.locale").".nome")}} {{trans(Config::get("app.locale").".required")}}'>
			</div>
		</div>
		<div class='form-group'>
			<label for='id_telefone' class='col-sm-2 control-label'>*{{trans(Config::get('app.locale').'.telefone')}}</label>

			<div class='col-sm-4'>
				<input type='text' name='telefone' id='id_telefone' class='form-control required' maxlength='40' data-toggle='tooltip' data-placement='bottom' title='{{trans(Config::get("app.locale").".telefone")}}' notEmpty='{{trans(Config::get("app.locale").".telefone")}} {{trans(Config::get("app.locale").".required")}}'>
			</div>
		</div>
		<div class='form-group'>
			<label for='id_email' class='col-sm-2 control-label'>*{{trans(Config::get('app.locale').'.email')}}</label>

			<div class='col-sm-6'>
				<input type='text' name='email' id='id_email' class='form-control required' maxlength='70' data-toggle='tooltip' data-placement='bottom' title='{{trans(Config::get("app.locale").".email")}}' notEmpty='{{trans(Config::get("app.locale").".email")}} {{trans(Config::get("app.locale").".required")}}'>
			</div>
		</div>
		<div class='form-group'>
			<label for='id_login' class='col-sm-2 control-label'>*{{trans(Config::get('app.locale').'.login')}}</label>

			<div class='col-sm-6'>
				<input type='text' name='login' id='id_login' class='form-control required' maxlength='70' data-toggle='tooltip' data-placement='bottom' title='{{trans(Config::get("app.locale").".login")}}' notEmpty='{{trans(Config::get("app.locale").".login")}} {{trans(Config::get("app.locale").".required")}}'>
			</div>
		</div>
		<div class='form-group'>
			<label for='id_senha' class='col-sm-2 control-label'>*{{trans(Config::get('app.locale').'.senha')}}</label>

			<div class='col-sm-3'>
				<input type='password' name='pw_senha' id='id_senha' class='form-control required' data-toggle='tooltip' data-placement='bottom' title='Senha' notEmpty='{{trans(Config::get("app.locale").".senha")}} {{trans(Config::get("app.locale").".required")}}' identical='Valores diferentes'>
			</div>

			<label class='col-sm-2 control-label'>*{{trans(Config::get('app.locale').'.confirm')}}</label>

			<div class='col-sm-3'>

				<input type='password' class='form-control required' name='confirmacao' data-toggle='tooltip' data-placement='bottom' title='{{trans(Config::get("app.locale").".confirm")}}' notEmpty='{{trans(Config::get("app.locale").".senha")}} {{trans(Config::get("app.locale").".required")}}' identical='Valores diferentes'>
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
			<label for='id_tipo' class='col-sm-2 control-label'>*{{trans(Config::get('app.locale').'.tipo')}}</label>

			<div class='col-sm-2'>
				<input type='text' name='tipo' id='id_tipo' class='form-control required'  maxlength='15' data-toggle='tooltip' data-placement='bottom' title='{{trans(Config::get("app.locale").".tipo")}}' notEmpty='{{trans(Config::get("app.locale").".tipo")}} {{trans(Config::get("app.locale").".required")}}'>
			</div>
			<div class='form-group'>

			<div class='col-sm-offset-2 col-sm-10'>

				<img style='max-width: 100px; max-height: 100px;' id='thumbnail'/><br><br>

				<div class='btn btn-primary btn-xs btn-file'> <i class='fa fa-camera'></i> {{trans(Config::get('app.locale').'.add_picture')}}<input  type='file' name='img_foto' class='file imagem'></div>

			</div>

		</div>		</div>

		{{Form::close()}}
      </div>
      <div class="modal-footer devoops-modal-bottom">
        <button type="button" class="btn btn-default" data-dismiss="modal">{{trans(Config::get("app.locale").'.button_cancel')}}</button>
        <button type="button" class="btn btn-primary" id="save_edit_usuario">{{trans(Config::get("app.locale").'.button_save')}}</button>
      </div>
    </div>
  </div>
</div>

<script src="{{url('js/usuario/pesquisa.js')}}"></script>

