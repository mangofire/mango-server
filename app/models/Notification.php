<?php
class Notification extends Eloquent{

	protected $table = 'notification';

	protected $fillable = array('uid', 'mobile', 'from', 'type', 'content', 'is_read');

}