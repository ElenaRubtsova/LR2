<?php

namespace lib\DB;

use PDO;

class Request extends DB
{
	public function insert($name, $description, $info, $subject, $path_1, $path_2, $id_user)
	{
        $stm = $this->db->prepare("INSERT INTO request (
            name,
            description,
            info,
            subject,
            path_f1,
            path_f2,
            id_user)
            VALUES (?,?,?,?,?,?,?)");
        $stm->bindParam(1, $name);
        $stm->bindParam(2, $description);
        $stm->bindParam(3, $info);
        $stm->bindParam(4, $subject);
        $stm->bindParam(5, $path_1);
        $stm->bindParam(6, $path_2);
        $stm->bindParam(7, $id_user);
        $stm->execute();
        return $this->db->lastInsertId();
	}

	public function view($id)
	{
		$stm = $this->db->prepare("SELECT id_user,name,description,info,subject,path_f1,path_f2
			FROM request
			WHERE id=?");
		$stm->bindParam(1, $id);
		$stm->execute();
		$stm->setFetchMode(PDO::FETCH_LAZY);
		return $stm;
	}

	public function all()
	{
		$array = $this->db->prepare("SELECT *
    		FROM request");
		$array->execute();
		return $array;
	}

	public function by_id($id_user)
	{
		$array = $this->db->prepare("SELECT *
			FROM request
			WHERE id_user = :id_user");
		$array->bindValue(':id_user', $id_user);
		$array->execute();
		return $array;
	}
}