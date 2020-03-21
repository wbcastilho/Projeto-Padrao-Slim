<?php 

namespace app\DB;

class Sql {

	private $conn;

	public function __construct()
	{        
        $host = getenv('CODEEASY_GERENCIADOR_DE_LOJAS_MYSQL_HOST');
        $port = getenv('CODEEASY_GERENCIADOR_DE_LOJAS_MYSQL_PORT');
        $user = getenv('CODEEASY_GERENCIADOR_DE_LOJAS_MYSQL_USER');
        $pass = getenv('CODEEASY_GERENCIADOR_DE_LOJAS_MYSQL_PASSWORD');
        $dbname = getenv('CODEEASY_GERENCIADOR_DE_LOJAS_MYSQL_DBNAME');

        $dsn = "mysql:host={$host};dbname={$dbname};port={$port}";

		$this->conn = new \PDO($dsn, $user, $pass);
        $this->conn->setAttribute(
            \PDO::ATTR_ERRMODE,
            \PDO::ERRMODE_EXCEPTION
        );
	}

	private function setParams($statement, $parameters = array())
	{
		foreach ($parameters as $key => $value) {
			
			$this->bindParam($statement, $key, $value);
		}
	}

	private function bindParam($statement, $key, $value)
	{
		$statement->bindParam($key, $value);
	}

	public function query($rawQuery, $params = array())
	{
		$stmt = $this->conn->prepare($rawQuery);

		$this->setParams($stmt, $params);

		$stmt->execute();
	}

	public function select($rawQuery, $params = array()):array
	{
		$stmt = $this->conn->prepare($rawQuery);

		$this->setParams($stmt, $params);

		$stmt->execute();

		return $stmt->fetchAll(\PDO::FETCH_ASSOC);
	}
}

 ?>