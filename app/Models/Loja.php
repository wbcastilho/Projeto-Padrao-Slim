<?php 

namespace app\Models;

use app\DB\Sql;
use app\Models\Model;

class Loja extends Model {

	public function __toString(){

		return json_encode(array(
			"id"=>$this->getid(),
			"nom"=>$this->getnome(),
			"telefone"=>$this->gettelefone(),
			"endereco"=>$this->getendereco()
		));
	}

	public static function listAll()
	{
		$sql = new Sql();

		return $sql->select("SELECT * FROM lojas ORDER BY nome");
	}
	
	public function insert() : bool
	{
		try
        {
			$sql = new Sql();

			$sql->query("INSERT INTO lojas (id, nome, telefone, endereco) VALUES(null, :nome, :telefone, :endereco)", [
				'nome' => $this->getnome(),
				'telefone' => $this->gettelefone(),
				'endereco' => $this->getendereco()
			]);

			return true;
		}
		catch(\Exception $e)
		{
			return false;
		}	
	}

	public function update(int $id) : bool
	{
		try
        {
			$sql = new Sql();

			$sql->query("UPDATE lojas SET nome = :nome, telefone = :telefone, endereco = :endereco WHERE id = :id", [
				'id' => $id,
				'nome' => $this->getnome(),
				'telefone' => $this->gettelefone(),
				'endereco' => $this->getendereco()
			]);

			return true;
		}
		catch(\Exception $e)
        {
            return false;
        }		
	}
}