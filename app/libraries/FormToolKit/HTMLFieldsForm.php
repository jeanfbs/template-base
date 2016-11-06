<?php  

/**
* 	Classe que controi os campos do formulario
*/
class HTMLFieldsForm
{
	private $limit;

	public function __construct()
	{
		$this->limit = 0;
	}
	
	public function numberIntField($label,$required = FALSE){
		
		return "\t\t\t<label for='id_".strtolower($label)."' class='col-sm-2 control-label'>".(($required === TRUE) ? "*":"")."{{trans(Config::get('app.locale').'.".strtolower($label)."')}}</label>\n
			<div class='col-sm-2'>
				<input type='text' name='".strtolower($label)."' id='id_".strtolower($label)."' class='form-control integer ".(($required === TRUE) ? "required":"")."' data-toggle='tooltip' data-placement='bottom' title='{{trans(Config::get(\"app.locale\").\".".strtolower($label)."\")}}' notEmpty='".(($required === TRUE) ? "{{trans(Config::get(\"app.locale\").\".".strtolower($label)."\")}} {{trans(Config::get(\"app.locale\").\".required\")}}":"")."'>
			</div>\n";
	}

	public function numberFloatField($label,$required = FALSE){
		
		return "\t\t\t<label for='id_".strtolower($label)."' class='col-sm-2 control-label'>".(($required === TRUE) ? "*":"")."{{trans(Config::get('app.locale').'.".strtolower($label)."')}}</label>\n
			<div class='col-sm-2'>
				<input type='text' name='".strtolower($label)."' id='id_".strtolower($label)."' class='form-control float ".(($required === TRUE) ? "required":"")."' data-toggle='tooltip' data-placement='bottom' title='{{trans(Config::get(\"app.locale\").\".".strtolower($label)."\")}}' notEmpty='".(($required === TRUE) ? "{{trans(Config::get(\"app.locale\").\".".strtolower($label)."\")}} {{trans(Config::get(\"app.locale\").\".required\")}}":"")."'>
			</div>\n";
	}

	public function textPassword($label,$required = FALSE){
		$tmp = str_replace("pw_", "", $label);
		$tmp = ucfirst($tmp);
		return  "\t\t\t<label for='id_".strtolower($tmp)."' class='col-sm-2 control-label'>".(($required === TRUE) ? "*":"")."{{trans(Config::get('app.locale').'.".strtolower($tmp)."')}}</label>\n
			<div class='col-sm-3'>
				<input type='password' name='".strtolower($label)."' id='id_".strtolower($tmp)."' class='form-control ".(($required === TRUE) ? "required":"")."' data-toggle='tooltip' data-placement='bottom' title='$tmp' notEmpty='".(($required === TRUE) ? "{{trans(Config::get(\"app.locale\").\".".strtolower($tmp)."\")}} {{trans(Config::get(\"app.locale\").\".required\")}}":"")."' identical='".(($required === TRUE) ? '{{trans(Config::get("app.locale").".identical")}}':"")."'>
			</div>\n
			<label class='col-sm-2 control-label'>*{{trans(Config::get('app.locale').'.confirm')}}</label>\n
			<div class='col-sm-3'>\n
				<input type='password' class='form-control ".(($required === TRUE) ? "required":"")."' id='id_confirmacao' name='confirmacao' data-toggle='tooltip' data-placement='bottom' title='{{trans(Config::get(\"app.locale\").\".confirm\")}}' notEmpty='".(($required === TRUE) ? "{{trans(Config::get(\"app.locale\").\".confirm\")}} {{trans(Config::get(\"app.locale\").\".required\")}}":"")."' identical='".(($required === TRUE) ? '{{trans(Config::get("app.locale").".identical")}}':"")."'>
			</div>\n
			<div class='col-sm-2'>
				<div class='checkbox'>
					<label>
						<input type='checkbox' id='mostrar_senha'>{{trans(Config::get('app.locale').'.show_pass')}}
						<i class='fa fa-square-o small'></i>
					</label>
				</div>
			</div>\n";
	}

