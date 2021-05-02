<?php

namespace lib\DB;

use PDO;

class Request extends DB
{
	public function insert($one, $two, $id_user)
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
        #print_r($one->name);
        #print_r($one);
        $stm->bindParam(1, $one->name);
        $stm->bindParam(2, $one->description);
        $stm->bindParam(3, $one->info);
        $stm->bindParam(4, $two->subject);
        $stm->bindParam(5, $two->path_1);
        $stm->bindParam(6, $two->path_2);
        $stm->bindParam(7, $id_user);
        $stm->execute();
        $_SESSION['id_request'] = $this->db->lastInsertId();
	}

	public function view()
	{
		$id = $_SESSION['id_request'];
		$stm = $this->db->prepare("SELECT name,description,info,subject,path_f1,path_f2
			FROM request
			WHERE id=?");$stm->bindParam(1, $id);
		$stm->execute([$id]);
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