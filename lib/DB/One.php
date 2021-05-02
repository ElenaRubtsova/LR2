<?php

namespace lib\DB;

class One
{
	public $name, $description, $info;
	public function __construct($name, $description, $info)
	{
		$this->name = $name;
		$this->description = $description;
		$this->info = $info;
	}
}