

<div class="row">
	<div class="col-xs-12">
		<div class="box-content no-padding">
			{{Form::open(array('id'=>"search_$filename"))}}
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
							  $filters
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
				<table class="table table-bordered table-striped table-hover" id="tabela_$filename" t="{{trans(Config::get('app.locale').'.all')}}"
				tipview = "{{trans(Config::get('app.locale').'.tooltip_view')}}" tipedit = "{{trans(Config::get('app.locale').'.tooltip_edit')}}" tipdel = "{{trans(Config::get('app.locale').'.tooltip_del')}}"
				>
					<thead>
						<tr class="active">
							$header_table
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
        {{Form::open(array('url' => 'panel-control/$filename/cadastrar','class' => 'form-horizontal ',
'id' => 'modal_edit_$filename','files' => TRUE, 'empty_fields' => Lang::get(Config::get("app.locale").".empty_fields")))}}
			$modal_fields
		{{Form::close()}}
      </div>
      <div class="modal-footer devoops-modal-bottom">
        <button type="button" class="btn btn-default" data-dismiss="modal">{{trans('geral.button_cancel')}}</button>
        <button type="button" class="btn btn-primary" id="salvar_edicao">{{trans('geral.button_save')}}</button>
      </div>
    </div>
  </div>
</div>

<script src="{{url('js/$filename/pesquisa.js')}}"></script>

