<?php

namespace lib\DB;

use PDO;

class User extends DB
{
	public function authorize($email, $password)
	{
		$query = $this->db->prepare("SELECT id, name, password
			FROM user
			WHERE email = :email");
		$query->bindValue(':email', $email);
		$query->execute();
		$fquery = $query->fetch(PDO::FETCH_ASSOC);
		if($fquery == null)
		{
			return "Такая электронная почта в базе не найдена";
		}
		if (!password_verify($password,$fquery['password']))
		{
			return "Пароль неверный";
		}
		$_SESSION['id'] = $fquery['id'];
		$_SESSION['login'] = $fquery['name'];
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
			return "Такой почтовый адрес уже есть в системе";
		}
		$stm = $this->db->prepare("INSERT INTO user
			(name,email,password)
			VALUES (?,?,?)"
		);
		$password = password_hash($password,PASSWORD_DEFAULT);
		$stm->bindParam(1,$name);
		$stm->bindParam(2,$email);
		$stm->bindParam(3,$password);
		$stm->execute();
		$_SESSION['id'] = $this->db->lastInsertId();
		$_SESSION['login'] = $name;
	}
}