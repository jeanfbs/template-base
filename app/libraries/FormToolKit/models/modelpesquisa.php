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
							    <li><a href="#" id="pdf"><i class="fa fa-file-pdf-o"></i> PDF</a></li>
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
				<table class="table table-bordered table-striped table-hover" id="tabela_$filename">
					<thead>
						<tr class="active">
							$header_table
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
<div class="modal fade" id="modal_edit_$filename" tabindex="-1" role="dialog" aria-labelledby="modal_edit_$filename">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content ">
      <div class="modal-header devoops-modal-header">
      	<button type="button" class="close close-modal" data-dismiss="modal" aria-label="close"><span aria-hidden="true">&times;</span></button>
        <div class="modal-header-name">
			<h4 class="modal-title">{{trans(Config::get("app.locale").'.title_modal')}} <span id="title_modal"><span></h4>
		</div>
      </div>
      <div class="modal-body devoops-modal-inner">
        {{Form::open(array('class' => 'form-horizontal ','id' => 'form_edit_$filename','files' => true))}}
			<input type="hidden" id="edit_cod_$filename" name="edit_cod_$filename">
			$modal_fields
		{{Form::close()}}
      </div>
      <div class="modal-footer devoops-modal-bottom">
        <button type="button" class="btn btn-default" data-dismiss="modal">{{trans(Config::get("app.locale").'.button_cancel')}}</button>
        <button type="button" class="btn btn-primary" id="save_edit_$filename">{{trans(Config::get("app.locale").'.button_save')}}</button>
      </div>
    </div>
  </div>
</div>

<script src="{{url('js/$filename/pesquisa.js')}}"></script>

