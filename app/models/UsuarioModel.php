<?php 


class UsuarioModel extends Eloquent{

	protected $table = 'usuario';
	public  $timestamps = false;
	protected $primaryKey = 'id';
	protected $guarded = array('id');
}