<?php
class SMS extends Eloquent{

	protected $table = 'SMS';
	protected $fillable = array('uid', 'content', 'type', 'address', 'time', 'is_read', 'created_at', 'updated_at');
}