	public function textField4($label,$required = FALSE){
		
		return "\t\t\t<label for='id_".strtolower($label)."' class='col-sm-2 control-label'>".(($required === TRUE) ? "*":"")."{{trans(Config::get('app.locale').'.".strtolower($label)."')}}</label>\n
			<div class='col-sm-2'>
				<input type='text' name='".strtolower($label)."' id='id_".strtolower($label)."' class='form-control ".(($required === TRUE) ? "required":"")."'  maxlength='15' data-toggle='tooltip' data-placement='bottom' title='{{trans(Config::get(\"app.locale\").\".".strtolower($label)."\")}}' notEmpty='".(($required === TRUE) ? "{{trans(Config::get(\"app.locale\").\".".strtolower($label)."\")}} {{trans(Config::get(\"app.locale\").\".required\")}}":"")."'>
			</div>\n";
	}

	public function textField6($label,$required = FALSE){
		
		return "\t\t\t<label for='id_".strtolower($label)."' class='col-sm-2 control-label'>".(($required === TRUE) ? "*":"")."{{trans(Config::get('app.locale').'.".strtolower($label)."')}}</label>\n
			<div class='col-sm-4'>
				<input type='text' name='".strtolower($label)."' id='id_".strtolower($label)."' class='form-control ".(($required === TRUE) ? "required":"")."' maxlength='40' data-toggle='tooltip' data-placement='bottom' title='{{trans(Config::get(\"app.locale\").\".".strtolower($label)."\")}}' notEmpty='".(($required === TRUE) ? "{{trans(Config::get(\"app.locale\").\".".strtolower($label)."\")}} {{trans(Config::get(\"app.locale\").\".required\")}}":"")."'>
			</div>\n";
	}

	public function textField8($label,$required = FALSE){
		
		return "\t\t\t<label for='id_".strtolower($label)."' class='col-sm-2 control-label'>".(($required === TRUE) ? "*":"")."{{trans(Config::get('app.locale').'.".strtolower($label)."')}}</label>\n
			<div class='col-sm-6'>
				<input type='text' name='".strtolower($label)."' id='id_".strtolower($label)."' class='form-control ".(($required === TRUE) ? "required":"")."' maxlength='70' data-toggle='tooltip' data-placement='bottom' title='{{trans(Config::get(\"app.locale\").\".".strtolower($label)."\")}}' notEmpty='".(($required === TRUE) ? "{{trans(Config::get(\"app.locale\").\".".strtolower($label)."\")}} {{trans(Config::get(\"app.locale\").\".required\")}}":"")."'>
			</div>\n";
	}
	public function textField10($label,$required = FALSE){
		
		return "\t\t\t<label for='id_".strtolower($label)."' class='col-sm-2 control-label'>".(($required === TRUE) ? "*":"")."{{trans(Config::get('app.locale').'.".strtolower($label)."')}}</label>\n
			<div class='col-sm-8'>
				<input type='text' name='".strtolower($label)."' id='id_".strtolower($label)."' class='form-control ".(($required === TRUE) ? "required":"")."' maxlength='100' data-toggle='tooltip' data-placement='bottom' title='{{trans(Config::get(\"app.locale\").\".".strtolower($label)."\")}}' notEmpty='".(($required === TRUE) ? "{{trans(Config::get(\"app.locale\").\".".strtolower($label)."\")}} {{trans(Config::get(\"app.locale\").\".required\")}}":"")."'>
			</div>\n";
	}

