<?php  

/**
* 	Classe que controi os campos do formulario
*/
class HTMLBuilder
{
	private $limit;

	public function __construct()
	{
		$this->limit = 0;
	}
	
	public function numberIntField($label,$required = FALSE){
		
		return "\t\t\t<label for='id_".strtolower($label)."' class='col-sm-2 control-label'>".(($required === TRUE) ? "*":"")."{{trans('".strtolower($label)."')}}</label>\n
			<div class='col-sm-2'>
				<input type='text' name='".strtolower($label)."' id='id_".strtolower($label)."' class='form-control integer ".(($required === TRUE) ? "required":"")."' data-toggle='tooltip' data-placement='bottom' title='$label'>
			</div>\n";
	}

	public function numberFloatField($label,$required = FALSE){
		
		return "\t\t\t<label for='id_".strtolower($label)."' class='col-sm-2 control-label'>".(($required === TRUE) ? "*":"")."{{trans('".strtolower($label)."')}}</label>\n
			<div class='col-sm-2'>
				<input type='text' name='".strtolower($label)."' id='id_".strtolower($label)."' class='form-control float ".(($required === TRUE) ? "required":"")."' data-toggle='tooltip' data-placement='bottom' title='$label'>
			</div>\n";
	}

	public function textPassword($label,$required = FALSE){
		
		return "\t\t\t<label for='id_".strtolower($label)."' class='col-sm-2 control-label'>".(($required === TRUE) ? "*":"")."{{trans('".strtolower($label)."')}}</label>\n
			<div class='col-sm-4'>
				<input type='password' name='".strtolower($label)."' id='id_".strtolower($label)."' class='form-control ".(($required === TRUE) ? "required":"")."' data-toggle='tooltip' data-placement='bottom' title='$label'>
			</div>\n
			<label class='col-sm-2 control-label'>*{{trans(\"geral.confirmacao\")}}</label>\n
			<div class='col-sm-4'>\n
				<input type='password' class='form-control ".(($required === TRUE) ? "required":"")."' name='confirmacao' data-toggle='tooltip' data-placement='bottom' title='{{trans(\"geral.confirmacao\")}}'>
			</div>\n";
	}

	public function textField4($label,$required = FALSE){
		
		return "\t\t\t<label for='id_".strtolower($label)."' class='col-sm-2 control-label'>".(($required === TRUE) ? "*":"")."{{trans('".strtolower($label)."')}}</label>\n
			<div class='col-sm-2'>
				<input type='text' name='".strtolower($label)."' id='id_".strtolower($label)."' class='form-control ".(($required === TRUE) ? "required":"")."'  maxlength='15' data-toggle='tooltip' data-placement='bottom' title='$label'>
			</div>\n";
	}

	public function textField6($label,$required = FALSE){
		
		return "\t\t\t<label for='id_".strtolower($label)."' class='col-sm-2 control-label'>".(($required === TRUE) ? "*":"")."{{trans('".strtolower($label)."')}}</label>\n
			<div class='col-sm-4'>
				<input type='text' name='".strtolower($label)."' id='id_".strtolower($label)."' class='form-control ".(($required === TRUE) ? "required":"")."' maxlength='40' data-toggle='tooltip' data-placement='bottom' title='$label'>
			</div>\n";
	}

	public function textField8($label,$required = FALSE){
		
		return "\t\t\t<label for='id_".strtolower($label)."' class='col-sm-2 control-label'>".(($required === TRUE) ? "*":"")."{{trans('".strtolower($label)."')}}</label>\n
			<div class='col-sm-6'>
				<input type='text' name='".strtolower($label)."' id='id_".strtolower($label)."' class='form-control ".(($required === TRUE) ? "required":"")."' maxlength='70' data-toggle='tooltip' data-placement='bottom' title='$label'>
			</div>\n";
	}
	public function textField10($label,$required = FALSE){
		
		return "\t\t\t<label for='id_".strtolower($label)."' class='col-sm-2 control-label'>".(($required === TRUE) ? "*":"")."{{trans('".strtolower($label)."')}}</label>\n
			<div class='col-sm-8'>
				<input type='text' name='".strtolower($label)."' id='id_".strtolower($label)."' class='form-control ".(($required === TRUE) ? "required":"")."' maxlength='100' data-toggle='tooltip' data-placement='bottom' title='$label'>
			</div>\n";
	}

	public function textField12($label,$required = FALSE){
		
		return "\t\t\t<label for='id_".strtolower($label)."' class='col-sm-2 control-label'>".(($required === TRUE) ? "*":"")."{{trans('".strtolower($label)."')}}</label>\n
			<div class='col-sm-10'>
				<input type='text' name='".strtolower($label)."' id='id_".strtolower($label)."' class='form-control ".(($required === TRUE) ? "required":"")."' data-toggle='tooltip' data-placement='bottom' title='$label'>
			</div>\n";
	}

	public function selectToForeignKey($label,$required = FALSE){
		
		return "\t\t\t<label for='select_".strtolower($label)."' class='col-sm-2 control-label'>".(($required === TRUE) ? "*":"")."{{trans('".strtolower($label)."')}}</label>\n
			<div class='col-sm-4'>
				<select id='select_".strtolower($label)."' class='form-control ".(($required === TRUE) ? "required":"")."'>
					<!-- <option value=''> </option> -->
				</select>
			</div>\n";
	}

	public function dataFieldFull($label,$required = FALSE){
		
		return "\t\t\t<label for='date_".strtolower($label)."' class='col-sm-2 control-label'>".(($required === TRUE) ? "*":"")."{{trans('".strtolower($label)."')}}</label>\n
			<div class='col-sm-2'>
				<input type='text' id='date_".strtolower($label)."' class='form-control ".(($required === TRUE) ? "required":"")."' placeholder='dd/mm/yyyy'>
				<span class='fa fa-calendar form-control-feedback'></span>
			</div>\n";
	}

	public function textAreaField($label,$required = FALSE){
		
		return "\t\t\t<label for='id_".strtolower($label)."' class='col-sm-2 control-label' >".(($required === TRUE) ? "*":"")."{{trans('".strtolower($label)."')}}</label>\n
			<div class='col-sm-10'>
					<textarea class='form-control ".(($required === TRUE) ? "required":"")."' rows='5' id='id_".strtolower($label)."'></textarea>
			</div>\n";
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