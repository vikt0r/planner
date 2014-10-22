<?php

class Logger extends \Eloquent {
	protected $fillable = [];

	public static function failLog(
					$user_id = 0,
					$ip = '',
					$class = '',
					$method = '',
					$description = '')
	{
		$log = new Logger;
		$log->user_id = $user_id;
		$log->ip = $ip;
		$log->class = $class;
		$log->method = $method;
		$log->description = $description;

		$log->save();

	}
}