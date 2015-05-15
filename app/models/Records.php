<?php
class Record extends Eloquent{

	protected $table = 'records';
	protected $fillable = array('uid', 'name', 'howlong', 'mobile', 'type', 'time');
}