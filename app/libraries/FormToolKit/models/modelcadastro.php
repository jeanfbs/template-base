<div class="box-content">
	<h4 class="page-header">{{trans(Config::get("app.locale").'.new_register')}}</h4>
{{Form::open(array('url' => 'panel-control/$filename/cadastrar','class' => 'form-horizontal ',
'id' => 'form_$filename','files' => true))}}
		$campos
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
<script src="{{url('js/$filename/cadastro.js')}}" type="text/javascript" charset="utf-8"></script>