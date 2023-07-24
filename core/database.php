<?php


namespace Lights\Core;
use PDO;

class Database 
{
	protected $dsn;
	protected $pdo;

	public function __construct()
	{
		$this->dsn = 'mysql:host='.$_ENV['DB_HOST'].'; dbname='.$_ENV['DB_NAME'];
		$this->pdo = new PDO($this->dsn, $_ENV['DB_USER'], $_ENV['DB_PASSWORD']);
		$this->pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);
		$this->pdo->query("SET NAMES 'utf8'");
	}

	public function all($query)
	{
		$result = $this->pdo->prepare($query);
		$result->execute();
		return $result->fetchAll();
	}

	public function single($query, $param, $value)
	{
		$result = $this->pdo->prepare($query);
		$result->execute([$param => $value]);
		return $result->fetch();
	}

	public function insert($table, $data) {
		$dataList = "";
		$stmtList = "";
		$params = array();
		foreach ($data as $key => $value) {$params[":".$key] = $value;}
		foreach ($data as $dataItem => $val) {$dataList .= $dataItem.", ";}
		foreach ($data as $stmtItem => $val) {$stmtList .= ":".$stmtItem.", ";}

		$dataList = rtrim($dataList, ", ");
		$stmtList = rtrim($stmtList, ", ");

		$query = $this->pdo->prepare("INSERT INTO ".$table." (".$dataList.") VALUES (".$stmtList.")");

		foreach($params as $key => &$val) {$query->bindParam($key, $val);}
		$query->execute();
	}

	public function update($table, $data, $id) {
		$dataList = "";
		$params = array();
		foreach ($data as $key => $value) {$params[":".$key] = $value;}
		foreach ($data as $dataItem => $val) {$dataList .= $dataItem." = :".$dataItem.",";}

		$dataList = rtrim($dataList, ", ");

		$update = "UPDATE ".$table." SET ".$dataList." WHERE id = :id";
		$query = $this->pdo->prepare($update);

		foreach($params as $key => &$val) {$query->bindParam($key, $val);}
		$query->bindParam(':id', $id);
		$query->execute();
	}

	public function destroy($table, $id) {
		$delete = $this->pdo->prepare("DELETE FROM $table WHERE id = :id");
        $delete->execute(['id' => $id]);
	}
}