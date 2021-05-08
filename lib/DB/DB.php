<?php

namespace lib\DB;

use PDO;

abstract class DB
{
	protected $db;

	public function __construct()
	{
		$par = require '../config/connect.php';
		$type = $par['type'];
		$host = $par['host'];
		$dbname = $par['dbname'];
		$charset = $par['charset'];
		$login = $par['login'];
		$password = $par['password'];
		$this->db = new PDO("$type:host=$host;dbname=$dbname;charset=$charset",$login,$password);
		$this->db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	}

	public function __destruct()
	{
		$this->db = null;
	}
}