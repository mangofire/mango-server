<?php
class Contact extends Eloquent{

	protected $table = 'contacts';
	protected $fillable = array('uid','mobile', 'name', 'group');
}