	public function textField12($label,$required = FALSE){
		
		return "\t\t\t<label for='id_".strtolower($label)."' class='col-sm-2 control-label'>".(($required === TRUE) ? "*":"")."{{trans(Config::get('app.locale').'.".strtolower($label)."')}}</label>\n
			<div class='col-sm-10'>
				<input type='text' name='".strtolower($label)."' id='id_".strtolower($label)."' class='form-control ".(($required === TRUE) ? "required":"")."' data-toggle='tooltip' data-placement='bottom' title='{{trans(Config::get(\"app.locale\").\".".strtolower($label)."\")}}' notEmpty='".(($required === TRUE) ? "{{trans(Config::get(\"app.locale\").\".".strtolower($label)."\")}} {{trans(Config::get(\"app.locale\").\".required\")}}":"")."'>
			</div>\n";
	}

	public function selectToForeignKey($label,$required = FALSE){
		$tmp = str_replace("fk_", "", $label);
		return "\t\t\t<label for='select_".strtolower($tmp)."' class='col-sm-2 control-label'>".(($required === TRUE) ? "*":"")."{{trans(Config::get('app.locale').'.".strtolower($tmp)."')}}</label>\n
			<div class='col-sm-4'>
				<select id='select_".strtolower($tmp)."' name='".strtolower($label)."' class='form-control ".(($required === TRUE) ? "required":"")."'>\n\t\t\t\t\t"
				.'@if(isset($'.strtolower($label).'))
						@foreach($'.strtolower($label).' as $item)
							<option value="{{$item[\'value\']}}">{{$item["value"]}}</option>
						@endforeach
					@endif'	
				."</select>
			</div>\n";
	}

	public function dataFieldFull($label,$required = FALSE){
		
		return "\t\t\t<label for='date_".strtolower($label)."' class='col-sm-2 control-label'>".(($required === TRUE) ? "*":"")."{{trans(Config::get('app.locale').'.".strtolower($label)."')}}</label>\n
			<div class='col-sm-2'>
				<input type='text' name='".strtolower($label)."' id='date_".strtolower($label)."' class='form-control datepicker ".(($required === TRUE) ? "required":"")."' placeholder='dd/mm/yyyy' notEmpty='".(($required === TRUE) ? "{{trans(Config::get(\"app.locale\").\".".strtolower($label)."\")}} {{trans(Config::get(\"app.locale\").\".required\")}}":"")."'>
			</div>\n";
	}

	public function textAreaField($label,$required = FALSE){
		
		return "\t\t\t<label for='id_".strtolower($label)."' class='col-sm-2 control-label' >".(($required === TRUE) ? "*":"")."{{trans(Config::get('app.locale').'.".strtolower($label)."')}}</label>\n
			<div class='col-sm-10'>
					<textarea name='".strtolower($label)."' class='form-control ".(($required === TRUE) ? "required":"")."' rows='5' id='id_".strtolower($label)."' notEmpty='".(($required === TRUE) ? "{{trans(Config::get(\"app.locale\").\".".strtolower($label)."\")}} {{trans(Config::get(\"app.locale\").\".required\")}}":"")."'></textarea>
			</div>\n";
	}

	public function pictureField($label)
	{
		return "\t\t\t<div class='form-group'>\n
			<div class='col-sm-offset-2 col-sm-10'>\n
				<img style='max-width: 100px; max-height: 100px;' id='thumbnail'/><br><br>\n
				<div class='btn btn-primary btn-xs btn-file'> <i class='fa fa-camera'></i> {{trans(Config::get('app.locale').'.add_picture')}}<input  type='file' name='".strtolower($label)."' class='file imagem'></div>\n
			</div>\n
		</div>";
	}

	public function openFormGroup()
	{
		return "\t\t<div class='form-group'>\n";
	}

	public function closeFormGroup()
	{
		return "\t\t</div>\n";
	}

	public function incLimit($value)
	{
		$this->limit += intval($value);
	}
	public function getLimit()
	{
		return $this->limit;
	}

	public function reset()
	{
		$this->limit = 0;	
	}

	public function controlFormGroup($value)
	{
		$inputs = "";
		if(($this->getLimit() + $value) > 12)
		{

			$inputs .= $this->closeFormGroup();
			$inputs .= $this->openFormGroup();
			$this->reset();
			
		}

		return $inputs;

	}

}