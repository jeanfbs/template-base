<div class="box-content">
	<h4 class="page-header">{{trans(Config::get("app.locale").'.new_register')}}</h4>
{{Form::open(array('url' => 'panel-control/funcionario/cadastrar','class' => 'form-horizontal ',
'id' => 'form_funcionario','files' => TRUE, 'empty_fields' => Lang::get(Config::get("app.locale").".empty_fields")))}}
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

		<div class="clearfix"></div>
		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-2">
				<button type="cancel" class="btn btn-default btn-label-left btn-xs" id="cc">
				<span><i class="fa fa-times"></i></span>
					{{trans(Config::get("app.locale").'.button_cancel')}}
				</button>
			</div>
			<div class="col-sm-2">
				<button type="submit" class="btn btn-primary btn-label-left btn-xs">
				<span><i class="fa fa-check"></i></span>
					{{trans(Config::get("app.locale").'.button_save')}}
				</button>
			</div>
		</div>
	{{Form::close()}}
</div>
<script src="{{url('js/funcionario/cadastro.js')}}" type="text/javascript" charset="utf-8"></script>