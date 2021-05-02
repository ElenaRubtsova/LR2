<?php

namespace lib\DB;

class Two
{
	public $subject, $path_1, $path_2;
	public function __construct($subject, $path_1, $path_2)
	{
		$this->subject = $subject;
		$this->path_1 = $path_1;
		$this->path_2 = $path_2;
	}
}
