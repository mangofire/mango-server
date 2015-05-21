<?php
class Token extends Eloquent{
	protected $table = 'token';
	public $fillable = array('uid', 'token', 'mobile');
}