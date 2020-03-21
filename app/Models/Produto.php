<?php 

namespace app\Models;

use app\DB\Sql;
use app\Models\Model;

class Produto extends Model {

	public static function listAll()
	{
		$sql = new Sql();

		return $sql->select("SELECT * FROM lojas ORDER BY nome");
	}
	
	public function insert()
	{
		$sql = new Sql();

		$sql->query("INSERT INTO lojas (id, nome, telefone, endereco) VALUES(null, :nome, :telefone, :endereco)", [
			'nome' => $this->getnome(),
            'telefone' => $this->gettelefone(),
            'endereco' => $this->getendereco()
		]);
	}
}