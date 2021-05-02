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
	#$dby=yaml_parse_file("../config/parameters.yaml");

	public function authorize($email, $password)
	{
		$query = $this->db->prepare("SELECT id, name, password
			FROM user
			WHERE email = :email");
		$query->bindValue(':email', $email);
		if (!$query->execute())
		{
			exit("Ошибка");
		}
		$fquery = $query->fetch(PDO::FETCH_ASSOC);
		if($fquery == null)
		{
			exit("Такая электронная почта в базе не найдена");
		}
		if ($fquery['password'] != $password)
		{
			exit("Пароль неверный");
		}
		$_SESSION['identity']=$fquery['id'];
		$_SESSION['login']=$fquery['name'];
	}

	public function registrate($name, $email, $password)
	{
		$query = $this->db->prepare("SELECT name
			FROM user
			WHERE email = :email");
		$query->bindValue(':email', $email);
		$query->execute();
		if ($query->fetchColumn() != null)
		{
			$this->db = null;
			exit("Такой почтовый адрес уже есть в системе");
		}
		$stm = $this->db->prepare("INSERT INTO user
			(name,email,password)
			VALUES (?,?,?)"
		);
		$stm->bindParam(1,$name);
		$stm->bindParam(2,$email);
		$stm->bindParam(3,$password);
		$stm->execute();
	}

	public function __destruct()
	{
		$this->db = null;
	}
}